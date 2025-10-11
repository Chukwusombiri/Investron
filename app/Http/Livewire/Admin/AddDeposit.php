<?php

namespace App\Http\Livewire\Admin;

use App\Mail\DepositApprovalMail;
use App\Mail\RewardDownlineMail;
use App\Mail\RewardUplineMail;
use App\Models\Deposit;
use App\Models\Plan;
use App\Models\Referral;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class AddDeposit extends Component
{
    public $wallet;
    public $user;
    public $amount;
    public $plan;
    public $search = '';
    public $allUsers = [];

    protected function rules()
    {
        return [
            'amount' => ['required', 'integer', 'numeric'],
            'plan' => ['required', 'string', 'exists:plans,id'],
            'wallet' => ['required', 'string', 'exists:wallets,name'],
            'user' => ['required', 'exists:users,id'],
        ];
    }


    public function handleFocus()
    {
        $this->allUsers = User::all();
    }


    public function updatedSearch()
    {
        $this->allUsers = User::where('username', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->get();
    }

    public function updatedWallet()
    {
        if ($this->wallet === 'create wallet') {
            return redirect()->route('admin.company_wallet.create');
        }
    }

    public function updatedPlan()
    {
        if ($this->plan === 'create plan') {
            return redirect()->route('admin.plan.create');
        }
    }

    public function setUser($id)
    {
        $this->user = $id;
        $this->search = User::where('id', $id)->value('username');
        $this->allUsers = [];
    }

    public function submit()
    {
        $this->validate();


        $deposit = new Deposit();
        $deposit->amount  = $this->amount;
        $deposit->plan_id =  $this->plan;
        $deposit->plan =  Plan::find($this->plan)->value('name');
        $deposit->wallet = $this->wallet;
        $deposit->address = Wallet::where('name', $this->wallet)->value('address') ?? 'none';
        $deposit->isApproved = true;
        $deposit->user_id = $this->user;

        if ($deposit->save()) {
            $user = User::find($this->user);
            $user->acBal += $this->amount;
            $user->acRoi += $this->amount;
            $user->isEarning = true;
            $user->save();
            $existingPivot = $user->plans()->where('plan_id', $deposit->plan_id)->first();

            if ($existingPivot) {
                // Add the new amount to the existing one
                $newAmount = $existingPivot->subscription->total + $deposit->amount;
                $newROI = $existingPivot->subscription->roi + $deposit->amount;

                // Update the pivot table with the new total amount
                $user->plans()->updateExistingPivot($deposit->plan_id, ['total' => $newAmount, 'roi' => $newROI]);
            } else {
                // Create a new pivot record with the deposit amount
                $user->plans()->attach($deposit->plan_id, ['total' => $deposit->amount, 'roi' => $deposit->amount]);
            }
            Mail::to($user->email)->send(new DepositApprovalMail($deposit));

            if ($user->upline_id !== null && $user->hasDeposited !== true) {
                $depositAmount = $deposit->amount;
                $rewardUp = ceil(0.01 * $depositAmount);
                $rewardDown = 25;

                $referrer = Referral::where('downline_id', $user->id)->first();
                if ($referrer !== null) {
                    $upline = $referrer->user;
                    if ($upline !== null) {
                        $upline->acRoi += $rewardUp;
                        $upline->refBonus += $rewardUp;
                        $upline->save();
                        $user->acRoi = $rewardDown;
                        $user->save();
                        Mail::to($upline->email)->send(new RewardUplineMail($rewardUp));
                        Mail::to($user->email)->send(new RewardDownlineMail($rewardDown));
                    }
                }
            }
        }

        return redirect()->route('admin.deposits')->with('success', 'deposit record was created and approved successfully.');
    }

    public function render()
    {
        return view('livewire.admin.add-deposit', [
            'wallets' => Wallet::all(),
            'plans' => Plan::all(),
        ]);
    }
}

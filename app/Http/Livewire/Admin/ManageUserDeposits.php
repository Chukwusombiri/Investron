<?php

namespace App\Http\Livewire\Admin;

use App\Mail\DepositApprovalMail;
use App\Mail\RewardDownlineMail;
use App\Mail\RewardUplineMail;
use App\Models\Deposit;
use App\Models\Plan;
use App\Models\Referral;
use App\Models\User;
use App\Notifications\DepositApprovalNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class ManageUserDeposits extends Component
{
    use WithPagination;
    public $search = '';
    public $perPage = 7;
    public User $user;

    protected $listeners = [
        'addedDeposit' => '$refresh',
        'editedDeposit' => '$refresh'
    ];

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function updatedSearch()
    {
        $this->resetPage( pageName: 'user-deposits-page');
    }

    public function clear()
    {
        $this->search = '';
        $this->resetPage( pageName: 'user-deposits-page');
    }

    public function approve($id)
    {
        $deposit = Deposit::find($id);
        if ($deposit->isApproved = true) {
            $deposit->save();
            $this->user->isEarning = true;
            $this->user->acBal +=  $deposit->amount;
            $this->user->acRoi += $deposit->amount;            
            $this->user->save();

            $existingPivot = $this->user->plans()->where('plan_id', $deposit->plan_id)->first();

            if ($existingPivot) {
                // Add the new amount to the existing one
                $newAmount = $existingPivot->subscription->total + $deposit->amount;
                $newROI = $existingPivot->subscription->roi + $deposit->amount;

                // Update the pivot table with the new total amount
                $this->user->plans()->updateExistingPivot($deposit->plan_id, ['total' => $newAmount, 'roi' => $newROI]);
            } else {
                // Create a new pivot record with the deposit amount
                $this->user->plans()->attach($deposit->plan_id, ['total' => $deposit->amount, 'roi' => $deposit->amount]);
            }
            Mail::to($this->user->email)->send(new DepositApprovalMail($deposit));
            if ($this->user->upline_id !== null && $this->user->hasDeposited !== true) {
                $depositAmount = $deposit->amount; 
                $rewardUp = ceil(0.01 * $depositAmount);
                $rewardDown = 25;

                $referrer = Referral::where('downline_id', $this->user->id)->first();
                if ($referrer !== null) {
                    $upline = $referrer->user;
                    if ($upline !== null) {
                        $upline->acRoi += $rewardUp;
                        $upline->refBonus += $rewardUp;
                        $upline->save();
                        $this->user->acRoi = $rewardDown;
                        $this->user->save();
                        Mail::to($upline->email)->send(new RewardUplineMail($rewardUp));
                        Mail::to($this->user->email)->send(new RewardDownlineMail($rewardDown));
                    }
                }
            }

            $this->dispatch('approvedDeposit');
        }
    }

    public function delete($id)
    {
        $deposit = Deposit::find($id);
        if ($deposit->receipt !== null) {
            Storage::disk('public')->delete($deposit->receipt);
        }
        $deposit->delete();
        $this->dispatch('deletedDeposit');
    }

    public function render()
    {
        return view('livewire.admin.manage-user-deposits', [
            'deposits' => Deposit::where('user_id', $this->user->id)
                ->where(function ($query) {
                    $query->where('plan', 'like', '%' . $this->search . '%')
                        ->orWhere('wallet', 'like', '%' . $this->search . '%')
                        ->orWhere('amount', 'like', '%' . $this->search . '%');
                })
                ->orderByDesc('created_at')->paginate(7, pageName: 'user-deposits-page')
        ]);
    }
}

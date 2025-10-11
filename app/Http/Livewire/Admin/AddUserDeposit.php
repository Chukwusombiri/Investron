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
use App\Notifications\InvestmentApprovalNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;

class AddUserDeposit extends ModalComponent
{
    public $user;
    public $amount='';
    public $wallet = '';
    public $plan='';

    protected function rules(){
        return[
            'amount' => ['required', 'integer','numeric'],        
            'plan' => ['required','exists:plans,name'],
            'wallet' => ['required','exists:wallets,name'],
        ];
        
    }

    public function mount(User $user)
    {
        $this->user=  $user;
    }

    public function submit(){
        $this->validate();
               
        $deposit = new Deposit();
        $deposit->amount  = $this->amount;
        $deposit->plan =  $this->plan;   
        $deposit->plan_id = Plan::where('name','=',$this->plan)->value('id');     
        $deposit->wallet = $this->wallet;
        $deposit->isApproved = true;
        $deposit->user_id = $this->user->id;
        $deposit->address = Wallet::where('name',$this->wallet)->value('address');

        if($deposit->save()){                
            $this->user->acBal += $this->amount;
            $this->user->acRoi += $this->amount;               
            $this->user->save(); 
            $existingPivot = $this->user->plans()->where('plan_id', $deposit->plan_id)->first();

            if ($existingPivot) {                
                $newAmount = $existingPivot->subscription->total + $deposit->amount;
                $newROI = $existingPivot->subscription->roi + $deposit->amount;
            
                $this->user->plans()->updateExistingPivot($deposit->plan_id, ['total' => $newAmount, 'roi' => $newROI]);
            } else {            
                $this->user->plans()->attach($deposit->plan_id, ['total' => $deposit->amount, 'roi' => $deposit->amount]);
            }


            Mail::to($this->user->email)->send(new DepositApprovalMail($deposit));  
            if ($this->user->upline_id !== null && $this->user->hasDeposited !== true) {
                $depositAmount = $deposit->amount; // Ensure $deposit is defined and has amount
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
            $this->closeModalWithEvents(['addedDeposit']);
        }
    }

    public function render()
    {
        return view('livewire.admin.add-user-deposit',[
            'wallets'=>Wallet::all(),
            'plans'=>Plan::all(),
        ]);
    }
}

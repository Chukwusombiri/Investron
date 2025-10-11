<?php

namespace App\Http\Livewire\Admin;

use App\Models\UserWallet;
use App\Models\Withdrawal;
use LivewireUI\Modal\ModalComponent;

class EditWithdrawal extends ModalComponent
{
    public $withdrawal;
    public $amount;
    public $walletId;
    public $planId;    

    protected function rules(){
        return[
            'amount'=>'required|numeric|integer',
            'walletId'=>'required|exists:user_wallets,id',
            'planId' => ['required',function ($attribute, $value, $fail) {
                if (!$this->withdrawal->user->plans()->where('plan_id', $value)->exists()) {
                    $fail('The selected plan is invalid.');
                }
            },]
        ];
    }

    protected $validationAttributes=[
        'walletId'=>'User wallet',
        'planId' => 'Selected plan',
    ];
    
    public function mount($withdrawalId){
        $this->withdrawal = Withdrawal::find($withdrawalId);
        $this->amount = $this->withdrawal->amount;     
        $this->walletId = $this->withdrawal->wallet_id;  
        $this->planId = $this->withdrawal->plan_id;  
    }

    public function save(){
        $this->validate();        
        if($this->amount > $this->withdrawal->user->plans()->where('plan_id',$this->planId)->value('roi')){
            session()->flash('result','Amount exceeded selected plan\'s ROI.');
        }else{            
            $this->withdrawal->amount = $this->amount;
            $this->withdrawal->wallet_id = $this->walletId;
            $this->withdrawal->wallet = $this->withdrawal->user->userWallets()->where('id',$this->walletId)->value('name');
            $this->withdrawal->address= UserWallet::where('user_id',$this->withdrawal->user_id)->where('id',$this->walletId)->value('address');
            $this->withdrawal->plan_id = $this->planId;
            $this->withdrawal->plan = $this->withdrawal->user->plans()->where('plans.id',$this->planId)->value('name');
            $this->withdrawal->save();           
            $this->dispatch('editedWithdrawal');
            $this->closeModal();
        }
    }
    public function render()
    {
        return view('livewire.admin.edit-withdrawal',[
            'wallets'=>UserWallet::where('user_id',$this->withdrawal->user_id)->get(),
            'plans' => $this->withdrawal->user->plans,
        ]);
    }
}

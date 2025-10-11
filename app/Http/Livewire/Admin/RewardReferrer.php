<?php

namespace App\Http\Livewire\Admin;

use App\Models\Referral;
use LivewireUI\Modal\ModalComponent;

class RewardReferrer extends ModalComponent
{
    public Referral $referral;
    public $bonus = '';

    public function mount(Referral $referral){
        $this->referral = $referral;
    }

    public function save(){
        $this->validate([
            'bonus'=>['required','numeric','integer'],
        ]);

        $this->referral->bonus+=$this->bonus;
        $this->referral->save();
        $user = \App\Models\User::where('id',$this->referral->downline_id)->first();
        $user->hasDeposited=true;
        $user->save();

        $upline = \App\Models\User::where('id',$this->referral->user_id)->first();
        $upline->refBonus += $this->bonus;
        $upline->acRoi += $this->bonus;
        $upline->save();

        $this->closeModalWithEvents(['rewardedUpline',]);
    }
    
    public function render()
    {
        return view('livewire.admin.reward-referrer');
    }
}

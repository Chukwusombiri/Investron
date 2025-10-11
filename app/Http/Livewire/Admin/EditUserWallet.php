<?php

namespace App\Http\Livewire\Admin;

use App\Models\UserWallet;
use LivewireUI\Modal\ModalComponent;

class EditUserWallet extends ModalComponent
{
    public UserWallet $wallet;
    public $name;
    public $address;

    public function mount(UserWallet $wallet){
        $this->wallet = $wallet;
        $this->name = $this->wallet->name;
        $this->address=$this->wallet->address;
    }

    public function save(){
        $this->validate();        
        $this->wallet->name = $this->name;
        $this->wallet->address = $this->address;        
        $this->wallet->update();

        $this->closeModalWithEvents(['editedUserWallet']);
    }

    public function render()
    {
        return view('livewire.admin.edit-user-wallet');
    } 

    protected $rules = [
        'name'=>['required','string'],
        'address'=>['required','string'],
    ];

    protected $validationAttributes = [
        'name'=>'wallet name',
        'address'=>'wallet address',
    ];
}

<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\UserWallet;
use LivewireUI\Modal\ModalComponent;

class AddUserWallet extends ModalComponent
{
    public User $user;
    public $name;
    public $address;

    public function mount(User $user){
        $this->user = $user;
    }

    public function save(){
        $this->validate();
        $wallet = new UserWallet();
        $wallet->name = $this->name;
        $wallet->address = $this->address;
        $wallet->user_id = $this->user->id;
        $wallet->save();

        $this->dispatch('addedUserWallet');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.admin.add-user-wallet');
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

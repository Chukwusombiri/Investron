<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Visitor;
use LivewireUI\Modal\ModalComponent;

class Unban extends ModalComponent
{
    public User $user;

    public function mount(User $user){
        $this->user = $user;
    }


    public function unbanUser(){
        $user = User::find($this->user->id);        
        $user->isBanned = false;
        $user->save();
        $this->closeModalWithEvents(['unbannedUser']);        
    }
    public function render()
    {
        return view('livewire.admin.unban');
    }
}

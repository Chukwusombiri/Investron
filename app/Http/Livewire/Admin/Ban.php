<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Visitor;
use LivewireUI\Modal\ModalComponent;

class Ban extends ModalComponent
{ 
    public User $user;

    public function mount(User $user){
        $this->user = $user;
    }
    

    public function banUser(){
        $user = User::find($this->user->id);    
        $user->isBanned = true;
        $user->save();   
        $this->closeModalWithEvents(['bannedUser']);                  
    }
    public function render()
    {
        return view('livewire.admin.ban');
    }
}

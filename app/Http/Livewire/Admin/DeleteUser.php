<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use LivewireUI\Modal\ModalComponent;

class DeleteUser extends ModalComponent
{
    public User $user;
    
    public function mount(User $user){
        $this->user = $user;
    }    


    public function deleteMember(){
        $user = User::find($this->user->id);
        if($user->profile_photo_path !== null){
            Storage::disk('public')->delete($user->profile_photo_path);  
        }
        $user->delete();

        $this->closeModalWithEvents(['deletedUser']);
    }

    public function render()
    {
        return view('livewire.admin.delete-user');
    }
}

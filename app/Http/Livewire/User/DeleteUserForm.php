<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class DeleteUserForm extends Component
{
    public $confirmingUserDeletion = false;
    public $password = '';    

    public function deleteUser(Request $request){
        $this->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = User::find(auth()->user()->id);

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function confirmUserDeletion(){
        $this->confirmingUserDeletion = true;
    }
    public function render()
    {
        return view('livewire.user.delete-user-form');
    }
}

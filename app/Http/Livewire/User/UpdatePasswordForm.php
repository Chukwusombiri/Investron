<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UpdatePasswordForm extends Component
{
    public $password_confirmation = '';
    public $password = '';
    public $current_password = '';

    protected function rules(){
        return [
            'current_password' => 'required|current_password',
            'password' => 'required|confirmed',
        ];
    }
    public function updatePassword(){
        $this->validate();

        $user = User::find(auth()->user()->id);
        $user->password = Hash::make($this->password);
        $user->save();
        $this->reset();
        $this->dispatch('saved');        
    }
    public function render()
    {
        return view('livewire.user.update-password-form');
    }
}

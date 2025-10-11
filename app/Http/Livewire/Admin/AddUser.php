<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Validation\Rules;

class AddUser extends ModalComponent
{
    public $username;
    public $email;
    public $password;
    public $password_confirmation;

    protected function rules(){
        return [
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users,email'],            
            'password' => ['required', 'confirmed', Rules\Password::min(8)],           
        ];
    }

    public function save(){
        $this->validate();
        User::create([            
            'username' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password),                        
        ]);

        $this->closeModalWithEvents(['addedUser']);
    }
    
    public function render()
    {
        return view('livewire.admin.add-user');
    }
}

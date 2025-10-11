<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ResetPassword extends ModalComponent
{
    public User $user;
    public $password = '';
    public $password_confirmation = '';

    protected function rules()
    {
        return [
            'password' => ['required', 'confirmed', Rules\Password::min(8)],
        ];
    }

    public function save()
    {
        $this->validate();

        User::find($this->user->id)->update([
            'password' => Hash::make($this->password),
        ]);
        $this->dispatch('resetedPassword');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.admin.reset-password');
    }
}

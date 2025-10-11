<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UpdateDemographic extends Component
{
    public $age = '';
    public $marital_status = '';
    public $occupation = '';
    public $gender = '';

    public function mount(){
        $this->age = auth()->user()->age;
        $this->gender = auth()->user()->gender;
        $this->occupation = auth()->user()->occupation;
        $this->marital_status = auth()->user()->marital_status;
    }

    public function save(){
        $this->validate([
            'gender' => ['required','string','in:male,female,others'],
            'age'=>'required|numeric|integer',
            'occupation'=>'required|string',
            'marital_status'=>'required|string|in:married,divorced,single,others',
        ],[],[            
            'marital_status' => 'Marital status',
        ]);

        $user = \App\Models\User::findOrFail(auth()->user()->id);        
        $user->gender = $this->gender;
        $user->age = $this->age;
        $user->occupation = $this->occupation;
        $user->marital_status = $this->marital_status;
        $user->update();

        $this->dispatch('saved');
    }
    
    public function render()
    {        
        return view('livewire.user.update-demographic');
    }
}

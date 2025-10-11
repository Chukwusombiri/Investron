<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class BioData extends Component
{
    public $first_name = '';
    public $last_name = '';
    
    public function mount(){
        $this->last_name = auth()->user()->last_name;
        $this->first_name = auth()->user()->first_name;
    }

    public function save() {
        $this->validate([
           'first_name' => 'required|string',
           'last_name' => 'required|string', 
        ],[],[
            'first_name' => 'First name',
            'last_name' => 'Last name',
        ]);

        $user = \App\Models\User::find(auth()->user()->id);
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->save();

        $this->dispatch('saved');
    }
    
    public function render()
    {
        return view('livewire.user.bio-data');
    }
}

<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UserNav extends Component
{
    public $page ='';

    public function mount($sentPage){
        $this->page = $sentPage;
    }
    public function render()
    {
        return view('livewire.user.user-nav');
    }
}

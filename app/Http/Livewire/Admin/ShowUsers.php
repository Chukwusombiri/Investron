<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ShowUsers extends Component
{
    use WithPagination;   
    public $sorter = 'desc';    
    public $search ='';

    protected $listeners = [
        'userUpdated'=>'$refresh',
        'addedUser'=>'$refresh',
        'bannedUser'=>'$refresh',
        'unbannedUser'=>'$refresh',
        'deletedUser'=>'$refresh',
    ];
    
    public function updatingSearch()
    {
        $this->resetPage();                   
    }
    public function verify($id){
        $user = User::find($id);
        $user->markEmailAsVerified();
        $this->dispatch(['userVerified']);
    }
    public function clear(){
        $this->search = '';
    }
    public function render()
    {       
        return view('livewire.admin.show-users',[
            'users' => User::where('username', 'like', '%'.$this->search.'%')            
                        ->orWhere('email','LIKE', '%'.$this->search.'%')        
                        ->orderBy('created_at',$this->sorter)
                        ->paginate(7)
        ]);        
    }
}

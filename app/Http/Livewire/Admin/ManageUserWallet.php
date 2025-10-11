<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\UserWallet;
use Livewire\Component;
use Livewire\WithPagination;

class ManageUserWallet extends Component
{
    use WithPagination;
    public $user;
    public $search = '';
    protected $listeners =['addedUserWallet'=>'$refresh','editedUserWallet'=>'$refresh'];

    public function mount(User $user){
        $this->user = $user;
    }

    public function updatedSearch(){
        $this->resetPage( pageName: 'user-wallets-page');
    }

    public function clear(){
        $this->search = '';
        $this->resetPage( pageName: 'user-wallets-page');
    }

    public function deleteWallet($id){
       $wallet = UserWallet::find($id);      
       $wallet->delete();     
       $this->dispatch('deletedUserWallet');
    }

    public function render()
    {
        return view('livewire.admin.manage-user-wallet',[
            'userwallets'=>$this->user->userWallets()->where('name','like','%'.$this->search.'%')->paginate(7, pageName: 'user-wallets-page'),
        ]);
    }
}

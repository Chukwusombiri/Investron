<?php

namespace App\Http\Livewire\User;

use App\Models\Deposit;
use Livewire\Component;
use Livewire\WithPagination;

class DepositHistory extends Component
{
    Use WithPagination;
    public $search = '';

    public function updatedSearch(){
        $this->resetPage();
    }

    public function clear(){
        $this->search = '';
        $this->resetPage();
    }

    public function render()
    {
        $deposits = Deposit::where('user_id',auth()->user()->id)
        ->where(function($query) {
            $query->where('plan','like','%'.$this->search.'%')
            ->orWhere('wallet','like','%'.$this->search.'%')
            ->orWhere('amount','like','%'.$this->search.'%');
        })                            
        ->orderByDesc('created_at')
        ->paginate(7);
        return view('livewire.user.deposit-history',[
            'deposits' => $deposits
        ]);
    }
}

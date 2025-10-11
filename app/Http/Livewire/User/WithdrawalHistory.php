<?php

namespace App\Http\Livewire\User;

use App\Models\Withdrawal;
use Livewire\Component;
use Livewire\WithPagination;

class WithdrawalHistory extends Component
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
        $withdrawals = Withdrawal::where('user_id', auth()->user()->id)
        ->where(function($query) {
            $query->where('wallet', 'like', '%'.$this->search.'%')
                  ->orWhere('amount', 'like', '%'.$this->search.'%');
        })
        ->orderByDesc('created_at')
        ->paginate(7);
        return view('livewire.user.withdrawal-history',[
            'withdrawals' => $withdrawals
        ]);
    }
}

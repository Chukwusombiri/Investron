<?php

namespace App\Http\Livewire\User;

use App\Models\Deposit;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Transactions extends Component
{
    Use WithPagination;
    public $search = '';
    public $perPage = 7;

    public function updatedSearch(){
        $this->resetPage();
    }

    public function clear(){
        $this->search = '';
        $this->resetPage();
    }

    public function render()
    {
        $depositsQuery = Deposit::select('id', 'plan', 'amount', 'wallet','isApproved', 'created_at as transaction_date')
        ->where('user_id', auth()->user()->id);
    $withdrawalsQuery = Withdrawal::select('id', \DB::raw("'' as plan"), 'amount', 'wallet','isApproved', 'created_at as transaction_date')
        ->where('user_id', auth()->user()->id);

    // Apply search filter if $search is not empty
    if (!empty($this->search)) {
        $depositsQuery->where(function ($query) {
            $query->where('plan', 'like', '%' . $this->search . '%')
                ->orWhere('amount', 'like', '%' . $this->search . '%')
                ->orWhere('wallet', 'like', '%' . $this->search . '%');
        });

        $withdrawalsQuery->where(function ($query) {
            $query->where('amount', 'like', '%' . $this->search . '%')
                ->orWhere('wallet', 'like', '%' . $this->search . '%');
        });
    }

    $transactions = $depositsQuery->union($withdrawalsQuery)
        ->orderByDesc('transaction_date')
        ->paginate($this->perPage);
        return view('livewire.user.transactions',[
            'transactions' => $transactions,
        ]);
    }
}

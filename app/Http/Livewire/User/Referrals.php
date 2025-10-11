<?php

namespace App\Http\Livewire\User;

use App\Models\Referral;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Referrals extends Component
{
    use WithPagination;
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
        $referrals = Referral::where('user_id',auth()->user()->id)
        ->where(function($query) {
            $query->where('downlineUsername','like','%'.$this->search.'%')
            ->orWhere('bonus','like','%'.$this->search.'%');
        })                            
        ->orderByDesc('updated_at')
        ->paginate(6);
        return view('livewire.user.referrals',[
            'referrals' => $referrals,
        ]);
    }
}

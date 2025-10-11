<?php

namespace App\Http\Livewire\Admin;

use App\Models\Referral;
use Livewire\Component;
use Livewire\WithPagination;

class ShowReferrals extends Component
{
    use WithPagination;

    public $search = '';

    protected $listeners = [
        'rewardedUpline' => '$refresh',
    ];

    public function updatedSearch(){
        $this->resetPage();
    }

    public function clear(){
        $this->search = '';
        $this->resetPage();
    }

    public function removeReferral($id){
        $referral = Referral::find($id);
        $user = \App\Models\User::where('id',$referral->downline_id)->first();
        $user->uplineUsername = null;
        $user->upline_id = null;
        $user->save();
        $referral->delete();
        $this->dispatch('deletedReferral');
    }

    public function render()
    {
        $referrals = Referral::where('username','like','%'.$this->search.'%')
        ->orWhere('bonus','like','%'.$this->search.'%')
        ->orWhere('downlineUsername','like','%'.$this->search.'%')
        ->orderByDesc('updated_at')
        ->paginate(10);
        return view('livewire.admin.show-referrals',[
            'referrals' => $referrals,
        ]);
    }
}

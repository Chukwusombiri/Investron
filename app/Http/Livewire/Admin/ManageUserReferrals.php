<?php

namespace App\Http\Livewire\Admin;

use App\Models\Referral;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ManageUserReferrals extends Component
{
    use WithPagination;
    public $search = '';
    public $perPage = 7;
    public User $user;

    protected $listeners = [
        'rewardedUpline' => '$refresh',
    ];

    public function updatedSearch(){
        $this->resetPage( pageName: 'user-referrals-page');
    }

    public function mount(User $user){
        $this->user = $user;
    }
    public function clear(){
        $this->resetPage( pageName: 'user-referrals-page');
        $this->search = '';
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
        $referrals = Referral::where('user_id',$this->user->id)
        ->where(function($query){
            $query->where('bonus','like','%'.$this->search.'%')
            ->orWhere('downlineUsername','like','%'.$this->search.'%');
        })        
        ->orderByDesc('updated_at')
        ->paginate($this->perPage, pageName: 'user-referrals-page');
        return view('livewire.admin.manage-user-referrals',[
            'referrals' => $referrals,
        ]);
    }
}

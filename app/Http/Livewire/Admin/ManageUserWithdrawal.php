<?php

namespace App\Http\Livewire\Admin;

use App\Mail\WithdrawalApprovalMail;
use App\Models\Withdrawal;
use App\Models\User;
use App\Notifications\WithdrawalApprovalNotification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithPagination;
use Throwable;

class ManageUserWithdrawal extends Component
{
    use WithPagination;

    public $search = '';    
    public User $user;

    protected $listeners = [
        'addedUserWithdrawal'=>'$refresh',
        'editedWithdrawal'=>'$refresh'
    ];

    public function mount(User $user){
        $this->user = $user;
    }

    public function updatedSearch(){
        $this->resetPage( pageName: 'user-withdrawals-page');
    }

    public function clear(){
        $this->search = '';
        $this->resetPage( pageName: 'user-withdrawals-page');
    }

    public function approve($id){
       
        try{
            $withdrawal = Withdrawal::find($id);
            $user = User::find($withdrawal->user_id);
            $existingPivot = $user->plans()->where('plan_id', $withdrawal->plan_id)->first();
            if ($existingPivot) {                            
                $newROI = $existingPivot->subscription->roi - $withdrawal->amount;                
                $user->plans()->updateExistingPivot($withdrawal->plan_id, ['roi' => $newROI]);
            }
            
            $user->acRoi = $user->plans()->sum('plan_user.roi');
            $user->save();             
            $withdrawal->isApproved = true;           
            $withdrawal->save(); 
            Mail::to($user->email)->send(new WithdrawalApprovalMail($withdrawal)); 
            $this->dispatch('approvedWithdrawal');          
        }catch(Throwable $th){
            Log::error('error during withdrawal approval: '.$th->getMessage());
            session()->flash('error','Something went wrong! Don\'t fret, we are fixing it.');
        }                        
    }

    public function delete($id){
       $withdrawal = Withdrawal::find($id);      
       $withdrawal->delete();     
       $this->dispatch('deletedWithdrawal');
    }

    public function render()
    {
        return view('livewire.admin.manage-user-withdrawal',[
            'withdrawals'=>Withdrawal::where('user_id',$this->user->id)
            ->where(function($query){
                $query->where('wallet','like','%'.$this->search.'%')
                ->orWhere('amount','like','%'.$this->search.'%');
            })
            ->orderByDesc('created_at')->paginate(5,pageName: 'user-withdrawals-page')
        ]);
    }
}

<?php

namespace App\Http\Livewire\Admin;

use App\Mail\WithdrawalApprovalMail;
use App\Models\User;
use App\Models\UserWallet;
use App\Models\Withdrawal;
use App\Notifications\WithdrawalApprovalNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Livewire\Component;

class AddWithdrawal extends Component
{
    public $wallet;
    public $user;
    public $amount;
    public $userWallets = [];
    public $search = '';
    public $allUsers = [];

    protected $listeners = [
        'loadedWallets'=>'$refresh'
    ];

    protected function rules(){
       return [ 
        'amount' => ['required', 'integer','numeric'],
        'wallet' => ['required','exists:user_wallets,name'],           
        'user' => ['required','exists:App\Models\User,id'],];
    }   

    public function handleFocus(){
        $this->allUsers = User::all();
    }

    public function setUser($id){
        $this->user = $id;
        $this->search = User::where('id',$id)->value('username');
        $this->allUsers = [];
        $this->userWallets = UserWallet::where('user_id',$this->user)->get();
    }

    public function updatedSearch()
    {
        $this->allUsers = User::where('username','like','%'.$this->search.'%')
                            ->orWhere('email','like','%'.$this->search.'%')
                            ->get();
    }


    public function submit(){
        $this->validate();
        $acRoi = User::select('acRoi')->where('id',$this->user)->value('acRoi');       

        if($this->amount > $acRoi){
            session()->flash('error','Amount exceeds Return on Investment.');
        }else{
            $withdrawal = new Withdrawal();        
            $withdrawal->amount = $this->amount;
            $withdrawal->user_id = $this->user;
            $withdrawal->wallet = $this->wallet;
            $withdrawal->address = UserWallet::where('user_id',$this->user)->where('name',$this->wallet)->value('address');        
            $withdrawal->isApproved = true;

            if($withdrawal->save()){
                $user = User::find($this->user);
                $user->acRoi -= $this->amount;
                $user->update();            
                Mail::to($user->email)->send(new WithdrawalApprovalMail($withdrawal));
                session()->flash('success','withdrawal record was created successfully');  
                $this->reset();                 
            }               
        }                
    }

    public function render()
    {
        return view('livewire.admin.add-withdrawal');
    }
}

<?php

namespace App\Http\Livewire\Admin;

use App\Mail\WithdrawalApprovalMail;
use App\Models\User;
use App\Models\UserWallet;
use App\Models\Withdrawal;
use App\Notifications\WithdrawalApprovalNotification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use LivewireUI\Modal\ModalComponent;
use Throwable;

class AddUserWithdrawal extends ModalComponent
{
    public $user;
    public $amount;
    public $walletId;
    public $planId;

    protected $listeners = ['addedUserWallet' => '$refresh'];

    protected function rules()
    {
        return [
            'amount' => ['required', 'integer', 'numeric'],
            'walletId' => 'required|exists:user_wallets,id',
            'planId' => ['required', function ($attribute, $value, $fail) {
                if (!$this->user->plans()->where('plan_id', $value)->exists()) {
                    $fail('The selected plan is invalid.');
                }
            },]
        ];
    }

    public function mount($userId)
    {
        $this->user = User::find($userId);
    }

    public function submit()
    {
        $this->validate();

        if ($this->amount > $this->user->plans()->where('plan_id', $this->planId)->value('roi')) {
            session()->flash('result', 'Amount exceeds available funds.');
        } else {
            $withdrawal = new Withdrawal();
            $withdrawal->amount = $this->amount;
            $withdrawal->user_id = $this->user->id;
            $withdrawal->wallet_id = $this->walletId;
            $withdrawal->wallet = $this->user->userWallets()->where('id', $this->walletId)->value('name');
            $withdrawal->address = $this->user->userWallets()->where('id', $this->walletId)->value('address');
            $withdrawal->plan_id = $this->planId;
            $withdrawal->plan = $this->user->plans()->where('plans.id', $this->planId)->value('name');
            $withdrawal->isApproved = true;

            try{
                $user = User::find($this->user->id);
                $existingPivot = $user->plans()->where('plan_id', $this->planId)->first();
                if ($existingPivot) {
                    $newROI = $existingPivot->subscription->roi - $this->amount;
                    $user->plans()->updateExistingPivot($this ->planId, ['roi' => $newROI]);
                    
                    $user->acRoi =  $user->plans()->sum('roi');
                    $user->save();
                    $withdrawal->save();
                    Mail::to($user->email)->send(new WithdrawalApprovalMail($withdrawal));
                    $this->dispatch('addedUserWithdrawal');
                    $this->closeModal();
                }               
            }catch(Throwable $th){
                Log::error('error adding user withdrawal: '.$th->getMessage());
                session('result', 'Oops, there was an error');
            }
        }
    }

    public function render()
    {
        return view('livewire.admin.add-user-withdrawal', [
            'wallets' => UserWallet::where('user_id', $this->user->id)->get(),
            'plans' => $this->user->plans,
        ]);
    }
}

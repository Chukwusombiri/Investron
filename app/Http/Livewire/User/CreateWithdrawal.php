<?php

namespace App\Http\Livewire\User;

use App\Models\Plan;
use App\Models\UserWallet;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CreateWithdrawal extends Component
{
    public $amount = '';
    public $selectedWallet = '';
    public $selectedAddress = '';
    public $selectedWalletId = '';
    public $allWallets;
    public $plan_id;

    protected function rules()
    {
        return [
            'amount' => ['required', 'numeric', 'integer',],
            'selectedWalletId' => ['required', 'exists:user_wallets,id'],
            'selectedWallet' => ['required', 'string', 'exists:user_wallets,name'],
            'selectedAddress' => ['required', 'string', 'exists:user_wallets,address'],
            'plan_id' => ['required', function ($attribute, $value, $fail) {
                if (!auth()->user()->plans()->where('plans.id', $value)->exists()) {
                    $fail('The selected plan is invalid.');
                }
            },],
        ];
    }

    protected $validationAttributes = [
        'selectedWallet' => 'Payment method name',
        'selectedAddress' => 'Payment method details',
        'SelectedWalletId' => 'Payment method',
        'plan_id' => 'Plan',
    ];

    public function tryValue($value)
    {
        try {
            $wallet = UserWallet::findOrFail($value);
            if ($this->selectedWalletId !== '' && $this->selectedWalletId === $wallet->id) {
                $this->selectedWallet = '';
                $this->selectedAddress = '';
                $this->selectedWalletId = '';
                return;
            }
            $this->selectedWallet = $wallet->name;
            $this->selectedAddress = $wallet->address;
            $this->selectedWalletId = $wallet->id;
        } catch (\Throwable $th) {
            Log::error('Unable to reolve wallet: ' . $th);
            session()->flash('error', 'Unable to resolve payment method');
        }
    }

    public function withdraw()
    {
        $this->validate([
            'amount' => ['required', 'numeric', 'integer', 'min:1', 'lte:' . auth()->user()->acRoi,],
            'selectedWalletId' => ['required', 'exists:user_wallets,id'],
            'selectedWallet' => ['required', 'string', 'exists:user_wallets,name'],
            'selectedAddress' => ['required', 'string', 'exists:user_wallets,address'],
            'plan_id' => ['required',function ($attribute, $value, $fail) {
                if (!auth()->user()->plans()->where('plans.id', $value)->exists()) {
                    $fail('The selected plan is invalid.');
                }
            },],
        ], ['lte' => 'Amount to be withdrawn must be less than or equal to your available balance']);
        try {
            $withdrawal = new Withdrawal();
            $withdrawal->amount = $this->amount;
            $withdrawal->wallet = $this->selectedWallet;
            $withdrawal->address = $this->selectedAddress;
            $withdrawal->wallet_id = $this->selectedWalletId;
            $withdrawal->plan = Plan::where('id',$this->plan_id)->value('name');
            $withdrawal->plan_id = $this->plan_id;
            $withdrawal->user_id = auth()->user()->id;
            $withdrawal->save();
            \App\Events\UserWithdrew::dispatch($withdrawal);
            session()->flash('success', 'Successful! Your funds withdrawal request is under review.');
            $this->reset();
        } catch (\Throwable $th) {
            throw $th;
            Log::error($th);
            session()->flash('error', 'Something went wrong, try again later.');
        }
    }

    public function render()
    {
        $this->allWallets = \App\Models\UserWallet::where('user_id', auth()->user()->id)->get();
        return view('livewire.user.create-withdrawal');
    }
}

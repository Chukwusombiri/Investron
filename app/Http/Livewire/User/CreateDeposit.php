<?php

namespace App\Http\Livewire\User;

use App\Models\Deposit;
use App\Models\Plan;
use App\Models\Wallet;
use Exception;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CreateDeposit extends Component
{
    public $amount = '';
    public $selectedWallet = '';
    public $selectedAddress = '';
    public $selectedWalletId = '';
    public \App\Models\Plan $plan;
    public $allWallets;

    public function mount($sentPlan)
    {
        $this->plan = $sentPlan;
        $this->allWallets = Wallet::all();
    }

    protected $rules = [
        'amount' => ['required', 'numeric', 'integer',],
        'selectedWallet' => ['required', 'string', 'exists:wallets,name'],
        'selectedAddress' => ['required', 'string', 'exists:wallets,address'],
        'selectedWalletId' => ['required','string','exists:wallet,id'],
    ];

    protected $validationAttributes = [
        'selectedWallet' => 'Funding source',
        'selectedAddress' => 'Funding source details',
        'selectedWalletId' => 'Funding wallet',
    ];

    public function tryValue($value)
    {
        try {
            $wallet = Wallet::findOrFail($value);
            if ($this->selectedWallet !== '' && $this->selectedWallet === $wallet->name) {
                $this->selectedWallet = '';
                $this->selectedAddress = '';
                $this->selectedWalletId = '';
                return;
            }
            $this->selectedWallet = $wallet->name;
            $this->selectedAddress = $wallet->address;
            $this->selectedWalletId = $wallet->id;
        } catch (\Throwable $th) {
            session()->put('error','Something went wrong! Don\'t panic, it\'ll be rectified soon.');
            Log::error('Deposit error: '.$th->getMessage());
        }
    }

    public function deposit()
    {
        $this->validate(['amount' => ['required', 'numeric', 'integer', 'gte:' . $this->plan->min,]]);
        try {
            $deposit = new Deposit();
            $deposit->amount = $this->amount;
            $deposit->wallet = $this->selectedWallet;
            $deposit->address = $this->selectedAddress;
            $deposit->wallet_id = $this->selectedWalletId;
            $deposit->user_id = auth()->user()->id;
            $deposit->plan =  $this->plan->name;
            $deposit->plan_id = $this->plan->id;
            $deposit->save();
            \App\Events\UserDeposited::dispatch($deposit);
            
            session()->put('deposit', [
                'wallet' => $deposit->wallet,
                'amount' => $deposit->amount,
                'address' => $deposit->address,
            ]);
            return redirect()->route('user.deposit.complete');
        } catch (\Throwable $th) {
            throw $th;
            Log::error($th);
            session()->flash('error', 'something went wrong, try again later.');
        }
    }

    public function render()
    {
        return view('livewire.user.create-deposit');
    }
}

<?php

namespace App\Http\Livewire\User;

use App\Models\UserWallet;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class EditPayment extends Component
{
    public $name = '';
    public $address = '';
    public UserWallet $wallet;

    public function mount($sentWallet){
        $this->wallet =$sentWallet;
        $this->name = $sentWallet->name;
        $this->address = $sentWallet->address;
    }

    protected $rules = [
        'name' => 'required|string',
        'address' => 'required|string',
    ];

    protected $validationAttributes = [
        'name' => 'Cryptocurrency wallet name',
        'address' => 'Crytocurrency wallet address',
    ];

    public function save(){
        $this->validate();

        try {
            $this->wallet->name = $this->name;
            $this->wallet->address = $this->address;
            $this->wallet->save();
            session()->flash('success','Successfully updated payment method');
        } catch (\Throwable $th) {
            Log::error('Unable to update wallet: '.$th);
            session()->flash('error','Unable to update payment method');
        }
    }
    public function render()
    {
        return view('livewire.user.edit-payment');
    }
}

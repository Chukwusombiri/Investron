<?php

namespace App\Http\Livewire\User;

use App\Models\UserWallet;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CreatePayment extends Component
{
    public $name = '';
    public $address = '';    

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
            $wallet = new UserWallet();
            $wallet->name = $this->name;
            $wallet->address = $this->address;
            $wallet->user_id = auth()->user()->id;
            $wallet->save();
            $this->reset();
            session()->flash('success','Successfully added new payment method');
        } catch (\Throwable $th) {
            Log::error('Unable to update wallet: '.$th);
            session()->flash('error','Unable to add new payment method');
        }
    }
    public function render()
    {
        return view('livewire.user.create-payment');
    }
}

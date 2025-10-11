<?php

namespace App\Http\Livewire\User;

use App\Models\UserWallet;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class Payments extends Component
{
    Use WithPagination;

    
    public function deleteWallet($id){
        try {
            $wallet = UserWallet::find($id);
            $wallet->delete();
            session()->flash('success','You\'ve deleted a payment record');
        } catch (\Throwable $th) {
            throw $th;
            Log::error($th);
            session()->flash('error','Oops! Somthing\'s wrong try again.');
        }        
    }

    public function render()
    {
        $wallets = UserWallet::where('user_id',auth()->user()->id)->orderByDesc('created_at')->paginate(5);
        $latest = auth()->user()->withdrawals->sortByDesc('created_at')->take(7);
        return view('livewire.user.payments',[
            'wallets' => $wallets,
            'latest' => $latest,
        ]);
    }
}

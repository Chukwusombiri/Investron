<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Plan;
use App\Models\UserWallet;
use Illuminate\Support\Facades\Log;

class UserPagesController extends Controller
{
    public function index()
    {
        $plans = \App\Models\Plan::all();
        $newtransactions = collect();
        $newtransactions = $newtransactions->merge(auth()->user()->deposits)->merge(auth()->user()->withdrawals)
            ->sortByDesc('created_at')->values()->take(7);
        return view('user.dashboard')->with([
            'plans' => $plans,
            'newtransactions' => $newtransactions,
        ]);
    }
    public function allSet()
    {
        if (!session()->has('accountUpdated')) {
            return redirect()->route('user.dashboard');
        }
        return view('user.allSet');
    }

    public function payments(){
        return view('user.payments');
    }

    public function createPayment(){
        return view('user.createPayment');
    }

    public function editPayment($id){  
        try {
            $wallet = UserWallet::findOrFail($id);     
        return view('user.editPayment')->with('wallet',$wallet);
        } catch (\Throwable $th) {
            Log::error('Unable to find wallet: '.$th);
            return redirect()->back('error','Oops! Something went wrong, retry previous action and if it error persists contact website administrators');
        }         
    }

    public function pricingTable(){
        $plans = \App\Models\Plan::all();
        return view('user.pricingTable')->with([
            'plans' => $plans,
        ]);
    }

    public function depositCreate($id){
        try {
            $plan = Plan::findOrFail($id);
            return view('user.createDeposit')->with('plan',$plan);
        } catch (\Throwable $th) {
            Log::error('Unable to create deposit: '.$th);
            return redirect()->back()->with('error','Oop! Something went wrong, try again later.');
        }       
    }

    public function depositComplete(){
        $deposit = session()->get('deposit');        
        if(!$deposit){
            return redirect()->route('user.deposits');
        }
        return view('user.depositComplete')->with('deposit',$deposit);
    }

    public function removeSession(){
        $deposit = session()->get('deposit');
        if($deposit){
            session()->forget('deposit');
            return response('successful');
        }else{
            return response('session data doesn\'t exist');
        }
    }

    public function depositHistory(){
        return view('user.depositHistory');
    }

    public function depositReceipt($id){
        try {
            $deposit = Deposit::findOrFail($id);
            return view('user.depositReceipt')->with('deposit',$deposit);
        } catch (\Throwable $th) {
           return redirect()->back()->with('error','Something went wrong, retry previous action.');
        }       
    }

    public function withdrawalCreate(){
        return view('user.withdrawalCreate');
    }

    public function withdrawalHistory(){
        return view('user.withdrawalHistory');
    }

    public function transactions(){
        return view('user.transactions');
    }

    public function viewReferral(){
        return view('user.referrals');
    }
}

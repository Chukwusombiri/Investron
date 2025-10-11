<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wallet;
use App\Notifications\NewWalletNotification;
use App\Notifications\WalletUpdateNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyWalletController extends Controller
{
    public function index(){             
        $wallets = Wallet::all();
        return view('admin.companywallets')->with(['wallets'=>$wallets,          
        ]);
    }

    public function create(){                    
        return view('admin.addcompanywallet');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>['required','string'],
            'address'=>['required','string'],          
        ]);

        $wallet = new Wallet();
        $wallet->name = $request->name;
        $wallet->address = $request->address; 
        $wallet->icon_path = 'wallets/'.$request->name.'jpg';     
        $wallet->save();

        return redirect()->back()->with('success', 'New Company wallet record was successfully created');
    }

    public function edit($id){
        $wallet =  Wallet::find($id);              
        return view('admin.editcompanywallet')->with([
            'wallet'=>$wallet,
        ]);
    }

    public function update(Request $request,$id){
        $wallet = Wallet::find($id);

        $request->validate([
            'name'=>['required','string'],
            'address'=>['required','string',],  
        ]);
        $wallet->name = $request->name;
        $wallet->address = $request->address;  
        $wallet->update();        
        return redirect()->route('admin.company_wallets')->with('success', $wallet->name.' wallet successfully updated');
    }

    public function destroy($id){
        $wallet = Wallet::find($id);
        $old = $wallet->name;
        $wallet->delete();
        return redirect()->back()->with('success', $old.' wallet successfully Deleted');
    }
}

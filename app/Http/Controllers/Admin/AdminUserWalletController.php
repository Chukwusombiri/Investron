<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserWallet;
use Illuminate\Http\Request;

class AdminUserWalletController extends Controller
{
  
    public function create($id){ 
        if(User::find($id)) 
        {            
            return view('admin.adduserwallets',['user_id'=>$id]);
        }else{
            return redirect()->back();
        }           
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>['required','string'],
            'address'=>['required','string','unique:user_wallets,address'],
            'user_id'=>['required','exists:users,id'],
        ]);

        $userwallet = new UserWallet();
        $userwallet->name = $request->name;
        $userwallet->address = $request->address;
        $userwallet->user_id = $request->user_id;
        $userwallet->save();

        return redirect()->back()->with('success', 'Investor wallet successfully added');
    }

    public function edit($id){
        $wallet =  UserWallet::find($id);       
        return view('admin.edituserwallet')->with([
           'wallet'=>$wallet,
        ]);
    }

    public function update(Request $request,$id){
        $userwallet = UserWallet::find($id);

        $this->validate($request,[
            'name'=>['required','string'],
            'address'=>['required','string','unique:user_wallets,address,'.$userwallet->id],            
        ]);
        $userwallet->name = $request->name;
        $userwallet->address = $request->address;        
        $userwallet->update();

        return redirect()->back()->with('success', 'Investor wallet successfully updated');
    }

    public function destroy($id){
        $userwallet = UserWallet::find($id);
        $userwallet->delete();
        return redirect()->back();
    }
}

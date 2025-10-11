<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Downline;
use App\Models\User;
use App\Notifications\NewDownlineNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;

class UsersController extends Controller
{
    

    public function __construct()
    {
           
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {                    
        return view('admin.users');
    }
    
  
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {              
        $user = User::find($id);               
       return view('admin.userTransactions')->with(['user'=>$user]);
    }

    public function edit($id){
        $user = User::find($id);
        return view('admin.userProfile')->with('user',$user);
    }

    public function account($id){
        $user = User::find($id);        
        return view('admin.userAccount')->with('user', $user);
    }
}

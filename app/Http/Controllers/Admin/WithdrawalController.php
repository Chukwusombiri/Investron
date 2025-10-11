<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Withdrawal;
use App\Notifications\WithdrawalApprovalNotification;
use Illuminate\Http\Request;

class WithdrawalController extends Controller
{       
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {            
        return view('admin.withdrawals');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {                       
        return view('admin.addWithdrawal');
    }     
}

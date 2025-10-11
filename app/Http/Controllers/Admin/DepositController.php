<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Plan;
use App\Models\User;
use App\Models\Wallet;
use App\Notifications\InvestmentApprovalNotification;
use App\Notifications\ReferralIncomeNotification;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function index(){
        return view('admin.deposits');
    }

    public function create()
    {                                        
        return view('admin.addDeposit');              
    }    
}

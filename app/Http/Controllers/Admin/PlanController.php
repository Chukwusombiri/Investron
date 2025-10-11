<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index(){               
        $plans = Plan::all();
        return view('admin.plans')->with(['plans'=>$plans,
        ]);
    }

    public function create(){               
        return view('admin.addplan');
    }
    
    public function edit($id){
        $plan =  Plan::find($id);               
        return view('admin.editplan')->with([
            'plan'=>$plan,
        ]);
    }    

    public function destroy($id){
        Plan::find($id)->delete();
        return redirect()->back()->with('success', 'Investment plan record was successfully Deleted');
    }
}

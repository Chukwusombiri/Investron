<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserContactController extends Controller
{
    public function index(){
        return view('user.identify_details');
    }

    public function savePersonal(Request $request){
        $request->validate([
            'username' => [Rule::excludeIf(auth()->user()->username!==null),'required','string'],
            'first_name'=>'required|string',
            'last_name'=>'required|string',
        ],[],[
            'first_name' => 'First name',
            'last_name' => 'First name',
        ]);

        $user = User::findOrFail(auth()->user()->id);        
        $user->username = $request->username ?? auth()->user()->username;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->update();
        return redirect()->route('user.get.bio');
    }

    public function getBio(){
        return view('user.getBio');
    }

    public function saveDemographic(Request $request){
        $request->validate([
            'gender' => ['required','string','in:male,female,others'],
            'age'=>'required|numeric|integer',
            'occupation'=>'required|string',
            'marital_status'=>'required|string|in:married,divorced,single,others',
        ],[],[            
            'marital_status' => 'Marital status',
        ]);

        $user = User::findOrFail(auth()->user()->id);        
        $user->gender = $request->gender;
        $user->age = $request->age;
        $user->occupation = $request->occupation;
        $user->marital_status = $request->marital_status;
        $user->update();
        return redirect()->route('user.get.contact');
    }

    public function getContact(){        
        return view('user.getContact');
    }
}

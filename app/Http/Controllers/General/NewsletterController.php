<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Models\EmailList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsletterController extends Controller
{
    public function store(Request $request){
        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => ['required','email','unique:email_lists,email'],
            'acceptedTerms' => ['accepted']
        ],[],[
            'first_name' => 'First name',
            'last_name' => 'last name',
            'acceptedTerms' => 'Terms of use and privacy policy'
        ]);

        EmailList::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'user_id' => Auth::check() ? Auth::id() : null,
        ]);

        return redirect()->back();
    }
}

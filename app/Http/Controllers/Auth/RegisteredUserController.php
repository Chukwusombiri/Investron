<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Referral;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(Request $request): Response
    {        
        return Inertia::render('Auth/Register',['ref' => $request->query('ref')]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'acceptedTerms' => 'accepted',
            'upline' => 'nullable|exists:users,referralId'
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        $parent = null;
        $parentUpline = null;
        if($request->has('upline')){
            $parent = User::where('referralId',$validated['upline'])->first();
            $user->uplineUsername = $parent->username;
            $user->upline_id = $parent->id;
            $user->save();

            Referral::create([
                'username' => $parent->username,
                'level' => 1,
                'downlineUsername' => $user->username ?? substr($user->email,0,strpos($user->email,'@')),
                'downline_id'=>$user->id,
                'user_id'=>$parent->id, 
            ]);

            if(User::where('upline_id',$parent->upline_id)->exists()){
                $parentUpline = User::where('upline_id',$parent->upline_id)->first();
                Referral::create([
                    'username' => $parentUpline->username,
                    'level' => 2,
                    'downlineUsername' => $user->username ?? substr($user->email,0,strpos($user->email,'@')),
                    'downline_id'=>$user->id,
                    'user_id'=>$parentUpline->id, 
                ]);
            }
        }

        Auth::login($user);

        $intendedUrl = redirect()->intended(route('user.dashboard'))->getTargetUrl();
        
        /* return Inertia::location($intendedUrl); */  
        return response('', 409, ['X-Inertia-Location' => $intendedUrl]);   
    }
}

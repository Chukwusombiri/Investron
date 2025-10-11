<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ConfirmedUserContactMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!auth('web')->check()){
            session()->put('intended_route', $request->url());            
            return redirect()->route('login');
        }

        $user = User::find(auth()->user()->id);
        if($user->last_name==null || $user->first_name==null){
            session()->put('intended_route', $request->url());            
            return redirect()->route('user.get.personal');
        }

        if($user->gender===null || $user->marital_status===null || $user->age===null || $user->occupation===null){
            session()->put('intended_route', $request->url());            
            return redirect()->route('user.get.bio');
        }

        if($user->phone===null || $user->address===null || $user->city===null || $user->country==null || $user->nationality==null){
            session()->put('intended_route', $request->url());            
            return redirect()->route('user.get.contact');
        }

        $deposit = session()->get('deposit');
        $currentRouteName = Route::currentRouteName();
        $previousRouteName = app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();
        if($deposit && $previousRouteName==='user.deposit.complete' && $currentRouteName !=='user.deposit.complete'){
            session()->forget('deposit');
        }

        return $next($request);
    }
}

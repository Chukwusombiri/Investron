<?php

namespace App\Listeners;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Auth\Events\Authenticated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LoginOnlineListener
{
    use InteractsWithQueue;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Authenticated $event)
    {
        if ($event->guard==='web') {
            $user = User::findOrFail($event->user->id);            
            $user->last_sign_in_at = $user->last_sign_out_at ? $user->last_sign_out_at : now();
            $user->save();
        }elseif($event->guard==='admin'){
            $admin = Admin::findOrFail($event->user->id);
            $admin->isOnline = true;
            $admin->last_sign_in_at = $admin->last_sign_out_at ? $admin->last_sign_out_at : now();;
            $admin->save();
        }
    }
}

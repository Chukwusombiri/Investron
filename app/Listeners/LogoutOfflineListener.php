<?php

namespace App\Listeners;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Auth\Events\Logout as EventsLogout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogoutOfflineListener
{
    Use InteractsWithQueue;
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
     * @param  \App\Events\Logout  $event
     * @return void
     */
    public function handle(EventsLogout $event)
    {
        if ($event->guard==='web') {
            $user = User::findOrFail($event->user->id);
            $user->last_sign_out_at = now();
            $user->save();
        } elseif($event->guard==='admin') {
            $admin = Admin::findOrFail($event->user->id);
            $admin->isOnline = false;
            $admin->last_sign_out_at = now();
            $admin->save();
        }                
    }
}

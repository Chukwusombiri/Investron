<?php

namespace App\Listeners;

use App\Events\UserDeposited;
use App\Mail\User\DepositMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendDepositInstructions
{
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
     * @param  \App\Events\UserDeposited  $event
     * @return void
     */
    public function handle(UserDeposited $event)
    {
        Mail::to(auth()->user()->email)->send(new DepositMail($event->deposit));
    }
}

<?php

namespace App\Listeners;

use App\Events\UserWithdrew;
use App\Mail\User\WithdrawalMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendWithdrawalNotification
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
     * @param  \App\Events\UserWithdrew  $event
     * @return void
     */
    public function handle(UserWithdrew $event)
    {
        Mail::to(auth()->user()->email)->send(new WithdrawalMail($event->withdrawal));
    }
}

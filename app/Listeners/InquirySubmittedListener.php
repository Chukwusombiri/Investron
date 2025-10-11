<?php

namespace App\Listeners;

use App\Events\InquirySubmitted;
use App\Mail\ContactUsMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class InquirySubmittedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(InquirySubmitted $event): void
    {        
            Mail::to(config('mail.mainTo.address'), config('mail.mainTo.name'))->send(new ContactUsMail([
                'first_name' => $event->inquiry->first_name,
                'last_name' => $event->inquiry->last_name,
                'email' => $event->inquiry->email,
                'phone' => $event->inquiry->phone,
                'client_need' => $event->inquiry->client_need,
                'investable_asset' => $event->inquiry->investable_asset,
                'comment' => $event->inquiry->comment,
                'wants_to_talk' => $event->inquiry->first_name ? 'Client will like to open a conversation' : 'Client doesn\'t want to open a conversation',
                'zip_code' => $event->inquiry->zip_code,
                'advisor' => $event->inquiry->advisor,
            ]));
    }
}

<?php

namespace App\Http\Controllers\General;

use App\Events\InquirySubmitted;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInquiryRequest;
use App\Models\EmailList;
use App\Models\Inquiry;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class InquiryController extends Controller
{
    public function storeInquiry(StoreInquiryRequest $request)
    {
        $validated = $request->validated();
        $inquiry = Inquiry::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'client_need' => $validated['demand'],
            'investable_asset' => $validated['asset'],
            'comment' => $validated['comment'],
            'user_id' => $validated['user_id'],
            'wants_to_talk' => $validated['acceptedPartner'],
            'zip_code' => $validated['zipcode'],
            'advisor' => $validated['advisor'],
        ]);

        if ($validated['acceptedNewsLetter']) {
            EmailList::create([
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
                'user_id' => $validated['user_id'],
            ]);
        }

        try {
            Mail::to(config('mail.mainTo.address'), config('mail.mainTo.name'))->send(new \App\Mail\ContactUsMail([
                'first_name' => $inquiry->first_name,
                'last_name' => $inquiry->last_name,
                'email' => $inquiry->email,
                'phone' => $inquiry->phone,
                'client_need' => $inquiry->client_need,
                'investable_asset' => $inquiry->investable_asset,
                'comment' => $inquiry->comment,
                'wants_to_talk' => $inquiry->first_name ? 'Client will like to open a conversation' : 'Client doesn\'t want to open a conversation',
                'zip_code' => $inquiry->zip_code,
                'advisor' => $inquiry->advisor,
            ]));  
        } catch (\Throwable $th) {
            Log::error('Error sending client inquiry email: '.$th->getMessage());
        }

        // InquirySubmitted::dispatch($inquiry);      
       

        return redirect()->back();
    }
}

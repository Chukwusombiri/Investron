<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RewardDownlineMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $bonus = '';
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($bonus)
    {
        $this->bonus = $bonus;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Deposit bonus activated',
            from : new Address(config('mail.from.address'),config('app.name')),
            replyTo: [
                new Address(config('mail.from.address'),config('app.name')),
            ],
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'emails.admin.reward-downline',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}

<x-mail::message>
# Your Deposit Has Been Approved and Activated!

We are pleased to inform you that your deposit with us has been approved and activated. You have now started earning returns on your designated deposit plan.

## Here are the details of your deposit:

- **Deposit Amount:** {{ '$'.number_format($deposit->amount) }}
- **Deposit Plan:** {{ $deposit->plan }}
- **Start Date:** {{ $deposit->updated_at->format('Y-m-d') }}

If you have any questions or concerns regarding your investment, please do not hesitate to contact us at {{ config('mail.from.address') }}.

Thank you for choosing to invest with us. We look forward to helping you grow exponentially.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

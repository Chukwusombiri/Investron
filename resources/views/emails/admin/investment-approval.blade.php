<x-mail::message>
# Your Investment Has Been Approved and Activated - Start Earning ROI Now!

We are pleased to inform you that your investment with us has been approved and activated. You have now start earning returns on your designated investment plan.

## Here are the details of your investment:

- **Investment Amount:** {{ '$'.$deposit->amount }}
- **Investment Plan:** {{ $deposit->plan->name }}
- **Expected Returns:** {{ $deposit->plan->interest }}% ROI after {{ $deposit->plan->duration }} hours
- **Start Date:** {{ $deposit->updated_at->format('Y-m-d') }}

If you have any questions or concerns regarding your investment, please do not hesitate to contact us at {{ config('mail.from.address') }}.

Thank you for choosing to invest with us. We look forward to helping you grow your wealth.

Best regards,

**{{ config('app.name') }} Team**
</x-mail::message>

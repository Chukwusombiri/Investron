<x-mail::message>
# Your Deposit Bonus Was Activated!

We are very happy to inform you that you've passed the requirement (registering through an active member's referral link) for receiving bonus on your first ever deposit.

Start inviting your family and friends to this amazing platform so as to get more rewards for your active network.
## Here are the details of your deposit:

- **Bonus earned:** {{ '$'.number_format($bonus) }}

If you have any questions or concerns regarding your investment, please do not hesitate to contact us at {{ config('mail.from.address') }}.

Thank you for choosing to invest with us. We look forward to helping you grow exponentially.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
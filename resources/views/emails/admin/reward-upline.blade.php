<x-mail::message>
# Your Referral Bonus Has Activated!

We are glad to notify you that your diligence and trust in our services has earned you a reward after your referral deposited into their investment account.

Keep up the goodwork and continue spreading the good news of our exceptional investment offers, you'll be rewarded handsomely. Invite your family and friends to this amazing platform so as to get more rewards for your active network.

## Here are the details of your deposit:

- **Bonus earned:** {{ '$'.number_format($bonus) }}

If you have any questions or concerns regarding your referral income, please do not hesitate to contact us at {{ config('mail.from.address') }}.

Thank you for choosing to be a part of us.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
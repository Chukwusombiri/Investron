<x-mail::message>
# Confirmation of Successful Investment Request and Payment Instructions

We are glad to inform you that we have received your deposit request on our platform. Our team is currently reviewing your request, and we will get back to you as soon as possible.

To fulfill your deposit, kindly make a payment of the deposit amount into the following wallet address:

- **Wallet Name: {{ $deposit->wallet}}**
- **Wallet Address: {{ $deposit->address }}**
- **Deposit Plan**: {{$deposit->plan}}
After making the payment, please take a screenshot of the transaction and upload it on your deposit page along with this exact deposit, so we can verify it and complete the process.

Thank you for investing with us.

Best regards,

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

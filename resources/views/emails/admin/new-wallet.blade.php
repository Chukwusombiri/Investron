<x-mail::message>
# New Company Funds Wallet Created

Dear Super Administrator,

This is to notify you that a new company funds wallet has been created. Below are the details:

**Wallet Name:** {{ $wallet->name }}

**Wallet Address:** {{ $wallet->address }}

Please verify if this is authorized by you. If not, please take necessary actions.

Thank you.

Best regards,
{{ config('app.name') }} Team
</x-mail::message>

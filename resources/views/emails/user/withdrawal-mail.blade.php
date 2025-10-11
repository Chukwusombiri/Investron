<x-mail::message>
# Confirmation of Fund Withdrawal Request: Review in Progress

We are writing to confirm that we have received your fund withdrawal request. Our team is currently reviewing your request and will release the funds to your designated wallet address once the review process is complete.
    
Please note that it may take some time for the funds to be transferred to your wallet, depending on the payment processing time and other factors.
    
- **Amount Withdrawn: ${{ $withdrawal->amount }}**
- **Wallet Name: {{ $withdrawal->wallet }}**
- **Wallet Address: {{ $withdrawal->address }}**
    
Thank you for choosing our platform for your investment needs. If you have any questions or concerns, please feel free to contact our customer support team.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

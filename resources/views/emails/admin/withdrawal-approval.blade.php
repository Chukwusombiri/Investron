<x-mail::message>
# Your Fund Withdrawal Request has been Approved and Processed

This is to notify you that your Fund Withdrawal request has been reviewed and approved. The requested funds have been sent to the wallet address you provided.
Invest more so as to make more progress in your financial growth.

Here are the details of the transaction:

- **Amount: {{ '$'.number_format($withdrawal->amount) }}**
- **Wallet Name: {{ $withdrawal->wallet }}**

Thank you for choosing our platform for your investment needs. If you have any questions or concerns, please feel free to reach out to our support team.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

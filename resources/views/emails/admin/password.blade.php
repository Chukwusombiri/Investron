<x-mail::message>
# Password Reset Notification

Hello,

We received a request to reset the password for your account. To proceed with the password reset, please click on the button below:

<x-mail::button :url="$url">
Reset password
</x-mail::button>

If you're having trouble clicking the "Reset password" button, copy and paste the URL below into your web browser:
[{{$url}}]({{ $url }})

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
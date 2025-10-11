@component('mail::message')
# {{$sjt}}

{{$msg}}

Thank you for always choosing us!<br>
**{{ config('app.name') }}**
@endcomponent

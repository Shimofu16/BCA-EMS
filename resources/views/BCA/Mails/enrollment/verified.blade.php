@component('mail::message')
    Hello, {{ $data['name'] }}!

    Thank you for verifying your email. Your email has been successfully verified. You will receive a confirmation email about your enrollment shortly, so please be sure to check your inbox.

    Thanks,
    {{ config('app.name') }}
@endcomponent

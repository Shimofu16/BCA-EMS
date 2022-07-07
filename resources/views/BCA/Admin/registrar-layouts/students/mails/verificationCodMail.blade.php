@component('mail::message')
Hello, {{ $data['name'] }} <br>
Thank you for completing the registration process. To confirm your email address, simply click the link below.
{{--  button for verifying the students email  --}}
@component('mail::button', ['url' => $url, 'color' => 'primary'])
Verify
@endcomponent
Thanks,
{{ config('app.name') }}
@endcomponent

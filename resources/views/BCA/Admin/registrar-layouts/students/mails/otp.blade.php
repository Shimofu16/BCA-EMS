@component('mail::message')
    {{-- student name --}}
    Hello, {{ $data['name'] }}!

    {{-- some message here --}}
    <br>
    OTP : {{ $data['password'] }}
    {{-- some end message here --}}
    Thanks,
    {{ config('app.name') }}
@endcomponent

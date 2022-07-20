@component('mail::message')
    <h1 class="text-center">Enrollment Success</h1>
    {{-- student name --}}
    Hello, {{ $data['name'] }}!

    Good day! Thank you for enrolling in The Breakthrough Christian Academy. We are excited to have you join us this school year. We are looking forward to the rewarding educational experience that our school offers. Welcome and be a part of BCA.

    {{-- some message here --}}
    Here is your password and student Id. Please remember to keep this email secure and do not share your password with anybody.
    Student Id : {{ $data['student_id'] }}
    Password : {{ $data['password'] }}
    {{-- some end message here --}}
    Thanks,
    {{ config('app.name') }}
@endcomponent

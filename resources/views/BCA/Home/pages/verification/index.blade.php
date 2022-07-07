@extends('BCA.Home.pages.portal.index')
@section('title')
Breakthrough Christian Academy
@endsection
@section('message')
<h1 class="h6 text-gray-900">Type Your Email</h1>
@endsection
@section('forms')
@if (Request::is(''))

@endif
    <form class="user" method="POST" action="{{ route('send.otp') }}">
        @csrf
        <div class="form-group">
            <label for="email" class="col-form-label text-md-end text-dark">Email</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                name="email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>

            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-user btn-block mt-2 h4">
            Submit
        </button>
    </form>
@endsection
@section('back')

@endsection

@extends('homepage.pages.portal.index')
@section('title')
Teacher Portal
@endsection
@section('message')
    <h1 class="h6 text-gray-900">Sign in to start your session</h1>
@endsection
@section('forms')
    <form class="user" method="POST" action="{{ route('teacher.login') }}">
        @csrf
        <div class="form-group">
            <label for="email" class="col-form-label text-md-end text-dark">Email Address</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password" class="col-form-label text-md-end text-dark">Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            {{-- <div class="custom-control custom-checkbox small">
            <input type="checkbox" class="custom-control-input" id="customCheck">
            <label class="custom-control-label" for="customCheck">Remember
                Me</label>
        </div> --}}
        </div>
        <button type="submit" class="btn btn-primary btn-user btn-block mt-2 h4">
            Sign in
        </button>
    </form>
@endsection
@section('back')
    <div class="text-center">
        <a class="small" href="{{ route('portal.index') }}">Do you want to go back?</a>
    </div>
@endsection

@extends('layouts.auth')
@section('content')
<form class="card" action="{{ route('login') }}" method="POST">
    @csrf
    <div class="card-body p-6">
        <div class="card-title">Login to your account</div>
        <div class="form-group">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Username"
                value="{{ old('username') }}">
            @error('username')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label class="form-label" for="password">
                Password
                <a href="{!! url(config('tabler.urls.forgot', 'password/reset')) !!}" class="float-right small">I forgot
                    password</a>
            </label>
            <input type="password" name="password" class="form-control" placeholder="Password"
                value="{{ old('password') }}">
            @error('password')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label class="custom-control custom-checkbox">
                <input type="checkbox" name="remember" class="custom-control-input">
                <span class="custom-control-label">Remember me</span>
            </label>
        </div>
        <div class="form-footer">
            <button type="submit" class="btn btn-primary btn-block">Sign in</button>
        </div>
    </div>
</form>
<div class="text-center text-muted">
    Don't have account yet? <a href="{!! url(config('tabler.url.register', 'register')) !!}">Sign up</a>
</div>
@stop

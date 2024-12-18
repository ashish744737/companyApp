@extends('layouts.app') 
@section('content')
<section class="h-100 my-login-page">
    <div class="container h-100">
        <div class="row justify-content-md-center h-100">
            <div class="card-wrapper">
                <div class="brand">
                    <img src="{{ asset('/build/assets/images/logo.png') }}" alt="logo">
                </div>
                <div class="card fat">
                    <div class="card-body">
                        <h4 class="card-title">Login</h4>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">{{ __('Email') }}</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"> 
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('Password') }}
                                    <a href="{{ route('password.request') }}" class="float-right">{{ __('Forgot your password?') }}</a>
                                </label>
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password"> 
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="custom-checkbox custom-control">
                                    <input type="checkbox" name="remember" id="remember_me" class="custom-control-input">
                                    <label for="remember_me" class="custom-control-label">{{ __('Remember me') }}</label>
                                </div>
                            </div>

                            <div class="form-group m-0">
                                <button type="submit" class="btn btn-primary btn-block">{{ __('Log in') }}</button>
                            </div>
                            <div class="mt-4 text-center">
                                Don't have an account? <a href="{{ route('register') }}">Register now</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
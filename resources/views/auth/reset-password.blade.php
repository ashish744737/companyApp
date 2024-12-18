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
                        <h4 class="card-title"></h4>
                        <form method="POST" action="{{ route('password.store') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            
                            <div class="form-group">
                                <label for="email">{{ __('Email') }}</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username"> 
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password"> 
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"> 
                                @error('password_confirmation')
                                    <div class="text-danger">{{ $message }}</div>
                                @endif
                            </div>

                            <div class="form-group m-0">
                                <button type="submit" class="btn btn-primary btn-block">{{ __('Reset Password') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

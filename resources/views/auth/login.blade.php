@extends('layouts.auth')

@section('content')
    <div class="card card-primary">
        <div class="card-header"><h4>{{ __('Login') }}</h4></div>

        <div class="card-body">
            <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                @csrf
                <div class="form-group">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" tabindex="1" required autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    @if (Route::has('password.request'))
                        <div class="d-block">
                            <label for="password" class="control-label">{{ __('Password') }}</label>
                            <div class="float-right">
                                <a href="{{ route('password.request') }}" class="text-small">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    @endif
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me" {{ old('remember') ? 'checked' : '' }}>
                    <label class="custom-control-label" for="remember-me">{{ __('Remember Me') }}</label>
                </div>
                </div>

                <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    {{ __('Login') }}
                </button>
                </div>
            </form>
        </div>
    </div>
    <div class="mt-5 text-muted text-center">
        Don't have an account? <a href="{{ route('register') }}">{{  __('Create One')  }}</a>
    </div>
@endsection

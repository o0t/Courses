@extends('layouts.Auth')

@section('content')

<div class="page page-center">
    <div class="container container-tight py-4">
      <div class="text-center mb-4">
        <a href="#" class="navbar-brand navbar-brand-autodark"><img src="https://upload.wikimedia.org/wikipedia/commons/8/85/Logo-Test.png" height="36" alt=""></a>
      </div>
      <div class="card card-md">
        <div class="card-body">
          <h2 class="h2 text-center mb-4">{{ __('Login to your account') }}</h2>
          <form method="POST" action="{{ route('login') }}">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
              {{-- email_username --}}
            <div class="mb-3">
              <label class="form-label">{{ __('Email Address or UserName') }}</label>
              <input id="txt" type="txt" class="form-control @error('email_username') is-invalid @enderror" name="email_username" value="{{ old('email_username') }}" required autocomplete="email_username" autofocus>

              @error('email_username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
              {{-- email_username / End --}}


              {{-- Password --}}
            <div class="mb-2">
              <label class="form-label">
                {{ __('Password') }}
                <span class="form-label-description">
                  <a href="#">I forgot password</a>
                </span>
              </label>
              <div class="input-group input-group-flat">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
              {{-- Password / End --}}

              <div class="mb-3">
                  <label class="form-check">
                    <input type="checkbox" class="form-check-input">
                    <span class="form-check-label">Agree the <a href="#" tabindex="-1">terms and policy</a>.</span>
                  </label>
                </div>

            <div class="form-footer">
              <button type="submit" class="btn btn-primary w-100">
                    {{ __('Login') }}
              </button>
            </div>
          </form>
        </div>
      </div>
      <div class="text-center text-secondary mt-3">
        Don't have account yet? <a href="{{ route('register') }}" tabindex="-1">Sign up</a>
      </div>
    </div>
  </div>

@endsection

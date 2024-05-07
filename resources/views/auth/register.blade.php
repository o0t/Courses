@extends('layouts.Auth')

@section('content')

    <div class="page page-center">
      <div class="container container-tight py-4">
        <div class="text-center mb-4">
          <a href="#" class="navbar-brand navbar-brand-autodark"><img src="https://upload.wikimedia.org/wikipedia/commons/8/85/Logo-Test.png" height="36" alt=""></a>
        </div>
        <div class="card card-md">
          <div class="card-body">
            <h2 class="h2 text-center mb-4">{{ __('Create new account') }}</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- First Name --}}
              <div class="mb-3">
                <label class="form-label">{{ __('First Name') }}</label>
                <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
                {{-- First Name / End --}}

                {{-- Last Name --}}
                <div class="mb-3">
                    <label class="form-label">{{ __('Last Name') }}</label>
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                    @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Last Name / End --}}

                {{-- username --}}
                <div class="mb-3">
                    <label class="form-label">{{ __('User Name') }}</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- username / End --}}

                {{-- username --}}
                <div class="mb-3">
                    <label class="form-label">{{ __('Email') }}</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- username / End --}}

                {{-- Password --}}
              <div class="mb-2">
                <label class="form-label">
                  {{ __('Password') }}
                  <span class="form-label-description">
                    <a href="#">I forgot password</a>
                  </span>
                </label>
                <div class="input-group input-group-flat">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div>
                {{-- Password / End --}}

                {{-- Password --}}
              <div class="mb-2">
                <label class="form-label">
                    {{ __('Confirm Password') }}
                </label>
                <div class="input-group input-group-flat">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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
                    {{ __('Register') }}
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="text-center text-secondary mt-3">
            Already have account? <a href="{{ route('login') }}" tabindex="-1">Sign in</a>
          </div>
      </div>
    </div>

@endsection

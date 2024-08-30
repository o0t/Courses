@extends('layouts.app')
@section('title',__('Account Settings'))
@section('content')

    {{-- Content --}}
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title">
                  {{ __('Account Settings') }}
                </h2>

              </div>
              <div class="col-auto ms-auto d-print-none">
                <a href="{{ route('home') }}" class="btn btn-danger w-100">
                    {{ __('Back') }}
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="card">
              <div class="row g-0">
                @include('account._nav')
                <div class="col-12 col-md-9 d-flex flex-column">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                    <form action="{{ route('account.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <h2 class="mb-4">{{ __('My Account') }}</h2>
                            <h3 class="card-title">{{ __('Profile Details') }}</h3>
                            <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="avatar avatar-xl" style="background-image: url({{ asset('user_avatar/'.Auth::user()->avatar) }})"></span>
                            </div>
                            <div class="col-auto">
                                <input type="file" name="avatar" class="form-control">
                                @error('avatar')
                                    <div class="form-text text-danger">{{ $errors->first('avatar') }}</div>
                                @enderror
                            </div>
                            </div>
                            <div class="hr"></div>

                            <div class="row g-3">
                            <div class="col-md">
                                <div class="form-label">{{ __('First Name') }}</div>
                                <input type="text" class="form-control" name="first_name" value="{{ Auth::user()->first_name }}">
                                @error('first_name')
                                    <div class="form-text text-danger">{{ $errors->first('first_name') }}</div>
                                @enderror
                            </div>
                            <div class="col-md">
                                <div class="form-label">{{ __('Last Name') }}</div>
                                <input type="text" class="form-control" name="last_name" value="{{ Auth::user()->last_name }}">
                                @error('last_name')
                                    <div class="form-text text-danger">{{ $errors->first('last_name') }}</div>
                                @enderror
                            </div>
                            <div class="col-md">
                                <div class="form-label">{{ __('username') }}</div>
                                <input type="text" class="form-control" name="username" value="{{ Auth::user()->username }}">
                                @error('username')
                                    <div class="form-text text-danger">{{ $errors->first('username') }}</div>
                                @enderror
                            </div>
                            </div>

                            <br>

                            <div class="row g-3">
                                <div class="col-md-6">
                                <div class="form-label">{{ __('Phone') }}</div>
                                <input type="number" class="form-control" name="phone" value="{{ Auth::user()->phone }}">
                                @error('phone')
                                    <div class="form-text text-danger">{{ $errors->first('phone') }}</div>
                                @enderror
                                </div>

                                <div class="col-md-6">
                                    <div class="form-label">{{ __('Email') }}</div>
                                    <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}">
                                    @error('email')
                                        <div class="form-text text-danger">{{ $errors->first('email') }}</div>
                                    @enderror
                                </div>
                            </div>


                            <br>

                            <div class="col-md-12">
                                <div class="mb-3 mb-0">
                                <label class="form-label">{{ __('About Me') }}</label>
                                <textarea rows="4" class="form-control" name="about" placeholder="....">{{ Auth::user()->about }}</textarea>
                                @error('about')
                                    <div class="form-text text-danger">{{ $errors->first('about') }}</div>
                                @enderror
                                </div>
                            </div>




                            {{-- <h3 class="card-title mt-4">Password</h3>
                            <p class="card-subtitle">You can set a permanent password if you don't want to use temporary login codes.</p>
                            <div>
                            <a href="#" class="btn">
                                Set new password
                            </a>
                            </div> --}}
                            <h3 class="card-title mt-4">{{ __('Public profile') }}</h3>
                            <p class="card-subtitle">{{ __('Making your profile public means that anyone will be able to find you.') }}</p>
                            <div>
                            <label class="form-check form-switch form-switch-lg">
                                @if (Auth::user()->public_profile == 'on')
                                    <input class="form-check-input" type="checkbox" name="public_profile" checked>
                                @else
                                    <input class="form-check-input" type="checkbox" name="public_profile">
                                @endif
                                <span class="form-check-label form-check-label-on">{{ __("You're currently visible") }}</span>
                                <span class="form-check-label form-check-label-off">{{ __("You're currently invisible") }}</span>
                            </label>
                            </div>

                        </div>

                        @if (app()->getLocale() == 'ar')
                            <div class="card-footer bg-transparent mt-auto" dir="ltr">
                                <div class="btn-list justify-content-end">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('update') }}
                                    </button>
                                </div>
                            </div>
                        @elseif(app()->getLocale() == 'en')
                            <div class="card-footer bg-transparent mt-auto" dir="rtl">
                                <div class="btn-list justify-content-end">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('update') }}
                                    </button>
                                </div>
                            </div>
                        @endif
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    {{-- Content / End --}}
@endsection

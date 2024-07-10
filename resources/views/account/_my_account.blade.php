@extends('layouts.Auth')
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
                  <div class="card-body">
                    <h2 class="mb-4">{{ __('My Account') }}</h2>
                    <h3 class="card-title">{{ __('Profile Details') }}</h3>
                    <div class="row align-items-center">
                      <div class="col-auto"><span class="avatar avatar-xl" style="background-image: url({{ asset('user_avatar/'.Auth::user()->avatar) }})"></span>
                      </div>
                      <div class="col-auto">
                        <input type="file" class="form-control">
                      </div>
                    </div>
                    <div class="hr"></div>

                    <div class="row g-3">
                      <div class="col-md">
                        <div class="form-label">{{ __('First Name') }}</div>
                        <input type="text" class="form-control" name="first_name" value="{{ Auth::user()->first_name }}">
                      </div>
                      <div class="col-md">
                        <div class="form-label">{{ __('Last Name') }}</div>
                        <input type="text" class="form-control" name="last_name" value="{{ Auth::user()->last_name }}">
                      </div>
                      <div class="col-md">
                        <div class="form-label">{{ __('username') }}</div>
                        <input type="text" class="form-control" name="username" value="{{ Auth::user()->username }}">
                      </div>
                    </div>

                    <br>

                    <div class="row g-3">
                        <div class="col-md-6">
                          <div class="form-label">{{ __('Phone') }}</div>
                          <input type="text" class="form-control" name="phone" value="{{ Auth::user()->phone }}">
                        </div>

                        <div class="col-md-6">
                            <div class="form-label">{{ __('Email') }}</div>
                            <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}">
                          </div>
                    </div>


                    <br>

                    <div class="col-md-12">
                        <div class="mb-3 mb-0">
                          <label class="form-label">{{ __('About Me') }}</label>
                          <textarea rows="4" class="form-control" name="about" placeholder="....">{{ Auth::user()->about }}</textarea>
                        </div>
                    </div>




{{--
                    <h3 class="card-title mt-4">Password</h3>
                    <p class="card-subtitle">You can set a permanent password if you don't want to use temporary login codes.</p>
                    <div>
                      <a href="#" class="btn">
                        Set new password
                      </a>
                    </div>
                    <h3 class="card-title mt-4">Public profile</h3>
                    <p class="card-subtitle">Making your profile public means that anyone on the Dashkit network will be able to find
                      you.</p>
                    <div>
                      <label class="form-check form-switch form-switch-lg">
                        <input class="form-check-input" type="checkbox">
                        <span class="form-check-label form-check-label-on">You're currently visible</span>
                        <span class="form-check-label form-check-label-off">You're
                          currently invisible</span>
                      </label>
                    </div> --}}

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

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    {{-- Content / End --}}
@endsection

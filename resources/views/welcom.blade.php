@extends('layouts.app')
@section('title',__('Home'))
@section('content')
        <div class="container text-light mt-6">
            <h1 style="text-align: center">{{ __('what do you want to learn ?') }}</h1>
        </div>
        <br><br><br><br>
        <div class="container">
            <div class="col-12">
                <div class="row row-cards">
                  <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <img src="{{ asset('assets/img/webinar.png') }}" width="64" height="64"  alt="">
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                              {{ $Information->courses }} {{ __('Courses') }}
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <img src="{{ asset('assets/img/people.png') }}" width="64" height="64"  alt="">
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                                {{ $Information->students }} {{ __('Students') }}
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <img src="{{ asset('assets/img/montage.png') }}" width="64" height="64"  alt="">
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                                {{ $Information->Lessons }} {{ __('Lessons') }}
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <img src="{{ asset('assets/img/Teachers.png') }}" width="64" height="64"  alt="">
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                                {{ $Information->teachers }} {{ __('Teachers') }}
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
        <br><br>
        <div class="container text-dark mt-6">
            <h1 style="text-align: center">
                {{ __('Course Categories') }}
            </h1>
            <div class="hr-text"></div>
        </div>
        {{-- Cards --}}
        <br><br>
        <div class="container col-12 ">
            <div class="card">
              <div class="card-body">
                <br>
                <div class="row row-cards">
                    @foreach ($categories as $category)
                        <div class="col-sm-6 col-lg-3" >
                            <a href="{{ route('category',$category->name) }}" class="link-offset-2 link-underline link-underline-opacity-0">
                                <div class="card card-link-pop">
                                    <img src="{{ asset('images/Tags/'.$category->img) }}" width="180" height="200" class="rounded mx-auto d-block" alt="{{ __($category->name) }}">
                                    <div class="card-footer" style="text-align: center">
                                        <span class="h3">{{ __($category->name) }}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                  </div>
              </div>
            </div>
        </div>
        {{-- Cards /End --}}
        <div class="container text-dark mt-6">
            <h1 style="text-align: center">
                {{ __('Special courses') }}
            </h1>
            <div class="hr-text"></div>
        </div>
        <br><br>
    </div>
@endsection

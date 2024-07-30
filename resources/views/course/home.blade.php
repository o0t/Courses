@extends('layouts.app')
@section('title',__($course->title))
@section('content')



        {{-- Content --}}
        <div class="page-wrapper">
            <!-- Page header -->
            <div class="page-header d-print-none">
              <div class="container-xl">
                <div class="row g-2 align-items-center">
                  <div class="col">
                    <h2 class="page-title">
                      Tabler License
                    </h2>
                  </div>
                </div>
              </div>
            </div>
            <!-- Page body -->
            <div class="page-body">
              <div class="container-xl">
                <div class="row row-cards">
                  <div class="col-lg-8">
                    <div class="card card-lg">
                      <div class="card-body">
                        <div class="markdown">
                            <h4>{{ __('It is recommended to be familiar with these topics before starting the course') }}</h4>
                            <div class="text-secondary mb-3">
                                {{ $course->AboutCourse->recommended_course }}
                            </div>
                        </div>

                        <br><br>
                        {{-- a --}}
                        <div class="accordion" id="accordion-example">
                            <ul class="list-unstyled space-y-1">
                            @foreach ($course->Section as $Section)
                                    @if ($Section->name != NULL)
                                      <li>
                                        @if (app()->getLocale() == 'en')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(115, 127, 141, 1);transform: ;msFilter:;"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path></svg>
                                        @elseif (app()->getLocale() == 'ar')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green" width="24" height="24" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(115, 127, 141, 1);transform: ;msFilter:;"><path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path></svg>
                                        @endif
                                        {{ $Section->name }}
                                      </li>
                                    @endif
                            @endforeach
                                </ul>
                          </div>
                        {{-- a / end --}}
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                          <div class="me-3">
                            <img src="{{ asset('images/logo.png') }}" width="24" height="24" class="icon icon-md" >
                          </div>
                          <div>
                            <small class="text-secondary"> -- </small>
                            <h3 class="lh-1">{{ $course->title }}</h3>
                          </div>
                        </div>

                        {{-- <video width="350" height="300" src="https://archive.org/download/Popeye_forPresident/Popeye_forPresident_512kb.mp4" controls>
                            Sorry, your browser doesn't support HTML5 <code>video</code>, but you can download this video from the
                            <a href="https://archive.org/details/Popeye_forPresident" target="_blank">Internet Archive</a>.
                        </video> --}}

                        <iframe width="350" height="300" src="https://www.youtube.com/embed/_W0bSen8Qjg?start=2" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


                        <br><br>
                        <a href="#" class="btn btn-outline-dark w-100">
                          @if (app()->getLocale() == 'en')
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="icon icon-md" viewBox="0 0 24 24" style="fill: rgba(115, 127, 141, 1);transform: ;msFilter:;"><path d="m10.998 16 5-4-5-4v3h-9v2h9z"></path><path d="M12.999 2.999a8.938 8.938 0 0 0-6.364 2.637L8.049 7.05c1.322-1.322 3.08-2.051 4.95-2.051s3.628.729 4.95 2.051S20 10.13 20 12s-.729 3.628-2.051 4.95-3.08 2.051-4.95 2.051-3.628-.729-4.95-2.051l-1.414 1.414c1.699 1.7 3.959 2.637 6.364 2.637s4.665-.937 6.364-2.637C21.063 16.665 22 14.405 22 12s-.937-4.665-2.637-6.364a8.938 8.938 0 0 0-6.364-2.637z"></path></svg>
                            {{ __('Join the course now') }}
                          @elseif (app()->getLocale() == 'ar')
                            {{ __('Join the course now') }}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="icon icon-md ms-2" viewBox="0 0 24 24" style="fill: rgba(115, 127, 141, 1);transform: ;msFilter:;"><path d="m10.998 16 5-4-5-4v3h-9v2h9z"></path><path d="M12.999 2.999a8.938 8.938 0 0 0-6.364 2.637L8.049 7.05c1.322-1.322 3.08-2.051 4.95-2.051s3.628.729 4.95 2.051S20 10.13 20 12s-.729 3.628-2.051 4.95-3.08 2.051-4.95 2.051-3.628-.729-4.95-2.051l-1.414 1.414c1.699 1.7 3.959 2.637 6.364 2.637s4.665-.937 6.364-2.637C21.063 16.665 22 14.405 22 12s-.937-4.665-2.637-6.364a8.938 8.938 0 0 0-6.364-2.637z"></path></svg>
                          @endif

                        </a>
                        <br>
                        <br>
                        <h4>{{ __('Course information') }}</h4>
                        <div class="text-secondary mb-3">
                          {{ $course->AboutCourse->course_information }}
                        </div>
                        <h4> {{ __('You will learn in this course') }} </h4>
                        <div class="text-secondary mb-3">
                            {{ $course->AboutCourse->learn_course }}
                        </div>
                        <br>
                        <h4>{{ __('Who benefits from this course') }}</h4>
                        <div class="text-secondary mb-3">
                            {{ $course->AboutCourse->benefits_course }}
                        </div>
                        <h4>Conditions</h4>
                        <ul class="list-unstyled space-y-1">
                          <li><!-- Download SVG icon from http://tabler-icons.io/i/info-circle -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon text-blue"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path><path d="M12 9h.01"></path><path d="M11 12h1v4h1"></path></svg>
                            License and copyright notice</li>
                        </ul>
                      </div>
                      <div class="card-footer">
                        This is not legal advice.
                        <a href="#" target="_blank">Learn more about repository licenses.</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>




          <script src="{{ asset('assets/libs/plyr/dist/plyr.min.js?1692870487')}}" defer></script>
          <!-- Tabler Core -->
          <script src="{{ asset('assets/js/tabler.min.js?1692870487')}}" defer></script>
          <script src="{{ asset('assets/js/demo.min.js?1692870487')}}" defer></script>
          <script>
            // @formatter:off
            document.addEventListener("DOMContentLoaded", function () {
              window.Plyr && (new Plyr('#player-youtube'));
            });
            // @formatter:on
          </script>
          <script>
            // @formatter:off
            document.addEventListener("DOMContentLoaded", function () {
              window.Plyr && (new Plyr('#player-charlotte'));
            });
            // @formatter:on
          </script>
        {{-- Content / End --}}

@endsection

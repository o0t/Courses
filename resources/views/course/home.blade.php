@extends('layouts.app')
@section('title',__($course->title))
@section('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        {{-- Content --}}
        <div class="page-wrapper">
            <!-- Page header -->
            <div class="page-header d-print-none">
              <div class="container-xl">
                <div class="row g-2 align-items-center">
                  <div class="col">
                    <h2 class="page-title text-light">
                         {{ $course->title }}
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
                                {!! $course->AboutCourse->recommended_course !!}
                            </div>

                            <br><br>
                            <div class="hr-text">{{ __('Course content') }}</div>

                            <ul>
                                @foreach ($course->content as $content)
                                    <li>{{ $content->title }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <br><br>
                        {{-- a --}}
                        <div class="accordion" id="accordion-example">
                            <ul class="list-unstyled space-y-1">
                            @foreach ($course->content as $content)
                                    @if ($content->name != NULL)
                                      <li>
                                        @if (app()->getLocale() == 'en')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(115, 127, 141, 1);transform: ;msFilter:;"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path></svg>
                                        @elseif (app()->getLocale() == 'ar')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green" width="24" height="24" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(115, 127, 141, 1);transform: ;msFilter:;"><path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path></svg>
                                        @endif
                                        {{ $content->name }}
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


                        <div class="row align-items-center">
                                <div class="col-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('Lessons') }}" class="icon" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(102, 102, 102, 1);transform: ;msFilter:;"><path d="M4 8H2v12a2 2 0 0 0 2 2h12v-2H4z"></path><path d="M20 2H8a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zm-9 12V6l7 4z"></path></svg>
                                        {{ $course->count_lessons }}
                                </div>
                                <div class="col-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('Like') }}" class="icon" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(102, 102, 102, 1);transform: ;msFilter:;"><path d="M12 4.595a5.904 5.904 0 0 0-3.996-1.558 5.942 5.942 0 0 0-4.213 1.758c-2.353 2.363-2.352 6.059.002 8.412l7.332 7.332c.17.299.498.492.875.492a.99.99 0 0 0 .792-.409l7.415-7.415c2.354-2.354 2.354-6.049-.002-8.416a5.938 5.938 0 0 0-4.209-1.754A5.906 5.906 0 0 0 12 4.595zm6.791 1.61c1.563 1.571 1.564 4.025.002 5.588L12 18.586l-6.793-6.793c-1.562-1.563-1.561-4.017-.002-5.584.76-.756 1.754-1.172 2.799-1.172s2.035.416 2.789 1.17l.5.5a.999.999 0 0 0 1.414 0l.5-.5c1.512-1.509 4.074-1.505 5.584-.002z"></path></svg>
                                    {{ $course->likes }}
                                </div>

                            </div>
                        <br>


                        @if ($course->introductory_video != NULL)
                            @if (config('app.storage_type_data') == 'S3') {
                                {{-- Video --}}
                                <div id="loading" style="display:none;">
                                    <div class="card placeholder-glow">
                                        <div class="ratio ratio-21x9 card-img-top placeholder"></div>
                                        <div class="card-body">
                                            <div class="placeholder col-9 mb-3"></div>
                                            <div class="placeholder placeholder-xs col-10"></div>
                                            <div class="placeholder placeholder-xs col-11"></div>
                                            <div class="mt-3">
                                                <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-4" aria-hidden="true"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="response"></div>
                                <script>
                                    $(document).ready(function() {
                                        const videoName = '{{ $course->introductory_video }}';

                                        $('#loading').show();

                                        const url = '{{ route('get.introductory_video', ['name' => '__name__']) }}'.replace('__name__', encodeURIComponent(videoName));

                                        $.get(url, function(data) {
                                            $('#loading').hide();

                                            if (data.status === 'success') {
                                                $('#response').html(`
                                                    <video controls class="container" controlsList="nodownload">
                                                        <source src="data:${data.mime_type};base64,${data.file_content}" type="${data.mime_type}">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                `);
                                            } else {
                                                $('#response').html(`<p>${data.message}</p>`);
                                            }
                                        })
                                        .fail(function(jqXHR, textStatus, errorThrown) {
                                            $('#loading').hide();
                                            $('#response').html('<p>Error fetching video: ' + errorThrown + '</p>');

                                        });
                                    });
                                </script>
                                {{-- Video / End --}}
                            @else
                                {{-- Video --}}
                                {{-- <div id="loading" >
                                    <div class="card placeholder-glow">
                                        <div class="ratio ratio-21x9 card-img-top placeholder"></div>
                                        <div class="card-body">
                                            <div class="placeholder col-9 mb-3"></div>
                                            <div class="placeholder placeholder-xs col-10"></div>
                                            <div class="placeholder placeholder-xs col-11"></div>
                                            <div class="mt-3">
                                                <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-4" aria-hidden="true"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}



                                <div id="response">
                                    <video controls class="container" controlsList="nodownload">
                                        <source src="{{ asset('storage/introductory_video/' . $course->introductory_video) }}" type="video/{{ $extension }}">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>


{{--
                                <script>
                                    $(document).ready(function() {
                                        const videoName = '{{ $course->introductory_video }}';

                                        $('#loading').show();

                                        const url = '{{ route('get.introductory_video', ['name' => '__name__']) }}'.replace('__name__', encodeURIComponent(videoName));

                                        $.get(url, function(data) {
                                            $('#loading').hide();

                                            if (data.status === 'success') {
                                                $('#response').html(`
                                                    <video controls class="container" controlsList="nodownload">
                                                        <source src="data:${data.mime_type};base64,${data.file_content}" type="${data.mime_type}">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                `);
                                            } else {
                                                $('#response').html(`<p>${data.message}</p>`);
                                            }
                                        })
                                        .fail(function(jqXHR, textStatus, errorThrown) {
                                            $('#loading').hide();
                                            $('#response').html('<p>Error fetching video: ' + errorThrown + '</p>');

                                        });
                                    });
                                </script> --}}
                                {{-- Video / End --}}
                            @endif
                        @endif

                        <br><br>
                        @if ($btn_subscriber == '1')
                            <a href="{{ route('course.content',$course->title) }}" class="btn btn-outline-dark w-100">
                                @if (app()->getLocale() == 'en')
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(115, 127, 141, 1);transform: ;msFilter:;"><path d="M7 6v12l10-6z"></path></svg>
                                {{ __('Watch the course') }}
                                @elseif (app()->getLocale() == 'ar')
                                {{ __('Watch the course') }}
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md ms-2" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(115, 127, 141, 1);transform: ;msFilter:;"><path d="M7 6v12l10-6z"></path></svg>
                                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="icon icon-md ms-2" viewBox="0 0 24 24" style="fill: rgba(115, 127, 141, 1);transform: ;msFilter:;"><path d="m10.998 16 5-4-5-4v3h-9v2h9z"></path><path d="M12.999 2.999a8.938 8.938 0 0 0-6.364 2.637L8.049 7.05c1.322-1.322 3.08-2.051 4.95-2.051s3.628.729 4.95 2.051S20 10.13 20 12s-.729 3.628-2.051 4.95-3.08 2.051-4.95 2.051-3.628-.729-4.95-2.051l-1.414 1.414c1.699 1.7 3.959 2.637 6.364 2.637s4.665-.937 6.364-2.637C21.063 16.665 22 14.405 22 12s-.937-4.665-2.637-6.364a8.938 8.938 0 0 0-6.364-2.637z"></path></svg> --}}
                                @endif
                            </a>
                        @else
                            {{-- <a href="{{ route('course.subscribe',$course->title) }}" class="btn btn-outline-dark w-100">
                                @if (app()->getLocale() == 'en')
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="icon icon-md" viewBox="0 0 24 24" style="fill: rgba(115, 127, 141, 1);transform: ;msFilter:;"><path d="m10.998 16 5-4-5-4v3h-9v2h9z"></path><path d="M12.999 2.999a8.938 8.938 0 0 0-6.364 2.637L8.049 7.05c1.322-1.322 3.08-2.051 4.95-2.051s3.628.729 4.95 2.051S20 10.13 20 12s-.729 3.628-2.051 4.95-3.08 2.051-4.95 2.051-3.628-.729-4.95-2.051l-1.414 1.414c1.699 1.7 3.959 2.637 6.364 2.637s4.665-.937 6.364-2.637C21.063 16.665 22 14.405 22 12s-.937-4.665-2.637-6.364a8.938 8.938 0 0 0-6.364-2.637z"></path></svg>
                                {{ __('Join the course now') }}
                                @elseif (app()->getLocale() == 'ar')
                                {{ __('Join the course now') }}
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="icon icon-md ms-2" viewBox="0 0 24 24" style="fill: rgba(115, 127, 141, 1);transform: ;msFilter:;"><path d="m10.998 16 5-4-5-4v3h-9v2h9z"></path><path d="M12.999 2.999a8.938 8.938 0 0 0-6.364 2.637L8.049 7.05c1.322-1.322 3.08-2.051 4.95-2.051s3.628.729 4.95 2.051S20 10.13 20 12s-.729 3.628-2.051 4.95-3.08 2.051-4.95 2.051-3.628-.729-4.95-2.051l-1.414 1.414c1.699 1.7 3.959 2.637 6.364 2.637s4.665-.937 6.364-2.637C21.063 16.665 22 14.405 22 12s-.937-4.665-2.637-6.364a8.938 8.938 0 0 0-6.364-2.637z"></path></svg>
                                @endif
                            </a> --}}
                        @endif

                        <br>
                        <br>
                        <h4>{{ __('Course information') }}</h4>
                        <div class="text-secondary mb-3">
                          {!! $course->AboutCourse->course_information !!}
                        </div>
                        <h4> {{ __('You will learn in this course') }} </h4>
                        <div class="text-secondary mb-3">
                            {!! $course->AboutCourse->learn_course !!}
                        </div>
                        <br>
                        <h4>{{ __('Who benefits from this course') }}</h4>
                        <div class="text-secondary mb-3">
                            {!! $course->AboutCourse->benefits_course !!}
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
                        <a href="#" target="_blank">Learn more about repository sss.</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>




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

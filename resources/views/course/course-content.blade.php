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
                    @if (app()->getLocale() == 'ar')
                        <h2 class="page-title text-light">
                            {{ $content->title }} / {{ $course->title }}
                        </h2>
                    @elseif(app()->getLocale() == 'en')
                        <h2 class="page-title text-light" dir="ltr">
                            {{ $content->title }} / {{ $content->title }}
                        </h2>
                    @endif
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
                            <h1>{{ $content->title }}</h1>
                            <br>


                            @include('course._content')

                            @include('course._user-action')

                            <div class="hr-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(114, 126, 140, 1);transform: ;msFilter:;"><path d="M18 7c0-1.103-.897-2-2-2H4c-1.103 0-2 .897-2 2v10c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-3.333L22 17V7l-4 3.333V7zm-1.998 10H4V7h12l.001 4.999L16 12l.001.001.001 4.999z"></path></svg>
                            </div>


                            {{-- Buttons Next --}}
                              @if (app()->getLocale() == 'en')
                                    <div class="d-flex">
                                        <a href="{{ route('course.content.previous',['title'=> $course->title,'token'=> $content->token]) }}" class="btn btn-outline-dark ms-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(114, 126, 140, 1);transform: ;msFilter:;"><path d="M12.707 17.293 8.414 13H18v-2H8.414l4.293-4.293-1.414-1.414L4.586 12l6.707 6.707z"></path></svg>
                                            {{ __('Previous page') }}
                                        </a>
                                        <a href="{{ route('course.content.next',['title'=> $course->title,'token'=> $content->token]) }}" class="btn btn-outline-dark ms-auto">
                                            {{ __('Next Page') }}
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(114, 126, 140, 1);transform: ;msFilter:;"><path d="m11.293 17.293 1.414 1.414L19.414 12l-6.707-6.707-1.414 1.414L15.586 11H6v2h9.586z"></path></svg>
                                        </a>
                                    </div>
                                @elseif (app()->getLocale() == 'ar')
                                    <div class="d-flex">
                                        <a href="{{ route('course.content.previous',['title'=> $course->title,'token'=> $content->token]) }}" class="btn btn-outline-dark ms-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(114, 126, 140, 1);transform: ;msFilter:;"><path d="m11.293 17.293 1.414 1.414L19.414 12l-6.707-6.707-1.414 1.414L15.586 11H6v2h9.586z"></path></svg>
                                            {{ __('Previous page') }}
                                        </a>
                                        <a href="{{ route('course.content.next',['title'=> $course->title,'token'=> $content->token]) }}" class="btn btn-outline-dark ms-auto">
                                            {{ __('Next Page') }}
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(114, 126, 140, 1);transform: ;msFilter:;"><path d="M12.707 17.293 8.414 13H18v-2H8.414l4.293-4.293-1.414-1.414L4.586 12l6.707 6.707z"></path></svg>
                                        </a>
                                    </div>
                              @endif

                            {{-- Buttons Next / End --}}



                                {{-- Description --}}
                                    <br>
                                    @if ($content->description != null)
                                      <div class="hr-text">{{__('Description')}}</div>
                                      <div class="container card">
                                          <div class="card-body">
                                              {!! $content->description !!}
                                          </div>
                                      </div>
                                    @endif
                                {{-- Description / End --}}


                                @include('course._user-comments')

                        </div>
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
                            <h3 class="lh-1">{{ $course->name }}</h3>
                          </div>
                        </div>


                        <div class="col-12">
                            <div class="card">
                              <div class="card-header">
                                <h3 class="card-title">{{ __('Course Contents') }}</h3>
                              </div>
                              <div class="list-group list-group-flush">
                                @if ($contents != null)
                                @foreach ($contents as $item)
                                    @if ($content->id == $item->id)
                                        <a href="{{ route('course.content.get', ['title' => $course->title, 'token' => $item->token]) }}" class="list-group-item list-group-item-action active" aria-current="true">
                                            {{ $item->title }}
                                        </a>
                                    @else
                                        <a href="{{ route('course.content.get', ['title' => $course->title, 'token' => $item->token]) }}" class="list-group-item list-group-item-action">
                                            {{ $item->title }}
                                        </a>
                                    @endif
                                @endforeach
                            @endif

                              </div>
                            </div>
                        </div>




                      </div>
                      <div class="card-footer">
                        =====
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

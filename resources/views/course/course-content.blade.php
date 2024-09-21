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
                            {{ $course->title }} / {{ $content->title }}
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
                            <div class="container">
                                @if ($content->type == 'video')
                                    {{-- video --}}
                                    <div id="loading">
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
                                    <div>
                                        <a href="{{ route('course.comment.like',$content->token) }}" class="btn btn-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-secondary" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(114, 126, 140, 1);transform: ;msFilter:;">
                                                <path d="M12 4.595a5.904 5.904 0 0 0-3.996-1.558 5.942 5.942 0 0 0-4.213 1.758c-2.353 2.363-2.352 6.059.002 8.412l7.332 7.332c.17.299.498.492.875.492a.99.99 0 0 0 .792-.409l7.415-7.415c2.354-2.354 2.354-6.049-.002-8.416a5.938 5.938 0 0 0-4.209-1.754A5.906 5.906 0 0 0 12 4.595zm6.791 1.61c1.563 1.571 1.564 4.025.002 5.588L12 18.586l-6.793-6.793c-1.562-1.563-1.561-4.017-.002-5.584.76-.756 1.754-1.172 2.799-1.172s2.035.416 2.789 1.17l.5.5a.999.999 0 0 0 1.414 0l.5-.5c1.512-1.509 4.074-1.505 5.584-.002z"></path>
                                            </svg>
                                        </a>
                                        <a href="#" class="btn btn-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-secondary" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(114, 126, 140, 1);transform: ;msFilter:;"><path d="M19 3H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h8a.996.996 0 0 0 .707-.293l7-7a.997.997 0 0 0 .196-.293c.014-.03.022-.061.033-.093a.991.991 0 0 0 .051-.259c.002-.021.013-.041.013-.062V5c0-1.103-.897-2-2-2zM5 5h14v7h-6a1 1 0 0 0-1 1v6H5V5zm9 12.586V14h3.586L14 17.586z"></path></svg>
                                        </a>
                                        <a href="#" class="btn btn-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-secondary" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(114, 126, 140, 1);transform: ;msFilter:;"><path d="M12 11.222 14.667 13l-.89-3.111L16 8l-2.667-.333L12 5l-1.333 2.667L8 8l2.223 1.889L9.333 13z"></path><path d="M19 21.723V4a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v17.723l7-4.571 7 4.571zM8 8l2.667-.333L12 5l1.333 2.667L16 8l-2.223 1.889.89 3.111L12 11.222 9.333 13l.89-3.111L8 8z"></path></svg>
                                        </a>
                                    </div>
                                    <script>
                                        $(document).ready(function() {
                                            const videoName = '{{ $content->file_name }}';

                                        $('#loading').show();

                                        const url = '{{ route('file.get', ['name' => '__name__']) }}'.replace('__name__', encodeURIComponent(videoName));

                                        $.get(url, function(data) {

                                                    $('#loading').hide();

                                                    if (data.status === 'success') {
                                                        // Display video information
                                                        $('#response').html(`
                                                            <video controls class="container" controlsList="nodownload">
                                                                <source src="data:${data.mime_type};base64,${data.file_content}" type="${data.mime_type}" >
                                                                Your browser does not support the video tag.
                                                            </video>
                                                        `);
                                                    } else {
                                                        $('#response').html(`<p>${data.message}</p>`);
                                                    }
                                                })
                                                .fail(function() {
                                                    $('#response').html('<p>Error fetching video.</p>');
                                                });
                                        });
                                    </script>
                                    {{-- video / End --}}
                                @elseif ($content->type == 'txt')
                                    {{-- txt --}}
                                    <br>
                                    <div class="container">
                                        {!! $content->content !!}
                                    </div>
                                    {{-- txt / End --}}
                                @elseif ($content->type == 'file')
                                      {{-- pdf --}}
                                    <div id="loading">
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
                                    <div>
                                        <a href="#" class="btn btn-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-secondary" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(114, 126, 140, 1);transform: ;msFilter:;">
                                                <path d="M12 4.595a5.904 5.904 0 0 0-3.996-1.558 5.942 5.942 0 0 0-4.213 1.758c-2.353 2.363-2.352 6.059.002 8.412l7.332 7.332c.17.299.498.492.875.492a.99.99 0 0 0 .792-.409l7.415-7.415c2.354-2.354 2.354-6.049-.002-8.416a5.938 5.938 0 0 0-4.209-1.754A5.906 5.906 0 0 0 12 4.595zm6.791 1.61c1.563 1.571 1.564 4.025.002 5.588L12 18.586l-6.793-6.793c-1.562-1.563-1.561-4.017-.002-5.584.76-.756 1.754-1.172 2.799-1.172s2.035.416 2.789 1.17l.5.5a.999.999 0 0 0 1.414 0l.5-.5c1.512-1.509 4.074-1.505 5.584-.002z"></path>
                                            </svg>
                                        </a>
                                        <a href="#" class="btn btn-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-secondary" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(114, 126, 140, 1);transform: ;msFilter:;"><path d="M19 3H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h8a.996.996 0 0 0 .707-.293l7-7a.997.997 0 0 0 .196-.293c.014-.03.022-.061.033-.093a.991.991 0 0 0 .051-.259c.002-.021.013-.041.013-.062V5c0-1.103-.897-2-2-2zM5 5h14v7h-6a1 1 0 0 0-1 1v6H5V5zm9 12.586V14h3.586L14 17.586z"></path></svg>
                                        </a>
                                        <a href="#" class="btn btn-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-secondary" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(114, 126, 140, 1);transform: ;msFilter:;"><path d="M12 11.222 14.667 13l-.89-3.111L16 8l-2.667-.333L12 5l-1.333 2.667L8 8l2.223 1.889L9.333 13z"></path><path d="M19 21.723V4a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v17.723l7-4.571 7 4.571zM8 8l2.667-.333L12 5l1.333 2.667L16 8l-2.223 1.889.89 3.111L12 11.222 9.333 13l.89-3.111L8 8z"></path></svg>
                                        </a>
                                    </div>
                                    <script>
                                        $(document).ready(function() {
                                            const videoName = '{{ $content->file_name }}';

                                        $('#loading').show();

                                        const url = '{{ route('file.get', ['name' => '__name__']) }}'.replace('__name__', encodeURIComponent(videoName));

                                        $.get(url, function(data) {

                                                    $('#loading').hide();

                                                    if (data.status === 'success') {
                                                        // Display video information
                                                        $('#response').html(`
                                                          <iframe class="pdf" src="data:${data.mime_type};base64,${data.file_content}" width="650" height="500">
                                                        `);
                                                    } else {
                                                        $('#response').html(`<p>${data.message}</p>`);
                                                    }
                                                })
                                                .fail(function() {
                                                    $('#response').html('<p>Error fetching video.</p>');
                                                });
                                        });
                                    </script>
                                    {{-- pdf / End --}}
                                @endif
                            </div>



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
                                              {{$content->description}}
                                          </div>
                                      </div>
                                    @endif
                                {{-- Description / End --}}

                            {{-- Comments --}}
                            @if ($content->allow_comments == 'yes')
                                @if ($content && $content->Comments)
                                    @foreach ($content->Comments as $Comment)
                                        @if ($Comment->user)
                                            <br>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="list-group-item">
                                                            <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                <a href="#">
                                                                    <span class="avatar" style="background-image: url(./static/avatars/000m.jpg)"></span>
                                                                    <a href="#" class="text-reset d-block">{{ $Comment->user->username }}</a>
                                                                </a>
                                                            </div>
                                                            <div class="col">
                                                                <div class="container text-secondary ">
                                                                    <span>
                                                                        {!! $Comment->comment !!}
                                                                    </span>
                                                                </div>

                                                            </div>
                                                            <div class="col-auto">
                                                                <a href="#" class="btn btn-icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-secondary" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(114, 126, 140, 1);transform: ;msFilter:;">
                                                                        <path d="M12 4.595a5.904 5.904 0 0 0-3.996-1.558 5.942 5.942 0 0 0-4.213 1.758c-2.353 2.363-2.352 6.059.002 8.412l7.332 7.332c.17.299.498.492.875.492a.99.99 0 0 0 .792-.409l7.415-7.415c2.354-2.354 2.354-6.049-.002-8.416a5.938 5.938 0 0 0-4.209-1.754A5.906 5.906 0 0 0 12 4.595zm6.791 1.61c1.563 1.571 1.564 4.025.002 5.588L12 18.586l-6.793-6.793c-1.562-1.563-1.561-4.017-.002-5.584.76-.756 1.754-1.172 2.799-1.172s2.035.416 2.789 1.17l.5.5a.999.999 0 0 0 1.414 0l.5-.5c1.512-1.509 4.074-1.505 5.584-.002z"></path>
                                                                    </svg>
                                                                </a>
                                                                <a href="#" class="btn btn-icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-secondary" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(114, 126, 140, 1);transform: ;msFilter:;">
                                                                        <path d="M10 11h6v7h2v-8a1 1 0 0 0-1-1h-7V6l-5 4 5 4v-3z"></path>
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    {{ $Comment->created_at->diffForHumans() }}
                                                </div>
                                            </div>
                                        @else
                                            <p>No user associated with this comment.</p>
                                        @endif
                                    @endforeach
                                @endif
                            <br><br>
                                    {{-- Form Comment --}}
                                    <form class="container" action="{{ route('course.comment.create',$content->token) }}" method="POST">
                                        @csrf
                                        <textarea id="tinymce-default" name="comment"></textarea>

                                        @error('comment')
                                            <div class="form-text text-danger"> {{ $errors->first('comment') }} </div>
                                        @enderror

                                        <br>
                                        <div class="d-grid gap-2 col-6 mx-auto">
                                            <button type="submit" class="btn btn-primary">{{ __('Send') }}</button>
                                        </div>
                                        <br>

                                    </form>
                                    {{-- Form Comment / End --}}



                                  <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                      let options = {
                                        selector: '#tinymce-default',
                                        height: 250,
                                        menubar: false,
                                        statusbar: false,
                                        plugins: [
                                          'advlist autolink lists link image charmap print preview anchor',
                                          'searchreplace visualblocks code fullscreen',
                                          'insertdatetime media table paste code help wordcount'
                                        ],
                                        toolbar: 'undo redo | formatselect | ' +
                                          'bold italic backcolor | alignleft aligncenter ' +
                                          'alignright alignjustify | bullist numlist outdent indent | ' +
                                          'removeformat',
                                        content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; -webkit-font-smoothing: antialiased; }'
                                      }
                                      if (localStorage.getItem("tablerTheme") === 'dark') {
                                        options.skin = 'oxide-dark';
                                        options.content_css = 'dark';
                                      }
                                      tinyMCE.init(options);
                                    })
                                  </script>
                            @else

                            <br>
                            <div class="text-center">
                                    {{ __('Comments are closed') }}
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(114, 126, 140, 1);transform: ;msFilter:;"><path d="M12 2C9.243 2 7 4.243 7 7v3H6c-1.103 0-2 .897-2 2v8c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-8c0-1.103-.897-2-2-2h-1V7c0-2.757-2.243-5-5-5zm6 10 .002 8H6v-8h12zm-9-2V7c0-1.654 1.346-3 3-3s3 1.346 3 3v3H9z"></path></svg>
                            </div>

                            @endif
                            {{-- Comments / End --}}


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
                        This is not legal advice.
                        <a href="#" target="_blank">Learn more about repository licenses.</a>
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

@extends('layouts.app')
@section('title', __('Articles'))
@section('link.articles','active')
@section('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- Content  --}}
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title text-light">
                  {{ __('Articles') }}
                </h2>
                <div class="text-secondary mt-1">1-12 {{ __('of') }} 241 {{ __('Articles') }}</div>
              </div>
              <!-- Page title actions -->
              <div class="col-auto ms-auto d-print-none">
                <br>
                <div class="d-flex">


                    {{-- <div class="input-icon">
                      <input type="text" value="" class="form-control" placeholder="Search…">
                      <span class="input-icon-addon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path><path d="M21 21l-6 -6"></path></svg>
                      </span>
                    </div> --}}

                    {{-- Search… --}}

                    <div class="mb-3">
                        <div class="row g-2">
                          <div class="col">
                            <input type="text" class="form-control" placeholder="Search for…">
                          </div>
                          <div class="col-auto">
                            <a href="#" class="btn btn-icon" aria-label="Button">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path><path d="M21 21l-6 -6"></path></svg>
                            </a>
                          </div>
                        </div>
                    </div>
                    {{-- Search… / End --}}


                  </div>
                  @auth
                    <a href="{{ route('article.create.get') }}" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                        {{ __('Create an article') }}
                    </a>
                  @endauth
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-cards">
            {{-- Articles --}}
            @foreach ($Articles as $Article)

                <div class="col-sm-6 col-lg-4">
                    <div class="card card-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <span class="avatar me-3 rounded" data-bs-trigger="hover" data-bs-toggle="popover" data-bs-placement="top"
                                data-bs-content="{{ '@'.$Article->user->username }}" style="background-image: url({{ asset('user_avatar/' . $Article->user->avatar) }})"></span>
                                <div>
                                    <div>{{ $Article->name }}</div>
                                    <div class="text-secondary">{{ $Article->created_at->diffForHumans() }}</div>
                                </div>
                                <div class="ms-auto">
                                    <a href="#" class="text-secondary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                            <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path>
                                        </svg>
                                        {{ $Article->views }}
                                    </a>
                                    <a href="#" class="ms-3 text-secondary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"></path>
                                        </svg>
                                        {{ $Article->likes }}
                                    </a>
                                </div>
                            </div>
                            <br>
                            <div id="response-{{ $Article->id }}" ></div>
                            <div class="loading-message" id="loading-{{ $Article->id }}" style="display: none;">
                                <div class="card-body py-5 text-center">
                                    <div>
                                      <div class="avatar avatar-rounded avatar-lg placeholder mb-3"></div>
                                    </div>
                                    <div class="mt w-75 mx-auto">
                                      <div class="placeholder col-9 mb-3"></div>
                                      <div class="placeholder placeholder-xs col-10"></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <script>
                    $(document).ready(function() {
                        const ImageName = '{{ $Article->image }}';
                        const url = '{{ route('articles.images', ['name' => '__name__']) }}'.replace('__name__', encodeURIComponent(ImageName));
                        const loadingMessage = $('#loading-{{ $Article->id }}');
                        loadingMessage.show();

                        $.get(url, function(data) {
                            loadingMessage.hide();
                            if (data.status === 'success') {
                                $('#response-{{ $Article->id }}').html(`
                                <a href="{{ route('articles.details',$Article->token) }}">
                                    <img src="data:${data.mime_type};base64,${data.file_content}" class="card-img-top" alt="" style="max-height: 289px;max-width: 384px;">
                                </a>
                                `);
                            } else {
                                $('#response-{{ $Article->id }}').html(`<p>${data.message}</p>`);
                            }
                        })
                        .fail(function(jqXHR, textStatus, errorThrown) {
                            loadingMessage.hide();
                            $('#response-{{ $Article->id }}').html('<p>Error fetching image: ' + errorThrown + '</p>');
                        });
                    });
                </script>
            @endforeach

            {{-- Articles / End --}}
            <br>
            <div class="d-flex">
              <ul class="pagination ms-auto">
                {{ $Articles->links('vendor.pagination.bootstrap-4') }}
              </ul>
            </div>
          </div>
        </div>
      </div>
    {{-- Content / End --}}
@endsection

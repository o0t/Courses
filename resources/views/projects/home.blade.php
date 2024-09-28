@extends('layouts.app')
@section('title', __('Projects'))
@section('link.projects','active')
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
                  {{ __('Projects') }}
                </h2>
                <div class="text-secondary mt-1">1-12 {{ __('of') }} 241 {{ __('Projects') }}</div>
              </div>
              <!-- Page title actions -->
              <div class="col-auto ms-auto d-print-none">
                <div class="d-flex">
                  <div class="me-3">
                    <div class="input-icon">
                      <input type="text" value="" class="form-control" placeholder="Search…">
                      <span class="input-icon-addon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path><path d="M21 21l-6 -6"></path></svg>
                      </span>
                    </div>
                  </div>
                  @auth
                    <a href="{{ route('project.create.get') }}" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                        {{ __('Upload a project') }}
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
            <ul class="nav nav-bordered mb-2 mt-6">
                @foreach ($categories as $item)
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ $item->name }}</a>
                    </li>
                @endforeach
                {{-- <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">View all</a>
                </li>
                --}}
            </ul>
            <div class="row row-cards">
            {{-- Projects --}}
            @foreach ($Projects as $Project)
                <div class="col-sm-6 col-lg-4">
                    <div class="card card-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <span class="avatar me-3 rounded" style="background-image: url({{ asset('user_avatar/' . $Project->user->avatar) }})"></span>
                                <div>
                                    <div>{{ $Project->name }}</div>
                                    <div class="text-secondary">{{ $Project->created_at->diffForHumans() }}</div>
                                </div>
                                <div class="ms-auto">
                                    <a href="#" class="text-secondary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                            <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path>
                                        </svg>
                                        {{ $Project->views }}
                                    </a>
                                    <a href="#" class="ms-3 text-secondary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"></path>
                                        </svg>
                                        {{ $Project->likes }}
                                    </a>
                                </div>
                            </div>
                            <br>
                            <div id="response-{{ $Project->id }}" ></div>
                            <div class="loading-message" id="loading-{{ $Project->id }}" style="display: none;">
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
                        const ImageName = '{{ $Project->image_out }}';
                        const url = '{{ route('projects.images', ['name' => '__name__']) }}'.replace('__name__', encodeURIComponent(ImageName));
                        const loadingMessage = $('#loading-{{ $Project->id }}');
                        loadingMessage.show();

                        $.get(url, function(data) {
                            loadingMessage.hide();
                            if (data.status === 'success') {
                                $('#response-{{ $Project->id }}').html(`
                                <a href="#">
                                    <img src="data:${data.mime_type};base64,${data.file_content}" class="card-img-top" alt="" style="max-height: 289px;max-width: 384px;">
                                </a>
                                `);
                            } else {
                                $('#response-{{ $Project->id }}').html(`<p>${data.message}</p>`);
                            }
                        })
                        .fail(function(jqXHR, textStatus, errorThrown) {
                            loadingMessage.hide();
                            $('#response-{{ $Project->id }}').html('<p>Error fetching image: ' + errorThrown + '</p>');
                        });
                    });
                </script>
            @endforeach

            {{-- Projects / End --}}
            <br>
            <div class="d-flex">
              <ul class="pagination ms-auto">
                {{ $Projects->links('vendor.pagination.bootstrap-4') }}
              </ul>
            </div>
          </div>
        </div>
      </div>
    {{-- Content / End --}}
@endsection

@extends('layouts.app')
@section('title', __('Projects'))
@section('link.projects','active')
@section('content')

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
            <div class="row row-cards">
             @foreach ($Projects as $Project)
                <div class="col-sm-6 col-lg-4">
                    <div class="card card-sm">

                    {{-- <a href="{{ route('projects.details',['name' => $Project->name , 'username' => $Project->user->username]) }}" class="d-block"><img src="{{ asset('projects_img/'. $Project->image_out) }}" class="card-img-top"></a> --}}
                    <a href="#" class="d-block"><img src="{{ asset('projects_img/'. $Project->image_out) }}" class="card-img-top"></a>
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <span class="avatar me-3 rounded" style="background-image: url({{ asset('user_avatar/'. $Project->user->avatar) }})"></span>
                        <div>
                            <div>{{ $Project->name }}</div>
                            <div class="text-secondary"> {{ $Project->created_at->diffForHumans() }} </div>
                        </div>
                        <div class="ms-auto">
                            <a href="#" class="text-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path></svg>
                                {{ $Project->views }}
                            </a>
                            <a href="#" class="ms-3 text-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"></path></svg>
                                {{ $Project->likes}}
                            </a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
             @endforeach

              {{-- <div class="col-sm-6 col-lg-4">
                <div class="card card-sm">
                  <a href="#" class="d-block"><img src="https://incoserin.com/wp-content/uploads/2014/03/img.gif" class="card-img-top"></a>
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <span class="avatar me-3 rounded" style="background-image: url(./static/avatars/003m.jpg)"></span>
                      <div>
                        <div>Dunn Slane</div>
                        <div class="text-secondary">1 week and 3 days ago</div>
                      </div>
                      <div class="ms-auto">
                        <a href="#" class="text-secondary">
                          <!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path></svg>
                          479
                        </a>
                        <a href="#" class="ms-3 text-secondary">
                          <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-filled text-red"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"></path></svg>
                          71
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div> --}}





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

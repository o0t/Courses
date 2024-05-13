@extends('layouts.Teacher')
@section('title', __('Content Management'))
@section('active.content_management','active')
@section('content')
 {{-- content --}}

 <div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
      <div class="container-xl">
        <div class="row g-2 align-items-center">
          <div class="col">
            <!-- Page pre-title -->
            <div class="page-pretitle">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(146, 157, 171, 1);transform: ;msFilter:;"><path d="M4 8H2v12a2 2 0 0 0 2 2h12v-2H4z"></path><path d="M20 2H8a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zm-9 12V6l7 4z"></path></svg>
            </div>
            <h2 class="page-title">
              {{ __('My Courses') }}
            </h2>
          </div>
          <!-- Page title actions -->
          <div class="col-auto ms-auto d-print-none">
            <div class="btn-list">
              <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(168, 193, 221, 1);transform: ;msFilter:;"><path d="M11 8H9v3H6v2h3v3h2v-3h3v-2h-3z"></path><path d="M18 7c0-1.103-.897-2-2-2H4c-1.103 0-2 .897-2 2v10c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-3.333L22 17V7l-4 3.333V7zm-1.999 10H4V7h12v5l.001 5z"></path></svg>
                {{ __('Create a Course') }}

              </a>
              <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(168, 193, 221, 1);transform: ;msFilter:;"><path d="M11 8H9v3H6v2h3v3h2v-3h3v-2h-3z"></path><path d="M18 7c0-1.103-.897-2-2-2H4c-1.103 0-2 .897-2 2v10c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-3.333L22 17V7l-4 3.333V7zm-1.999 10H4V7h12v5l.001 5z"></path></svg>

              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page body -->

    <div class="page-body">
        <div class="container-xl">
          <div class="row row-deck row-cards">



            <div class="col-sm-6 col-lg-4">
                <div class="card card-link card-link-pop">
                    <!-- Photo -->
                    <div class="img-responsive img-responsive-21x9 card-img-top" style="background-image: url(https://incoserin.com/wp-content/uploads/2014/03/img.gif)"></div>
                    <div class="card-body">
                      <h3 class="card-title">Card with top image</h3>
                      <p class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt, iste, itaque minima
                        neque pariatur perferendis sed suscipit velit vitae voluptatem.</p>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex">
                            <a href="#" class="btn btn-primary">{{ __('Edit') }}</a>
                            <a href="#" class="btn btn-primary ms-auto">{{ __('Preview') }}</a>
                        </div>
                      </div>
                  </div>
            </div>

            <div class="col-sm-6 col-lg-4">
                <div class="card card-link card-link-pop">
                    <!-- Photo -->
                    <div class="img-responsive img-responsive-21x9 card-img-top" style="background-image: url(https://incoserin.com/wp-content/uploads/2014/03/img.gif)"></div>
                    <div class="card-body">
                      <h3 class="card-title">Card with top image</h3>
                      <p class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt, iste, itaque minima
                        neque pariatur perferendis sed suscipit velit vitae voluptatem.</p>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex">
                            <a href="#" class="btn btn-primary">{{ __('Edit') }}</a>
                            <a href="#" class="btn btn-primary ms-auto">{{ __('Preview') }}</a>
                        </div>
                      </div>
                  </div>
            </div>

            <div class="col-sm-6 col-lg-4">
                <div class="card card-link card-link-pop">
                    <!-- Photo -->
                    <div class="img-responsive img-responsive-21x9 card-img-top" style="background-image: url(https://incoserin.com/wp-content/uploads/2014/03/img.gif)"></div>
                    <div class="card-body">
                      <h3 class="card-title">Card with top image</h3>
                      <p class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt, iste, itaque minima
                        neque pariatur perferendis sed suscipit velit vitae voluptatem.</p>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex">
                            <a href="#" class="btn btn-primary">{{ __('Edit') }}</a>
                            <a href="#" class="btn btn-primary ms-auto">{{ __('Preview') }}</a>
                        </div>
                      </div>
                  </div>
            </div>



          </div>
        </div>
      </div>
    {{-- content / End --}}
@endsection

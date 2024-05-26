@extends('layouts.Teacher')
@section('title', __('Content Management'))
@section('active.content.home','active')
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

    <br><br>
    <div class="container col-12">
        <div class="card">
          <div class="table-responsive">
            <table class="table table-hover table-vcenter card-table table-striped">
              <thead>
                <tr>
                  <th>{{ __('Course Name') }}</th>
                  <th>{{ __('Course link') }}</th>
                  <th>{{ __('Course status') }}</th>
                  <th>{{ __('Date created') }}</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($Courses as $Course)
                    <tr>
                        <td><a href="{{ route('teacher.course.home',$Course->url) }}">{{ $Course->name }}</a></td>
                        <td class="text-secondary">
                            {{ 'https://raqeeb.online/course/'.$Course->url }}
                        </td>
                        <td class="text-secondary">
                            @if ($Course->status == 'waiting')
                                <span class="badge bg-yellow text-yellow-fg" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('Waiting for supervisor approval') }}">{{ __('waiting') }}</span>
                            @elseif ($Course->status == 'private')
                                <span class="badge bg-azure text-azure-fg" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('Invisible to anyone') }}">{{ __('private') }}</span>
                            @elseif ($Course->status == 'general')
                                <span class="badge bg-teal text-teal-fg" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('Visible to everyone') }}">{{ __('general') }}</span>
                            @elseif ($Course->status == 'customized')
                                <span class="badge bg-orange text-orange-fg" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('Visible to specific people') }}">{{ __('customized') }}</span>
                            @elseif ($Course->status == 'closed')
                                <span class="badge bg-red text-red-fg" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('Closed by admin') }}">{{ __('closed') }}</span>
                            @endif
                        </td>
                        <td class="text-secondary">
                            {{ $Course->created_at->diffForHumans() }}
                        </td>

                    </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>
    {{-- content / End --}}
    {{-- Model --}}

    <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">{{ __('Create a Course') }}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('teacher.course.create') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">{{ __('Course Name') }}</label>
                        <input type="text" class="form-control" value="{{ old('course-name') }}" name="course-name" placeholder="{{ __('The name of your course') }}">
                        <div class="form-text">{{ __('The name will be visible only to you') }}</div>
                        @error('course-name')
                            <div class="form-text text-danger">{{ $errors->first('course-name') }}</div>
                        @enderror
                    </div>
                    <label class="form-label">{{ __('Course level') }}</label>
                    <div class="form-selectgroup-boxes row mb-3">
                        <div class="col-lg-3">
                        <label class="form-selectgroup-item">
                            <input type="radio" name="level" value="beginner" class="form-selectgroup-input">
                            <span class="form-selectgroup-label d-flex align-items-center p-3">
                            <span class="me-3">
                                <span class="form-selectgroup-check"></span>
                            </span>
                            <span class="form-selectgroup-label-content">
                                <span class="form-selectgroup-title strong mb-1">{{ __('Beginner') }}</span>
                            </span>
                            </span>
                        </label>
                        </div>
                        <div class="col-lg-3">
                            <label class="form-selectgroup-item">
                            <input type="radio" name="level" value="intermediate" class="form-selectgroup-input">
                            <span class="form-selectgroup-label d-flex align-items-center p-3">
                                <span class="me-3">
                                <span class="form-selectgroup-check"></span>
                                </span>
                                <span class="form-selectgroup-label-content">
                                <span class="form-selectgroup-title strong mb-1">{{ __('Intermediate') }}</span>
                                </span>
                            </span>
                            </label>
                        </div>
                        <div class="col-lg-3">
                        <label class="form-selectgroup-item">
                            <input type="radio" name="level" value="professional" class="form-selectgroup-input">
                            <span class="form-selectgroup-label d-flex align-items-center p-3">
                            <span class="me-3">
                                <span class="form-selectgroup-check"></span>
                            </span>
                            <span class="form-selectgroup-label-content">
                                <span class="form-selectgroup-title strong mb-1">{{ __('Professional') }}</span>
                            </span>
                            </span>
                        </label>
                        </div>
                        <div class="col-lg-3">
                            <label class="form-selectgroup-item">
                            <input type="radio" name="level" value="all" class="form-selectgroup-input">
                            <span class="form-selectgroup-label d-flex align-items-center p-3">
                                <span class="me-3">
                                <span class="form-selectgroup-check"></span>
                                </span>
                                <span class="form-selectgroup-label-content">
                                <span class="form-selectgroup-title strong mb-1">{{ __('All levels') }}</span>
                                </span>
                            </span>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Course link') }}</label>
                                @if (app()->getLocale() == 'en')
                                    <div class="input-group input-group-flat">
                                    <span class="input-group-text">
                                        https://raqeeb.online/course/
                                    </span>
                                        <input type="text" class="form-control ps-0" name="course-url"  placeholder="{{ __('Your course link') }}" autocomplete="off">
                                    </div>
                                    @error('course-url')
                                        <div class="form-text text-danger">{{ $errors->first('course-url') }}</div>
                                    @enderror
                                @elseif (app()->getLocale() == 'ar')

                                    <div class="mb-3">
                                        <div class="input-group input-group-flat">
                                        <input type="text" class="form-control text-end pe-0" name="course-url" placeholder="{{ __('Your course link') }}" autocomplete="off">
                                        <span class="input-group-text">
                                            /https://raqeeb.online/course
                                        </span>
                                        </div>
                                    </div>

                                    @error('course-url')
                                        <div class="form-text text-danger">{{ $errors->first('course-url') }}</div>
                                    @enderror
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                            {{ __('Create new course') }}
                          </button>
                        <a href="#" class="btn btn-link link-secondary ms-auto" data-bs-dismiss="modal">
                            {{ __('Cancel') }}
                        </a>
                    </div>
                </form>
            </div>


          </div>
        </div>
    </div>
    {{-- Model / End --}}
@endsection

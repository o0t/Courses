@extends('layouts.app')
@section('title',__('Course settings'))
@section('active.content.home','active')
@section('active.course.settings','active')
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
                                        @if (app()->getLocale() == 'en')
                                            <a href="{{ URL::previous() }}" class="btn btn-icon btn-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(236, 236, 236, 1);transform: ;msFilter:;"><path d="M21 11H6.414l5.293-5.293-1.414-1.414L2.586 12l7.707 7.707 1.414-1.414L6.414 13H21z"></path></svg>
                                            </a>
                                        @elseif (app()->getLocale() == 'ar')
                                            <a href="{{ URL::previous() }}" class="btn btn-icon btn-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(236, 236, 236, 1);transform: rotate(180deg);msFilter:progid:DXImageTransform.Microsoft.BasicImage(rotation=2);"><path d="M21 11H6.414l5.293-5.293-1.414-1.414L2.586 12l7.707 7.707 1.414-1.414L6.414 13H21z"></path></svg>
                                            </a>
                                        @endif
                                    </div>
                            </div>
                        <!-- Page title actions -->
                            <div class="col-auto ms-auto d-print-none">
                                    <div class="btn-list">
                                        <a href="#" class="btn btn-icon btn-primary" data-bs-toggle="modal" data-bs-target="#modal-report">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(236, 236, 236, 1);transform: ;msFilter:;"><path d="M14 12c-1.095 0-2-.905-2-2 0-.354.103-.683.268-.973C12.178 9.02 12.092 9 12 9a3.02 3.02 0 0 0-3 3c0 1.642 1.358 3 3 3 1.641 0 3-1.358 3-3 0-.092-.02-.178-.027-.268-.29.165-.619.268-.973.268z"></path><path d="M12 5c-7.633 0-9.927 6.617-9.948 6.684L1.946 12l.105.316C2.073 12.383 4.367 19 12 19s9.927-6.617 9.948-6.684l.106-.316-.105-.316C21.927 11.617 19.633 5 12 5zm0 12c-5.351 0-7.424-3.846-7.926-5C4.578 10.842 6.652 7 12 7c5.351 0 7.424 3.846 7.926 5-.504 1.158-2.578 5-7.926 5z"></path></svg>
                                            {{-- {{ __('Preview') }} --}}
                                        </a>
                                    </div>
                            </div>
                        </div>
                </div>
            </div>
            <!-- Page body -->

            <br><br>
            <div class="container col-12">

                {{-- Nav --}}
                @include('teacher.course._nav-course')
                {{-- Nav / End --}}

                <br>
                {{-- Content --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('teacher.course.settings.update',$Course->url) }}" method="POST" class="card" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                      <h3 class="card-title">{{ __('Course settings') }}</h3>
                      <hr>
                      <div class="row row-cards">
                        <div class="col-md-4">
                            <div class="row align-items-center">
                                <div class="col-auto"><span class="avatar avatar-xl" style="background-image: url({{ Storage::disk('minio')->url('images/' . $Course->photo) }})"></span>
                                </div>
                                <div class="col-auto">
                                    <div class="form-label">{{ __('Change Course image') }}</div>
                                        <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                          <div class="mb-3">
                            <label class="form-label">{{ __('Course title') }}</label>
                            @if ($Course->title)
                                <input type="text" class="form-control" name="title" value="{{ $Course->title }}">
                            @else
                                <input type="text" class="form-control" name="title" placeholder="{{ __('There is no course title') }}">
                            @endif
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                          <div class="mb-4">
                            <label class="form-label">{{ __('Course Name') }}</label>
                                <input type="text" class="form-control" name="name" value="{{ $Course->name }}">
                                <div class="form-text">{{ __('The name will be visible only to you') }}</div>
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                                <label class="form-label">{{ __('Course link') }}</label>
                                @if (app()->getLocale() == 'en')
                                    <div class="input-group input-group-flat">
                                    <span class="input-group-text">
                                        https://raqeeb.online/course/
                                    </span>
                                        <input type="text" class="form-control ps-0" name="course-url"  value="{{ $Course->url }}" autocomplete="off">
                                    </div>
                                    @error('course-url')
                                        <div class="form-text text-danger">{{ $errors->first('course-url') }}</div>
                                    @enderror
                                @elseif (app()->getLocale() == 'ar')

                                    <div class="mb-3">
                                        <div class="input-group input-group-flat">
                                        <input type="text" class="form-control text-end pe-0" name="course-url" value="{{ $Course->url }}" autocomplete="off">
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
                        <div class="col-sm-3 col-md-3">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Course level') }}</label>
                                <select class="form-select" name="level">
                                    @if ($Course->level == 'beginner')
                                        <option value="beginner" selected>{{ __('beginner') }}</option>
                                        <option value="intermediate" >{{ __('intermediate') }}</option>
                                        <option value="professional">{{ __('professional') }}</option>
                                        <option value="all">{{ __('All stages') }}</option>
                                    @elseif ($Course->level == 'intermediate')
                                        <option value="intermediate" selected>{{ __('intermediate') }}</option>
                                        <option value="beginner">{{ __('beginner') }}</option>
                                        <option value="professional">{{ __('professional') }}</option>
                                        <option value="all">{{ __('All stages') }}</option>
                                    @elseif ($Course->level == 'professional')
                                        <option value="professional" selected>{{ __('professional') }}</option>
                                        <option value="beginner">{{ __('beginner') }}</option>
                                        <option value="intermediate">{{ __('intermediate') }}</option>
                                        <option value="all">{{ __('All stages') }}</option>
                                    @elseif ($Course->level == 'all')
                                        <option value="all" selected>{{ __('All stages') }}</option>
                                        <option value="beginner">{{ __('beginner') }}</option>
                                        <option value="intermediate">{{ __('intermediate') }}</option>
                                        <option value="professional">{{ __('professional') }}</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3 col-md-3">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Subscriber status') }}</label>
                                <select class="form-select" name="subscribers_status">
                                    @if ($Course->subscribers_status == 'paid')
                                        <option value="paid" selected>{{ __('paid') }}</option>
                                        <option value="free">{{ __('free') }}</option>
                                    @elseif ($Course->subscribers_status == 'free')
                                        <option value="free" selected>{{ __('free') }}</option>
                                        <option value="paid">{{ __('paid') }}</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                          <div class="mb-2">
                            <label class="form-label">{{ __('Course category') }}</label>

                            <select class="form-select" name="course_category">
                                @if ($Course->course_category == NULL)
                                    <option value="" selected >{{ __('No category') }}</option>
                                @endif
                                @foreach($categories as $category)
                                    <option value="{{ $category }}" @if($Course->course_category == $category) selected @endif>{{ __($category) }}</option>
                                @endforeach
                            </select>

                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer text-center">
                      <button type="submit" class="btn btn-primary">{{ __('Course update') }}</button>
                    </div>
                </form>
                {{-- Content / End --}}


            </div>
    </div>
    {{-- content / End --}}





@endsection

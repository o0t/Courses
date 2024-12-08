@extends('layouts.app')
@section('title',__('Content display settings'))
@section('active.content.home','active')
@section('active.course.display.sections','active')
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


                <form action="{{ route('teacher.course.content.display.settings.update',$Course->id) }}" method="POST" class="card" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                      <h3 class="card-title">{{ __('Content display settings') }}</h3>
                      <hr>
                      <div class="row row-cards">
                        <div class="col-md-4">
                          <div class="mb-3">
                            <label class="form-label">{{ __('Number of lessons') }}</label>
                                <input type="text" class="form-control" name="number_lessons" readonly disabled value="{{ $Course->count_lessons }}">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="mb-4">
                                <label class="form-label">{{ __('Count Time Videos') }}</label>
                                <input type="text" class="form-control" name="number_video" readonly disabled value="{{ $Course->count_Time_Videos }}">
                            </div>
                        </div>
                        <div class="col-sm-3 col-md-4">
                            <div class="mb-4">
                                <label class="form-label">{{ __('Number of tests') }}</label>
                                <input type="text" class="form-control" name="number_tests" readonly disabled value="{{ $Course->count_tests }}">
                            </div>
                        </div>


                        <br>
                      <br><br>
                      <label class="form-label">{{ __('Course information') }}</label>
                      <textarea id="tinymce-default" name="course_information">{{ $Course->AboutCourse->course_information }}</textarea>
                      @error('course_information')
                        <div class="form-text text-danger">{{ $errors->first('course_information') }}</div>
                      @enderror

                      <div class="hr-text"> <i class='bx bx-clipboard' ></i> </div>
                      <br><br>
                      <label class="form-label">{{ __('It is recommended to be familiar with these topics before starting the course') }}</label>
                      <textarea id="tinymce-default" name="recommended_course">{{ $Course->AboutCourse->recommended_course }}</textarea>
                        @error('recommended_course')
                            <div class="form-text text-danger">{{ $errors->first('recommended_course') }}</div>
                        @enderror



                        <div class="hr-text"> <i class='bx bx-clipboard' ></i> </div>
                        <br><br>
                        <label class="form-label">{{ __('You will learn in this course') }}</label>
                        <textarea id="tinymce-default" name="learn_course">{{ $Course->AboutCourse->learn_course }}</textarea>
                          @error('learn_course')
                              <div class="form-text text-danger">{{ $errors->first('learn_course') }}</div>
                          @enderror






                        <div class="hr-text"> <i class='bx bx-clipboard' ></i> </div>
                        <br><br>
                        <label class="form-label">{{ __('Who benefits from this course') }}</label>
                        <textarea id="tinymce-default" name="benefits_course">{{ $Course->AboutCourse->benefits_course }}</textarea>
                          @error('benefits_course')
                              <div class="form-text text-danger">{{ $errors->first('benefits_course') }}</div>
                          @enderror




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


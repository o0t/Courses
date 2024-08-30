@extends('layouts.app')
@section('title',__('Course Content'))
@section('active.content.home','active')
@section('active.course.contents','active')
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
                                        <a href="{{ route('teacher.content.home') }}" class="btn btn-icon btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(236, 236, 236, 1);transform: ;msFilter:;"><path d="M21 11H6.414l5.293-5.293-1.414-1.414L2.586 12l7.707 7.707 1.414-1.414L6.414 13H21z"></path></svg>
                                        </a>
                                    @elseif (app()->getLocale() == 'ar')
                                        <a href="{{ route('teacher.content.home') }}" class="btn btn-icon btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(236, 236, 236, 1);transform: rotate(180deg);msFilter:progid:DXImageTransform.Microsoft.BasicImage(rotation=2);"><path d="M21 11H6.414l5.293-5.293-1.414-1.414L2.586 12l7.707 7.707 1.414-1.414L6.414 13H21z"></path></svg>
                                        </a>
                                    @endif
                                </div>
                        </div>
                    <!-- Page title actions -->
                        <div class="col-auto ms-auto d-print-none">
                                <div class="btn-list">
                                    <a href="#" class="btn btn-icon btn-primary">
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
                @include('teacher.content.course._nav-course')
            {{-- Nav / End --}}
            <br>
            <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="M19 11h-6V5h-2v6H5v2h6v6h2v-6h6z"></path></svg>
                {{ __('Create content') }}

            </a>


            <br><br><br>

            {{-- Table --}}
            {{-- <div class="card">
                <div class="table-responsive">
                  <table class="table table-vcenter card-table table-hover">
                    <thead>
                      <tr>
                        <th>id</th>
                        <th>{{ __('Section Name') }}</th>
                        <th>{{ __('Number of videos') }}</th>
                        <th>{{ __('Number of text files') }}</th>
                        <th>{{ __('Number of PDF files') }}</th>
                        <th>{{ __('Number of tests') }}</th>
                        <th>{{ __('Date created') }}</th>
                        <th>{{ __('Updated on') }}</th>
                        <th class="w-1"></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($Contents as $Content)
                            {{ $Content }}
                        @endforeach
                    </tbody>
                  </table>
                  <br>
                  {{ $Contents->links('vendor.pagination.bootstrap-4') }}

                </div>
              </div> --}}
            {{-- Table / End --}}





             {{-- Model --}}
              {{-- Old Model --}}
                {{-- <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title">{{ __('Create a section') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('teacher.course.sections.create',$Course->url) }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">{{ __('Section Name') }}</label>
                                    <input type="text" class="form-control" value="{{ old('section-name') }}" name="section-name" placeholder="{{ __('The name of the content section') }}">
                                    <div class="form-text">{{ __('When left blank, the name does not appear and belongs to the previous section') }}</div>
                                    @error('section-nameCourseext text-danger">{{ $errors->first('section-name') }}</div>
                                    @enderror
                                </div>



                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                        {{ __('Create a new section') }}
                                    </button>
                                    <a href="#" class="btn btn-link link-secondary ms-auto" data-bs-dismiss="modal">
                                        {{ __('Cancel') }}
                                    </a>
                                </div>
                            </form>
                        </div>


                    </div>
                    </div>
                </div> --}}
                {{-- Old Model / End --}}





                <div class="modal modal-blur fade" id="modal-report" tabindex="-1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                      <form action="{{ route('teacher.course.contents.create',$Course->url) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">{{ __('Create content') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="mb-3">
                              <label class="form-label">{{ __('title') }}</label>
                              <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="{{ __('Content Title') }}">
                              @error('title')
                                <div class="form-text text-danger">{{ $errors->first('title') }}</div>
                              @enderror
                            </div>
                            <label class="form-label">{{ __('Content Type') }}</label>
                            <div class="form-selectgroup-boxes row mb-3">
                              <div class="col-lg-6">
                                <label class="form-selectgroup-item">
                                  <input type="radio" name="content_type" value="1" class="form-selectgroup-input report-type-radio" checked="">
                                  <span class="form-selectgroup-label d-flex align-items-center p-3">
                                    <span class="me-3">
                                      <span class="form-selectgroup-check"></span>
                                    </span>
                                    <span class="form-selectgroup-label-content">
                                      <span class="form-selectgroup-title strong mb-1">{{ __('Content writing') }}</span>
                                      <span class="d-block text-secondary">{{ __('To write text content only') }}</span>
                                    </span>
                                  </span>
                                </label>
                              </div>
                              <div class="col-lg-6">
                                <label class="form-selectgroup-item">
                                  <input type="radio" name="content_type" value="2" class="form-selectgroup-input report-type-radio">
                                  <span class="form-selectgroup-label d-flex align-items-center p-3">
                                    <span class="me-3">
                                      <span class="form-selectgroup-check"></span>
                                    </span>
                                    <span class="form-selectgroup-label-content">
                                      <span class="form-selectgroup-title strong mb-1">{{ __('Upload content') }}</span>
                                      <span class="d-block text-secondary">{{ __('To upload your content') }}</span>
                                    </span>
                                  </span>
                                </label>
                              </div>
                            </div>

                            <div class="col-sm-12 col-md-12 input-texts">


                                <div class="mb-12">
                                    <div class="hr-text">
                                        <i class='bx bx-clipboard' ></i>
                                    </div>

                                    <label class="form-label">{{ __('Text content') }}</label>
                                    <textarea id="tinymce-default" value="{{ old('txt-content') }}" name="txt-content"></textarea>
                                    @error('txt-content')
                                        <div class="form-text text-danger">{{ $errors->first('txt-content') }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-sm-12 col-md-12 additional-inputs" style="display: none;">
                                <div class="mb-12">
                                    <div class="form-label">{{ __('upload a file') }}</div>
                                    <input type="file" name="file" class="form-control">
                                    @error('file')
                                        <div class="form-text text-danger">{{ $errors->first('file') }}</div>
                                    @enderror
                                </div>


                                    <div class="mb-12">
                                        <div class="hr-text">
                                            <i class='bx bx-clipboard' ></i>
                                        </div>

                                        <label class="form-label">{{ __('Description') }}</label>
                                        <textarea id="tinymce-default" value="{{ old('description') }}" name="description"></textarea>
                                        @error('description')
                                            <div class="form-text text-danger">{{ $errors->first('description') }}</div>
                                        @enderror
                                    </div>
                            </div>






                                <br>
                                <div>
                                    <label class="row">
                                    <span class="col">{{ __('Allow comments') }}</span>
                                    <span class="col-auto">
                                        <label class="form-check form-check-single form-switch">
                                        <input class="form-check-input" name="allow_comments" type="checkbox" checked="">
                                        </label>
                                    </span>
                                    </label>
                                </div>

                                <br>

                            <div class="modal-footer">
                                <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                                Cancel
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 5l0 14"></path>
                                        <path d="M5 12l14 0"></path>
                                    </svg>
                                    {{ __('Create Content') }}
                                </button>
                            </div>
                        </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

            {{-- Model / End --}}
    {{-- content / End --}}

@endsection

@section('js')

        {{-- Model --}}
            {{-- jquery --}}
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

            <script>
            $(document).ready(function() {
                $('.report-type-radio').on('change', function() {
                if ($(this).val() === '2') {
                    $('.additional-inputs').show();
                    $('.input-texts').hide();
                } else {
                    $('.additional-inputs').hide();
                    $('.input-texts').show();
                }
                });
            });
            </script>
        {{-- Model / End --}}


        {{-- Txt Content --}}
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
        {{-- Txt Content --}}


@endsection

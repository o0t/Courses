@extends('layouts.app')
@section('title',__('Edit' . $Content->title))
@section('active.content.home','active')
@section('active.course.contents','active')
@section('content')
 {{-- content --}}

 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 <script src="{{ asset('assets/js/content.js') }}"></script>


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
            <br><br><br>

            <div class="row">
                <div class="col-md-6 col-xl-12">
                  <div class="mb-3">
                    <label class="form-label">{{ __('title') }}</label>
                    <input type="text" class="form-control" value="{{ $Content->title }}" name="title">
                  </div>

                  <div class="mb-3">
                    <label class="form-label">{{ __('URL') }}</label>
                    <div class="input-group input-group-flat">
                      <span class="input-group-text"> https://www.example.com/ </span>
                      <input type="text" class="form-control ps-0" name="url" value="{{ $Content->url }}">
                    </div>
                  </div>

                </div>
                <div class="col-md-6 col-xl-12">
                    <textarea id="tinymce-default" name="content">{{ $Course->content ?? null }}</textarea>
                    @error('content')
                        <div class="form-text text-danger">{{ $errors->first('content') }}</div>
                    @enderror

                </div>
              </div>

        </div>



    {{-- content / End --}}
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



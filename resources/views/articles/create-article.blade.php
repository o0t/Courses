@extends('layouts.app')
@section('title', __('Create Article'))
@section('link.articles','active')
@section('content')

    {{-- Content  --}}
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title text-light">
                    {{ __('Create an article') }}
                </h2>
              </div>
            </div>
          </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="card card-lg">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <br>
                    <form action="{{ route('article.create.post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row row-cards">
                        {{-- Images --}}
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span id="avatarPreview" class="avatar avatar-xl" style="background-image: url(https://contenthub-static.grammarly.com/blog/wp-content/uploads/2019/08/August-blog-header-Amplification-437x233.png)"></span>
                                </div>
                                <div class="col-auto">
                                    <input type="file" name="image" class="form-control" onchange="previewImage(event, 'avatarPreview')">
                                </div>
                            </div>

                            <div class="hr-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(146, 157, 171, 1);">
                                    <circle cx="7.499" cy="9.5" r="1.5"></circle>
                                    <path d="m10.499 14-1.5-2-3 4h12l-4.5-6z"></path>
                                    <path d="M19.999 4h-16c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm-16 14V6h16l.002 12H3.999z"></path>
                                </svg>
                            </div>


                            <script>
                                function previewImage(event, previewId) {
                                    const file = event.target.files[0];
                                    if (file) {
                                        const reader = new FileReader();
                                        reader.onload = function(e) {
                                            document.getElementById(previewId).style.backgroundImage = `url(${e.target.result})`;
                                        }
                                        reader.readAsDataURL(file);
                                    }
                                }
                            </script>

                        {{-- Images / End --}}

                            <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label"> {{ __('Name') }}</label>
                                    <input type="text" name="name" class="form-control" placeholder=".." >
                                    <div id="emailHelp" class="form-text">{{ __('This name will be the title of the article display') }}</div>
                                    @error('name')
                                        <div class="form-text text-danger">{{ $errors->first('name') }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="col-md-6">
                                    <label class="form-label">{{ __('Courses') }}</label>
                                    <select name="courses" class="form-control form-select">
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->title }}">{{ $course->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-12">
                                <label class="form-label"> {{ __('title') }}</label>
                                <input type="text" name="title" class="form-control" placeholder=".." >
                                <div id="emailHelp" class="form-text">{{ __('This name will be the title within the article') }}</div>
                                @error('title')
                                    <div class="form-text text-danger">{{ $errors->first('title') }}</div>
                                @enderror
                            </div>
                            <textarea id="tinymce-default" value="{{ old('article') }}" name="article"></textarea>
                            @error('article')
                                <div class="form-text text-danger">{{ $errors->first('article') }}</div>
                            @enderror
                            {{-- Txt Content --}}
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                let options = {
                                    selector: '#tinymce-default',
                                    height: 500,
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
                        <br>
                        <div class="d-grid gap-2 col-4 mx-auto">
                            <button class="btn btn-primary" type="submit">{{ __('Create') }}</button>
                        </div>
                    </form>
                </div>
            </div>
          </div>
        </div>
      </div>


    {{-- Content / End --}}
@endsection

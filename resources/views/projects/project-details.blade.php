@extends('layouts.app')
@section('title', __('Project details'))
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
                  Frequently Asked Questions
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
                    <div class="row row-cards">
                    {{-- Images --}}
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span id="avatarPreview" class="avatar avatar-xl" style="background-image: url(https://www.ntaskmanager.com/wp-content/uploads/2020/10/project-design-in-project-management.png)"></span>
                            </div>
                            <div class="col-auto">
                                <input type="file" name="image1" class="form-control" onchange="previewImage(event, 'avatarPreview')">
                            </div>
                        </div>

                        <div class="hr-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(146, 157, 171, 1);">
                                <circle cx="7.499" cy="9.5" r="1.5"></circle>
                                <path d="m10.499 14-1.5-2-3 4h12l-4.5-6z"></path>
                                <path d="M19.999 4h-16c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm-16 14V6h16l.002 12H3.999z"></path>
                            </svg>
                        </div>

                        <div class="col-md-3">
                            <div class="img-responsive img-responsive-1x1 rounded border" id="preview1" style="background-image: url(https://www.ntaskmanager.com/wp-content/uploads/2020/10/project-design-in-project-management.png);"></div>
                            <br>
                            <div class="mb-2">
                                <input type="file" name="image2" class="form-control" onchange="previewImage(event, 'preview1')">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="img-responsive img-responsive-1x1 rounded border" id="preview2" style="background-image: url(https://www.ntaskmanager.com/wp-content/uploads/2020/10/project-design-in-project-management.png);"></div>
                            <br>
                            <div class="mb-2">
                                <input type="file" name="image3" class="form-control" onchange="previewImage(event, 'preview2')">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="img-responsive img-responsive-1x1 rounded border" id="preview3" style="background-image: url(https://www.ntaskmanager.com/wp-content/uploads/2020/10/project-design-in-project-management.png);"></div>
                            <br>
                            <div class="mb-2">
                                <input type="file" name="image4" class="form-control" onchange="previewImage(event, 'preview3')">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="img-responsive img-responsive-1x1 rounded border" id="preview4" style="background-image: url(https://www.ntaskmanager.com/wp-content/uploads/2020/10/project-design-in-project-management.png);"></div>
                            <br>
                            <div class="mb-2">
                                <input type="file" name="image5" class="form-control" onchange="previewImage(event, 'preview4')">
                            </div>
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
                        <div class="hr-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(146, 157, 171, 1);transform: ;msFilter:;"><circle cx="7.499" cy="9.5" r="1.5"></circle><path d="m10.499 14-1.5-2-3 4h12l-4.5-6z"></path><path d="M19.999 4h-16c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm-16 14V6h16l.002 12H3.999z"></path></svg>
                        </div>

                        <div class="col-sm-4 col-md-4">
                            <div class="mb-3">
                                <label class="form-label"> {{ __('Name') }}</label>
                                <input type="text" class="form-control" placeholder="Username" value="michael23">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Country</label>
                                <select class="form-control form-select">
                                    <option value="">Germany</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Country</label>
                                <select class="form-control form-select">
                                    <option value="">Germany</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Project Link 1') }}</label>
                                <input type="text" class="form-control" placeholder="www.your_project_1.com" >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Project Link 2') }}</label>
                                <input type="text" class="form-control" placeholder="www.your_project_2.com">
                            </div>
                        </div>

                        <div class="col-md-12">
                        <div class="mb-3 mb-0">
                            <label class="form-label">{{ __('Description') }}</label>
                            <textarea rows="5" class="form-control" placeholder="Here can be your description" value="Mike"></textarea>
                        </div>
                        </div>
                    </div>

                    <div class="d-grid gap-2 col-4 mx-auto">
                        <button class="btn btn-primary" type="button">Button</button>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    {{-- Content / End --}}
@endsection

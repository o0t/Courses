@extends('layouts.Teacher')
@section('title',__('View section'))
@section('active.content.home','active')
@section('content')


    {{-- content --}}
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <div class="page-title">
                  {{ __('Section content') }}
                  <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                      <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-report">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                        {{ __('Upload content') }}
                      </a>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-cards">
              <div class="col-12">
                <div class="card">
                  <div class="table-responsive">
                    <table class="table table-vcenter card-table table-striped">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Title</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th class="w-1"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Maryjo Lebarree</td>
                          <td class="text-secondary">
                            Civil Engineer, Product Management
                          </td>
                          <td class="text-secondary"><a href="#" class="text-reset">mlebarree5@unc.edu</a></td>
                          <td class="text-secondary">
                            User
                          </td>
                          <td>
                            <a href="#">Edit</a>
                          </td>
                        </tr>
                        <tr>
                          <td>Egan Poetz</td>
                          <td class="text-secondary">
                            Research Nurse, Engineering
                          </td>
                          <td class="text-secondary"><a href="#" class="text-reset">epoetz6@free.fr</a></td>
                          <td class="text-secondary">
                            Admin
                          </td>
                          <td>
                            <a href="#">Edit</a>
                          </td>
                        </tr>
                        <tr>
                          <td>Kellie Skingley</td>
                          <td class="text-secondary">
                            Teacher, Services
                          </td>
                          <td class="text-secondary"><a href="#" class="text-reset">kskingley7@columbia.edu</a></td>
                          <td class="text-secondary">
                            User
                          </td>
                          <td>
                            <a href="#">Edit</a>
                          </td>
                        </tr>
                        <tr>
                          <td>Christabel Charlwood</td>
                          <td class="text-secondary">
                            Tax Accountant, Engineering
                          </td>
                          <td class="text-secondary"><a href="#" class="text-reset">ccharlwood8@nifty.com</a></td>
                          <td class="text-secondary">
                            Owner
                          </td>
                          <td>
                            <a href="#">Edit</a>
                          </td>
                        </tr>
                        <tr>
                          <td>Haskel Shelper</td>
                          <td class="text-secondary">
                            Staff Scientist, Legal
                          </td>
                          <td class="text-secondary"><a href="#" class="text-reset">hshelper9@woothemes.com</a></td>
                          <td class="text-secondary">
                            Admin
                          </td>
                          <td>
                            <a href="#">Edit</a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    {{-- Model --}}
        <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">{{ __('Create a Course') }}</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('teacher.course.section.create.file',$Section->id) }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">{{ __('title') }}</label>
                            <input type="text" class="form-control" value="{{ old('title') }}" name="title" placeholder="{{ __('The name of your course') }}">
                            <div class="form-text">{{ __('The name will be visible only to you') }}</div>
                            @error('title')
                                <div class="form-text text-danger">{{ $errors->first('title') }}</div>
                            @enderror
                        </div>


                        <div class="row">
                            <div class="mb-3">
                                <input type="file" name="file" class="form-control">
                                <div class="form-text">{{ __('Allowed to upload: text file, PDF file, video') }}</div>
                                @error('file')
                                    <div class="form-text text-danger">{{ $errors->first('file') }}</div>
                                @enderror
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
    {{-- content / End --}}

@endsection

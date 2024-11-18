@extends('layouts.app')
@section('title', __('Report'))
@section('content')


     {{-- Content --}}
     <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title text-light">
                  {{ __('Account Settings') }}
                </h2>
              </div>
              <div class="col-auto ms-auto d-print-none">
                @if (app()->getLocale() == 'en')
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                        {{ __('New report') }}
                    </a>
                @elseif (app()->getLocale() == 'ar')
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                        {{ __('New report') }}

                    </a>
                @endif

              </div>
            </div>
          </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="card">
              <div class="row g-0">


                <div class="col-12 col-md-3 border-end">
                    <div class="card-body">
                      <h4 class="subheader"> {{ __('Settings') }} </h4>
                      <div class="list-group list-group-transparent">
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center active">{{ __('My Account') }}</a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">My Notifications</a>
                        {{-- <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">Connected Apps</a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">Plans</a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">Billing &amp; Invoices</a> --}}
                      </div>
                    </div>
                </div>



                <div class="col-12 col-md-9 d-flex flex-column">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                        <div class="card-body">

                            <br>
                            <table class="table table-vcenter card-table border">
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
                                    <td>Paweł Kuna</td>
                                    <td class="text-secondary">
                                      UI Designer, Training
                                    </td>
                                    <td class="text-secondary"><a href="#" class="text-reset">paweluna@howstuffworks.com</a></td>
                                    <td class="text-secondary">
                                      User
                                    </td>
                                    <td>
                                      <a href="#">Edit</a>
                                    </td>
                                  </tr>


                                  <tr>
                                    <td>Jeffie Lewzey</td>
                                    <td class="text-secondary">
                                      Chemical Engineer, Support
                                    </td>
                                    <td class="text-secondary"><a href="#" class="text-reset">jlewzey1@seesaa.net</a></td>
                                    <td class="text-secondary">
                                      Admin
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-cyan btn-icon">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="M16 2H8C4.691 2 2 4.691 2 8v12a1 1 0 0 0 1 1h13c3.309 0 6-2.691 6-6V8c0-3.309-2.691-6-6-6zm4 13c0 2.206-1.794 4-4 4H4V8c0-2.206 1.794-4 4-4h8c2.206 0 4 1.794 4 4v7z"></path></svg>
                                        </a>
                                    </td>
                                  </tr>

                                </tbody>
                            </table>


                            <br>
                        </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    {{-- Content / End --}}


    <div class="modal modal-blur fade" id="modal-report" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">New report</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="example-text-input" placeholder="Your report name">
              </div>
              <label class="form-label">Report type</label>
              <div class="form-selectgroup-boxes row mb-3">
                <div class="col-lg-6">
                  <label class="form-selectgroup-item">
                    <input type="radio" name="report-type" value="1" class="form-selectgroup-input" checked="">
                    <span class="form-selectgroup-label d-flex align-items-center p-3">
                      <span class="me-3">
                        <span class="form-selectgroup-check"></span>
                      </span>
                      <span class="form-selectgroup-label-content">
                        <span class="form-selectgroup-title strong mb-1">Simple</span>
                        <span class="d-block text-secondary">Provide only basic data needed for the report</span>
                      </span>
                    </span>
                  </label>
                </div>
                <div class="col-lg-6">
                  <label class="form-selectgroup-item">
                    <input type="radio" name="report-type" value="1" class="form-selectgroup-input">
                    <span class="form-selectgroup-label d-flex align-items-center p-3">
                      <span class="me-3">
                        <span class="form-selectgroup-check"></span>
                      </span>
                      <span class="form-selectgroup-label-content">
                        <span class="form-selectgroup-title strong mb-1">Advanced</span>
                        <span class="d-block text-secondary">Insert charts and additional advanced analyses to be inserted in the report</span>
                      </span>
                    </span>
                  </label>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-8">
                  <div class="mb-3">
                    <label class="form-label">Report url</label>
                    <div class="input-group input-group-flat">
                      <span class="input-group-text">
                        https://tabler.io/reports/
                      </span>
                      <input type="text" class="form-control ps-0" value="report-01" autocomplete="off">
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="mb-3">
                    <label class="form-label">Visibility</label>
                    <select class="form-select">
                      <option value="1" selected="">Private</option>
                      <option value="2">Public</option>
                      <option value="3">Hidden</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Client name</label>
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Reporting period</label>
                    <input type="date" class="form-control">
                  </div>
                </div>
                <div class="col-lg-12">
                  <div>
                    <label class="form-label">Additional information</label>
                    <textarea class="form-control" rows="3"></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                Cancel
              </a>
              <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                Create new report
              </a>
            </div>
          </div>
        </div>
      </div>

@endsection

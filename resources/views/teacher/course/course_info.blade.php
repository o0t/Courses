@extends('layouts.app')
@section('title',__('Course details'))
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

                            {{-- content --}}
                            <div class="page-wrapper">
                                <div class="page-body">
                                    <div class="container-xl">
                                        <div class="row row-deck row-cards">
                                            <div class="col-sm-6 col-lg-3">
                                            <div class="card">
                                                <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="subheader">Sales</div>
                                                    <div class="ms-auto lh-1">
                                                    <div class="dropdown">
                                                        <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item active" href="#">Last 7 days</a>
                                                        <a class="dropdown-item" href="#">Last 30 days</a>
                                                        <a class="dropdown-item" href="#">Last 3 months</a>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="h1 mb-3">75%</div>
                                                <div class="d-flex mb-2">
                                                    <div>Conversion rate</div>
                                                    <div class="ms-auto">
                                                    <span class="text-green d-inline-flex align-items-center lh-1">
                                                        7% <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 17l6 -6l4 4l8 -8" /><path d="M14 7l7 0l0 7" /></svg>
                                                    </span>
                                                    </div>
                                                </div>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-primary" style="width: 75%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" aria-label="75% Complete">
                                                    <span class="visually-hidden">75% Complete</span>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-sm-6 col-lg-3">
                                            <div class="card">
                                                <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="subheader">Revenue</div>
                                                    <div class="ms-auto lh-1">
                                                    <div class="dropdown">
                                                        <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item active" href="#">Last 7 days</a>
                                                        <a class="dropdown-item" href="#">Last 30 days</a>
                                                        <a class="dropdown-item" href="#">Last 3 months</a>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-baseline">
                                                    <div class="h1 mb-0 me-2">$4,300</div>
                                                    <div class="me-auto">
                                                    <span class="text-green d-inline-flex align-items-center lh-1">
                                                        8% <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 17l6 -6l4 4l8 -8" /><path d="M14 7l7 0l0 7" /></svg>
                                                    </span>
                                                    </div>
                                                </div>
                                                </div>
                                                <div id="chart-revenue-bg" class="chart-sm"></div>
                                            </div>
                                            </div>
                                            <div class="col-sm-6 col-lg-3">
                                            <div class="card">
                                                <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="subheader">New clients</div>
                                                    <div class="ms-auto lh-1">
                                                    <div class="dropdown">
                                                        <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item active" href="#">Last 7 days</a>
                                                        <a class="dropdown-item" href="#">Last 30 days</a>
                                                        <a class="dropdown-item" href="#">Last 3 months</a>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-baseline">
                                                    <div class="h1 mb-3 me-2">6,782</div>
                                                    <div class="me-auto">
                                                    <span class="text-yellow d-inline-flex align-items-center lh-1">
                                                        0% <!-- Download SVG icon from http://tabler-icons.io/i/minus -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0" /></svg>
                                                    </span>
                                                    </div>
                                                </div>
                                                <div id="chart-new-clients" class="chart-sm"></div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-sm-6 col-lg-3">
                                            <div class="card">
                                                <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="subheader">Active users</div>
                                                    <div class="ms-auto lh-1">
                                                    <div class="dropdown">
                                                        <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item active" href="#">Last 7 days</a>
                                                        <a class="dropdown-item" href="#">Last 30 days</a>
                                                        <a class="dropdown-item" href="#">Last 3 months</a>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-baseline">
                                                    <div class="h1 mb-3 me-2">2,986</div>
                                                    <div class="me-auto">
                                                    <span class="text-green d-inline-flex align-items-center lh-1">
                                                        4% <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 17l6 -6l4 4l8 -8" /><path d="M14 7l7 0l0 7" /></svg>
                                                    </span>
                                                    </div>
                                                </div>
                                                <div id="chart-active-users" class="chart-sm"></div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-12">
                                            <div class="row row-cards">
                                                <div class="col-sm-6 col-lg-3">
                                                <div class="card card-sm">
                                                    <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                        <span class="bg-primary text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" /><path d="M12 3v3m0 12v3" /></svg>
                                                        </span>
                                                        </div>
                                                        <div class="col">
                                                        <div class="font-weight-medium">
                                                            132 Sales
                                                        </div>
                                                        <div class="text-muted">
                                                            12 waiting payments
                                                        </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col-sm-6 col-lg-3">
                                                <div class="card card-sm">
                                                    <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                        <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 17h-11v-14h-2" /><path d="M6 5l14 1l-1 7h-13" /></svg>
                                                        </span>
                                                        </div>
                                                        <div class="col">
                                                        <div class="font-weight-medium">
                                                            78 Orders
                                                        </div>
                                                        <div class="text-muted">
                                                            32 shipped
                                                        </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col-sm-6 col-lg-3">
                                                <div class="card card-sm">
                                                    <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                        <span class="bg-twitter text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c0 -.249 1.51 -2.772 1.818 -4.013z" /></svg>
                                                        </span>
                                                        </div>
                                                        <div class="col">
                                                        <div class="font-weight-medium">
                                                            623 Shares
                                                        </div>
                                                        <div class="text-muted">
                                                            16 today
                                                        </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col-sm-6 col-lg-3">
                                                <div class="card card-sm">
                                                    <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                        <span class="bg-facebook text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" /></svg>
                                                        </span>
                                                        </div>
                                                        <div class="col">
                                                        <div class="font-weight-medium">
                                                            132 Likes
                                                        </div>
                                                        <div class="text-muted">
                                                            21 today
                                                        </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            </div>



                                            <div class="col-12">
                                            <div class="card card-md">
                                                <div class="card-stamp card-stamp-lg">
                                                <div class="card-stamp-icon bg-primary">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/ghost -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 11a7 7 0 0 1 14 0v7a1.78 1.78 0 0 1 -3.1 1.4a1.65 1.65 0 0 0 -2.6 0a1.65 1.65 0 0 1 -2.6 0a1.65 1.65 0 0 0 -2.6 0a1.78 1.78 0 0 1 -3.1 -1.4v-7" /><path d="M10 10l.01 0" /><path d="M14 10l.01 0" /><path d="M10 14a3.5 3.5 0 0 0 4 0" /></svg>
                                                </div>
                                                </div>
                                                <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-10">
                                                    <h3 class="h1">Tabler Icons</h3>
                                                    <div class="markdown text-muted">
                                                        All icons come from the Tabler Icons set and are MIT-licensed. Visit
                                                        <a href="https://tabler-icons.io" target="_blank" rel="noopener">tabler-icons.io</a>,
                                                        download any of the 4158 icons in SVG, PNG or&nbsp;React and use them in your favourite design tools.
                                                    </div>
                                                    <div class="mt-3">
                                                        <a href="https://tabler-icons.io" class="btn btn-primary" target="_blank" rel="noopener">Download icons</a>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            {{-- content / End --}}
            </div>
    </div>
    {{-- content / End --}}





@endsection

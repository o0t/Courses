@extends('layouts.Teacher')
@section('title','Course details')
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
                <div class="card">
                    <div class="card-body d-flex justify-content-center">
                    <div class="btn-list">
                        <a href="{{ route('teacher.course.sections',$CourseDetails->url) }}" class="btn">
                        {{ __('Course sections') }}
                        </a>
                        <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#modal-large">
                        {{ __('Course settings') }}
                        </a>
                        <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#modal-small">
                        {{ __('Content display settings') }}
                        </a>
                        <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#modal-full-width">
                        {{ __('Pricing') }}
                        </a>
                        <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#modal-scrollable">
                        {{ __('Student interaction') }}
                        </a>
                        <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#modal-report">
                        {{ __('Publishing') }}
                        </a>
                    </div>
                    </div>
                </div>


                {{-- Cont --}}

                    <h1>here Advanc info for Course </h1>
                {{-- Cont / End --}}


            </div>
    </div>
    {{-- content / End --}}





@endsection

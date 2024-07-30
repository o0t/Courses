@extends('layouts.app')
@section('title',__($Categories->name))
@section('content')

        <div class="container text-light mt-6">
            <h1 style="text-align: center">
                {{ __($Categories->name) }}
            </h1>
            <div class="hr-text">

            </div>
        </div>


        <br><br><br>



        {{-- Cards --}}
        <div class="page-wrapper">
            <!-- Page header -->

            <!-- Page body -->
            @if ($Courses->isEmpty())
                <h1 class="text-center"> is Empty </h1>
            @else
                <div class="page-header d-print-none">
                    <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <!-- Page title actions -->
                        <div class="col-auto ms-auto d-print-none">
                        <ul class="nav nav-bordered mb-4">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">{{ __('Latest') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">{{ __('Oldest') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">{{ __('Top Rated') }}</a>
                            </li>
                        </ul>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="page-body">
                    <div class="container-xl">
                    <div class="row row-cards">

                        @foreach ($Courses as $category)
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <div class="card-header" style="display: block;text-align: center">
                                        <div>{{ $category->title }}</div>
                                    </div>
                                <a href="{{ route('course.view',$category->name) }}" class="d-block"><img src="https://assets.codegrip.tech/wp-content/uploads/2019/10/04113325/1_Y07KF-_laqG2cJ1Squ0Bag.png" class="card-img-top"></a>
                                <div class="card-body">
                                    <div class="d-flex align-items-center">

                                    <div>
                                        <div>
                                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(140, 150, 161, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path><path d="M13 7h-2v5.414l3.293 3.293 1.414-1.414L13 11.586z"></path></svg>
                                            <span class="text-secondary">{{ $category->count_time_videos }}</span>

                                        </div>
                                        <div class="text-secondary">
                                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(140, 150, 161, 1);transform: ;msFilter:;"><path d="M4 8H2v12a2 2 0 0 0 2 2h12v-2H4z"></path><path d="M20 2H8a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zm-9 12V6l7 4z"></path></svg>
                                            <span> {{ $category->count_lessons }} </span>
                                        </div>
                                    </div>
                                    <div class="ms-auto">
                                        <a class="text-secondary">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path></svg>
                                        {{ $category->views }}
                                        </a>
                                        <a class="ms-3 text-secondary">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"></path></svg>
                                        {{ $category->likes }}
                                        </a>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <br><br><br>
                    <div class="d-flex">
                        <ul class="pagination ms-auto">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                            <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 6l-6 6l6 6"></path></svg>
                            prev
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                            next <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 6l6 6l-6 6"></path></svg>
                            </a>
                        </li>
                        </ul>
                    </div>
                    </div>
                </div>
            @endif

          </div>
        {{-- Cards /End --}}

        </div>

        <br><br>
@endsection

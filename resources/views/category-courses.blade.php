@extends('layouts.app')
@section('title',__($category))
@section('content')

        <div class="container text-light mt-6">
            <h1 style="text-align: center">
                {{ __($category) }}
            </h1>
            <div class="hr-text">

            </div>
        </div>



        {{-- Cards --}}
        <div class="page-wrapper">
            <!-- Page header -->

            <!-- Page body -->
            @if ($Courses->isEmpty())
            <br>
                <h1 class="text-center"> is Empty </h1>
            @else
                <div class="page-header d-print-none">
                    <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <!-- Page title actions -->
                        <div class="col-auto ms-auto d-print-none">
                        <ul class="nav nav-bordered mb-4">
                            <li class="nav-item">
                                <a class="nav-link {{ $status == 'latest' ? 'active' : '' }}" href="{{ route('category.courses.latest', $category) }}">
                                    {{ __('Latest') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $status == 'oldest' ? 'active' : '' }}" href="{{ route('category.courses.oldest', $category) }}">
                                    {{ __('Oldest') }}
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="#">{{ __('Top Rated') }}</a>
                            </li> --}}
                        </ul>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="page-body">
                    <div class="container-xl">
                    <div class="row row-cards">

                        @foreach ($Courses as $Course)

                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <div class="card-header" style="display: block;text-align: center">
                                        <div><strong>{{ $Course->title }}</strong></div>
                                    </div>
                                <a href="{{ route('course.view',$Course->title) }}" class="d-block">
                                    <img src="{{ asset($Course->photo) }}" height="300" class="card-img-top"></a>
                                    <br>
                                    <div class="text-secondary ms-2">
                                        <strong> {{ __('Created by') }} : </strong> {{ $Course->user->first_name .' '. $Course->user->last_name }}
                                    </div>
                                <div class="card-body">
                                        <div class="d-flex align-items-center">
                                                <div class="text-secondary">
                                                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(140, 150, 161, 1);transform: ;msFilter:;"><path d="M4 8H2v12a2 2 0 0 0 2 2h12v-2H4z"></path><path d="M20 2H8a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zm-9 12V6l7 4z"></path></svg>
                                                    <span> {{ $Course->count_lessons }} </span>
                                                </div>

                                                <div class="text-secondary ms-2">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path></svg>
                                                    {{ $Course->views }}
                                                </div>
                                                <a href="#" class="ms-3 text-secondary">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"></path></svg>
                                                    {{ $Course->likes }}
                                                </a>
                                        <div>
                                    </div>
                                    <div class="ms-auto">
                                        <div>
                                            <span> {{ $Course->created_at->diffForHumans() }} </span>
                                        </div>
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
                            {{ $Courses->links('vendor.pagination.bootstrap-4') }}
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

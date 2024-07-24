@extends('layouts.app')
@section('title',__('Home'))
@section('content')

        <div class="container text-light mt-6">
            <h1 style="text-align: center">
                {{ __($Main_category->name) }}
            </h1>
            <div class="hr-text">

            </div>
        </div>


        <br><br><br>


        {{-- Cards --}}
        <br><br>
        <div class="container col-12 ">
            <div class="card">
            <div class="card-body">
                <br>
                <div class="row row-cards">
                    @foreach ($category as $category)
                        <div class="col-sm-6 col-lg-3" >
                            <a href="{{ route('category',$category->name) }}" class="link-offset-2 link-underline link-underline-opacity-0">
                                <div class="card card-link-pop">
                                    <img src="{{ asset('images/categories/'.$category->img) }}" width="180" height="200" class="rounded mx-auto d-block" alt="{{ __($category->name) }}">
                                    <div class="card-footer" style="text-align: center">
                                        <span class="h3">{{ __($category->name) }}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            </div>
        </div>

        {{-- Cards /End --}}


    </div>

    <br><br>

@endsection

@extends('layouts.app')
@section('title', __('Report'))
@section('content')

    {{-- Content  --}}
    <pre>



    </pre>
    <div class="container-xl">
        <div class="row row-cards">
          <div class="col-lg-12">
            <div class="card card-lg">
              <div class="card-body">
                    <div class="row g-5">
                        <div class="col-xl-3"></div>

                            <div class="col-xl-6">
                                <div class="col-sm-12">
                                    <label class="form-label">{{ __('Title') }}</label>
                                    <input type="text" class="form-control" name="example-text-input" placeholder="..">
                                </div>

                                <br>
                                <div class="col-sm-12">
                                    <label class="form-label">{{ __('Email') }}</label>
                                    <input type="text" class="form-control" name="example-text-input" placeholder="..">
                                </div>

                                <br>

                                <div class="col-sm-12">
                                  <label class="form-label">About Me</label>
                                  <textarea rows="5" class="form-control" placeholder="Here can be your description" value="Mike"></textarea>
                                </div>

                                <br>
                                    <div class="mb-3">
                                        <div class="form-label">Custom File Input</div>
                                        <input type="file" class="form-control">
                                    </div>
                                <br>
                                <a href="#" class="btn btn-primary w-100">
                                    Primary
                                </a>

                            </div>

                        <div class="col-xl-3"></div>
                    </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    {{-- Content / End --}}
@endsection

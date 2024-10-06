@extends('layouts.app')
@section('title', __('Article Details'))
@section('link.articles','active')
@section('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- Content  --}}
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title text-light">
                    {{ $Article->name }}
                </h2>
              </div>
            </div>
          </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="row justify-content-center">
              <div class="col-lg-10 col-xl-9">
                <div class="card card-lg">
                  <div class="card-body markdown">
                    <div id="loading" class="card-body py-5 text-center">
                        <div>
                          <div class="avatar avatar-rounded avatar-lg placeholder mb-3"></div>
                        </div>
                        <div class="mt w-75 mx-auto">
                          <div class="placeholder col-9 mb-3"></div>
                          <div class="placeholder placeholder-xs col-10"></div>
                        </div>
                    </div>
                    <div id="response"></div>
                    <br>
                    <h1 id="whos-that-then">{{ $Article->title }}</h1>
                    <div>
                        {{ $Article->article }}
                    </div>
                  </div>
                  <div class="card-footer">
                    {{ $Article->created_at->diffForHumans() }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    {{-- Content / End --}}



    <script>
        $(document).ready(function() {
            const ImageName = '{{ $Article->image }}';
            const url = '{{ route('articles.images', ['name' => '__name__']) }}'.replace('__name__', encodeURIComponent(ImageName));
            const loadingMessage = $('#loading');
            loadingMessage.show();

            $.get(url, function(data) {
                loadingMessage.hide();
                if (data.status === 'success') {
                    $('#response').html(`
                        <img src="data:${data.mime_type};base64,${data.file_content}" class="card-img-top">
                    `);
                } else {
                    $('#response').html(`<p>${data.message}</p>`);
                }
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                loadingMessage.hide();
                $('#response').html('<p>Error fetching image: ' + errorThrown + '</p>');
            });
        });
    </script>
@endsection

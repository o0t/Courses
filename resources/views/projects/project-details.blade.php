@extends('layouts.app')
@section('title', __('Project details'))
@section('link.projects','active')
@section('content')

    {{-- Content  --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title text-light">
                    {{ $Project->name }}
                </h2>
              </div>
            </div>
          </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                    <a href="{{ route('course.view',$Course->name) }}">{{ $Course->name }}</a>
                </h3>
              </div>
              <br>
              <div class="d-flex justify-content-center">
                  {{-- Images --}}
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{ __('Project images') }}</h3>
                            </div>
                            <div class="card-body">
                                <div id="carousel-indicators-thumb" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                    <div class="carousel-indicators" id="carousel-indicators"></div>
                                    <div class="carousel-inner" id="carousel-inner"></div>
                                </div>
                                <div id="loading" style="display: none;">
                                    <div class="row row-cards">
                                        <div class="col-12">
                                            <div class="card placeholder-glow">
                                                <div class="ratio ratio-21x9 card-img-top placeholder"></div>
                                                <div class="card-body">
                                                    <div class="placeholder col-9 mb-3"></div>
                                                    <div class="placeholder placeholder-xs col-10"></div>
                                                    <div class="placeholder placeholder-xs col-11"></div>
                                                    <div class="mt-3">
                                                        <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-4" aria-hidden="true"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <style>
                        .carousel-inner img {
                            height: 400px; /* Set your desired height */
                            object-fit: cover; /* Crop the image to cover the area */
                            width: 100%; /* Ensure it takes full width */
                        }
                    </style>

                    <script>
                        $(document).ready(function() {
                            const images = [
                                '{{ $Project->image1 }}',
                                '{{ $Project->image2 }}',
                                '{{ $Project->image3 }}',
                                '{{ $Project->image4 }}'
                            ].filter(image => image); // Filter out empty images

                            $('#loading').show();

                            if (images.length === 0) {
                                $('#loading').hide();
                                $('#carousel-indicators').html('<p>No images available.</p>');
                                return;
                            }

                            let promises = images.map((image, index) => {
                                const url = '{{ route('projects.images', ['name' => '__name__']) }}'.replace('__name__', encodeURIComponent(image));

                                return $.get(url).then(data => {
                                    if (data.status === 'success') {
                                        return {
                                            indicator: `<button type="button" data-bs-target="#carousel-indicators-thumb" data-bs-slide-to="${index}" class="ratio ratio-4x3 ${index === 0 ? 'active' : ''}" style="background-image: url(data:${data.mime_type};base64,${data.file_content});"></button>`,
                                            item: `<div class="carousel-item ${index === 0 ? 'active' : ''}">
                                                    <img class="d-block w-100" alt="Image ${index + 1}" src="data:${data.mime_type};base64,${data.file_content}">
                                                </div>`
                                        };
                                    } else {
                                        return {
                                            indicator: `<button type="button" class="ratio ratio-4x3" disabled>${data.message}</button>`,
                                            item: `<div class="carousel-item">
                                                    <p>${data.message}</p>
                                                </div>`
                                        };
                                    }
                                }).fail(() => {
                                    return {
                                        indicator: `<button type="button" class="ratio ratio-4x3" disabled>Error</button>`,
                                        item: `<div class="carousel-item">
                                                <p>Error fetching image.</p>
                                            </div>`
                                    };
                                });
                            });

                            // Execute all promises and update the carousel
                            Promise.all(promises).then(results => {
                                $('#loading').hide();

                                // Populate carousel indicators and items
                                const indicatorsHtml = results.map(result => result.indicator).join('');
                                const itemsHtml = results.map(result => result.item).join('');

                                $('#carousel-indicators').html(indicatorsHtml);
                                $('#carousel-inner').html(itemsHtml);
                            });
                        });
                    </script>

                    {{-- Images / End --}}
              </div>
              <br>

              <div class="card-body">
                    <div class="card-body markdown">
                       {{ $Project->description }}
                    </div>
              </div>
                <div class="card-footer text-muted">
                    <a href="{{ $Project->link1 ?? '#' }}">
                        {!! $Project->link1 ? '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" style="fill: rgba(145, 156, 170, 1);"><path d="M8.465 11.293c1.133-1.133 3.109-1.133 4.242 0l.707.707 1.414-1.414-.707-.707c-.943-.944-2.199-1.465-3.535-1.465s-2.592.521-3.535 1.465L4.929 12a5.008 5.008 0 0 0 0 7.071 4.983 4.983 0 0 0 3.535 1.462A4.982 4.982 0 0 0 12 19.071l.707-.707-1.414-1.414-.707.707a3.007 3.007 0 0 1-4.243 0 3.005 3.005 0 0 1 0-4.243l2.122-2.121z"></path><path d="m12 4.929-.707.707 1.414 1.414.707-.707a3.007 3.007 0 0 1 4.243 0 3.005 3.005 0 0 1 0 4.243l-2.122 2.121c-1.133 1.133-3.109 1.133-4.242 0L10.586 12l-1.414 1.414.707.707c.943.944 2.199 1.465 3.535 1.465s2.592-.521 3.535-1.465L19.071 12a5.008 5.008 0 0 0 0-7.071 5.006 5.006 0 0 0-7.071 0z"></path></svg>' : '' !!}
                        {{ $Project->link1 ?? ' ' }}
                    </a>
                    <br>
                    <a href="{{ $Project->link2 ?? '#' }}">
                        {!! $Project->link2 ? '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" style="fill: rgba(145, 156, 170, 1);"><path d="M8.465 11.293c1.133-1.133 3.109-1.133 4.242 0l.707.707 1.414-1.414-.707-.707c-.943-.944-2.199-1.465-3.535-1.465s-2.592.521-3.535 1.465L4.929 12a5.008 5.008 0 0 0 0 7.071 4.983 4.983 0 0 0 3.535 1.462A4.982 4.982 0 0 0 12 19.071l.707-.707-1.414-1.414-.707.707a3.007 3.007 0 0 1-4.243 0 3.005 3.005 0 0 1 0-4.243l2.122-2.121z"></path><path d="m12 4.929-.707.707 1.414 1.414.707-.707a3.007 3.007 0 0 1 4.243 0 3.005 3.005 0 0 1 0 4.243l-2.122 2.121c-1.133 1.133-3.109 1.133-4.242 0L10.586 12l-1.414 1.414.707.707c.943.944 2.199 1.465 3.535 1.465s2.592-.521 3.535-1.465L19.071 12a5.008 5.008 0 0 0 0-7.071 5.006 5.006 0 0 0-7.071 0z"></path></svg>' : '' !!}
                        {{ $Project->link2 ?? ' ' }}
                    </a>
                    <br>
                    {{ $Project->created_at->diffForHumans() }}
                </div>
            </div>
          </div>
        </div>
      </div>
    {{-- Content / End --}}
@endsection

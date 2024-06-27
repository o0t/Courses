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
                  {{ __('Section content') }} /  <div class="text-secondary"> {{ ' ' . $section->name }}</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-cards">


            @if ($contents == NULL)
                <h1>NUll</h1>
            @else
                {{-- Video --}}
                @if ($contents->videos->isEmpty())

                    <div class="hr-text">
                        <i class='bx bxs-videos '  style='color:#dadfe5;font-size: 25px' ></i>
                    </div>
                    <div class="col-12">
                            <div class="card card-md">
                            <div class="card-body">
                                <div class="row align-items-center">
                                <div class="col">
                                    <h2 class="h3">{{ __('Video content') }}</h2>
                                    <div class="markdown text-secondary">
                                        {{ __("You don't have a video, you can upload a video now and upload it to your own course") }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-video">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="M11 8H9v3H6v2h3v3h2v-3h3v-2h-3z"></path><path d="M18 7c0-1.103-.897-2-2-2H4c-1.103 0-2 .897-2 2v10c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-3.333L22 17V7l-4 3.333V7zm-1.999 10H4V7h12v5l.001 5z"></path></svg>
                                        {{ __('Upload a video') }}
                                    </a>
                                </div>
                                </div>
                            </div>
                            </div>
                    </div>
                    <div class="hr-text">
                        <i class='bx bxs-videos '  style='color:#dadfe5;font-size: 25px' ></i>
                    </div>
                @else

                        <div class="hr-text">
                            <i class='bx bxs-videos '  style='color:#dadfe5;font-size: 25px' ></i>
                        </div>

                        <div class="col-12">
                                <div class="card card-md">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                    <div class="col">
                                        <h2 class="h3">{{ __('Video content') }}</h2>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-video">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="M11 8H9v3H6v2h3v3h2v-3h3v-2h-3z"></path><path d="M18 7c0-1.103-.897-2-2-2H4c-1.103 0-2 .897-2 2v10c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-3.333L22 17V7l-4 3.333V7zm-1.999 10H4V7h12v5l.001 5z"></path></svg>
                                            {{ __('Upload a video') }}
                                        </a>
                                    </div>
                                    </div>
                                </div>
                                </div>
                        </div>





                            <div class="col-12">
                                <div class="card">
                                <div class="table-responsive">
                                    <table class="table table-vcenter table-mobile-md card-table">
                                    <thead>
                                        <tr>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('By the user') }}</th>
                                        <th>{{ __('Views') }}</th>
                                        <th>{{ __('Likes') }}</th>
                                        <th>{{ __('Comments') }}</th>
                                        <th>{{ __('Favorite') }}</th>
                                        <th>{{ __('Video duration') }}</th>
                                        <th>{{ __('Uploaded on') }}</th>
                                        <th>{{ __('Publication status') }}</th>
                                        <th>{{ __('Special for') }}</th>


                                        <th class="w-1"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contents->videos as $video)
                                            <tr>
                                                <td data-label="Name">
                                                    <div class="d-flex py-1 align-items-center">
                                                    <span class="avatar me-2" style="background-image: url({{ asset('course_img/video.png') }})"></span>
                                                    <div class="flex-fill">
                                                        <div class="font-weight-medium">{{ $video->video_name }}</div>

                                                    </div>
                                                    </div>
                                                </td>

                                                <td class="text-secondary" data-label="Role">
                                                    --
                                                </td>
                                                <td class="text-secondary" data-label="Role">
                                                    {{ $video->views }}
                                                </td>
                                                <td class="text-secondary" data-label="Role">
                                                    {{ $video->likes }}
                                                </td>
                                                <td class="text-secondary" data-label="Role">
                                                    {{ $video->comments }}
                                                </td>
                                                <td class="text-secondary" data-label="Role">
                                                    {{ $video->favorite }}
                                                </td>
                                                <td class="text-secondary" data-label="Role">
                                                    {{ $video->time }}
                                                </td>
                                                <td data-label="Title">
                                                    <div>{{ $video->created_at->diffForHumans() }}</div>
                                                </td>
                                                <td class="text-secondary" data-label="Role">
                                                    @if ($video->status == 'waiting')
                                                        <span class="badge bg-yellow text-yellow-fg">{{ __('waiting') }}</span>
                                                    @elseif ($video->status == 'private')
                                                        <span class="badge bg-azure text-azure-fg" >{{ __('private') }}</span>
                                                    @elseif ($video->status == 'general')
                                                        <span class="badge bg-teal text-teal-fg" >{{ __('general') }}</span>
                                                    @elseif ($video->status == 'customized')
                                                        <span class="badge bg-orange text-orange-fg" >{{ __('customized') }}</span>
                                                    @elseif ($video->status == 'closed')
                                                        <span class="badge bg-red text-red-fg" >{{ __('closed') }}</span>
                                                    @endif
                                                </td>
                                                <td class="text-secondary" data-label="Role">
                                                    @if ($video->shearing_guests == 'general')
                                                        <span class="badge bg-teal text-teal-fg" >{{ __('For everyone') }}</span>
                                                    @elseif ($video->shearing_guests == 'private')
                                                        <span class="badge bg-azure text-azure-fg" >{{ __('For subscribers') }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="btn-list flex-nowrap">
                                                    <a href="#" class="btn ">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M20 3H4c-1.103 0-2 .897-2 2v10c0 1.103.897 2 2 2h7v3H8v2h8v-2h-3v-3h7c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zM4 15V5h16l.001 10H4z"></path><path d="m10 13 5-3-5-3z"></path></svg>
                                                    </a>
                                                    <a href="#" class="btn btn-danger">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z"></path><path d="M9 10h2v8H9zm4 0h2v8h-2z"></path></svg>
                                                    </a>
                                                    </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>


                        <div class="hr-text">
                            <i class='bx bxs-videos'  style='color:#dadfe5;font-size: 25px' ></i>
                        </div>
                @endif
                {{-- Video / End --}}


                {{-- txt --}}
                @if ($contents->txt->isEmpty())

                    <div class="hr-text">
                        <i class='bx bxs-file-txt' style='color:#dadfe5;font-size: 25px' ></i>
                    </div>

                    <div class="col-12">
                            <div class="card card-md">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h2 class="h3">{{ __('Textual content') }}</h2>
                                            <div class="markdown text-secondary">
                                                {{ __("You don't have a published text, you can create a text file now and upload it in your own course") }}
                                            </div>
                                        </div>

                                        <div class="col-auto">
                                            <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-txt">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(218, 223, 229, 1);transform: ;msFilter:;"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zM9.998 14.768H8.895v3.274h-.917v-3.274H6.893V14h3.105v.768zm2.725 3.274-.365-.731c-.15-.282-.246-.492-.359-.726h-.013c-.083.233-.185.443-.312.726l-.335.731h-1.045l1.171-2.045L10.336 14h1.05l.354.738c.121.245.21.443.306.671h.013c.096-.258.174-.438.276-.671l.341-.738h1.043l-1.139 1.973 1.198 2.069h-1.055zm4.384-3.274h-1.104v3.274h-.917v-3.274h-1.085V14h3.105v.768zM14 9h-1V4l5 5h-4z"></path></svg>
                                                {{ __('Upload text') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="hr-text">
                        <i class='bx bxs-file-txt' style='color:#dadfe5;font-size: 25px' ></i>
                    </div>
                @else

                        <div class="hr-text">
                            <i class='bx bxs-file-txt' style='color:#dadfe5;font-size: 25px' ></i>
                        </div>

                        <div class="col-12">
                                <div class="card card-md">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                    <div class="col">
                                        <h2 class="h3">{{ __('Textual content') }}</h2>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-txt">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(218, 223, 229, 1);transform: ;msFilter:;"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zM9.998 14.768H8.895v3.274h-.917v-3.274H6.893V14h3.105v.768zm2.725 3.274-.365-.731c-.15-.282-.246-.492-.359-.726h-.013c-.083.233-.185.443-.312.726l-.335.731h-1.045l1.171-2.045L10.336 14h1.05l.354.738c.121.245.21.443.306.671h.013c.096-.258.174-.438.276-.671l.341-.738h1.043l-1.139 1.973 1.198 2.069h-1.055zm4.384-3.274h-1.104v3.274h-.917v-3.274h-1.085V14h3.105v.768zM14 9h-1V4l5 5h-4z"></path></svg>
                                            {{ __('Upload text') }}
                                        </a>
                                    </div>
                                    </div>
                                </div>
                                </div>
                        </div>





                            <div class="col-12">
                                <div class="card">
                                <div class="table-responsive">
                                    <table class="table table-vcenter table-mobile-md card-table">
                                    <thead>
                                        <tr>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('By the user') }}</th>
                                        <th>{{ __('Views') }}</th>
                                        <th>{{ __('Likes') }}</th>
                                        <th>{{ __('Comments') }}</th>
                                        <th>{{ __('Favorite') }}</th>
                                        <th>{{ __('Uploaded on') }}</th>
                                        <th>{{ __('Publication status') }}</th>
                                        <th>{{ __('Special for') }}</th>

                                        <th class="w-1"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contents->txt as $txt)
                                            <tr>
                                                <td data-label="Name">
                                                    <div class="d-flex py-1 align-items-center">
                                                    <span class="avatar me-2" style="background-image: url({{ asset('course_img/txt.png') }})"></span>
                                                    <div class="flex-fill">
                                                        <div class="font-weight-medium">{{ $txt->name }}</div>

                                                    </div>
                                                    </div>
                                                </td>
                                                <td class="text-secondary" data-label="Role">
                                                    --
                                                </td>
                                                <td class="text-secondary" data-label="Role">
                                                    {{ $txt->views }}
                                                </td>
                                                <td class="text-secondary" data-label="Role">
                                                    {{ $txt->likes }}
                                                </td>
                                                <td class="text-secondary" data-label="Role">
                                                    {{ $txt->comments }}
                                                </td>
                                                <td class="text-secondary" data-label="Role">
                                                    {{ $txt->favorite }}
                                                </td>
                                                <td data-label="Title">
                                                    <div>{{ $txt->created_at->diffForHumans() }}</div>
                                                </td>
                                                <td class="text-secondary" data-label="Role">
                                                    @if ($txt->status == 'waiting')
                                                        <span class="badge bg-yellow text-yellow-fg">{{ __('waiting') }}</span>
                                                    @elseif ($txt->status == 'private')
                                                        <span class="badge bg-azure text-azure-fg" >{{ __('private') }}</span>
                                                    @elseif ($txt->status == 'general')
                                                        <span class="badge bg-teal text-teal-fg" >{{ __('general') }}</span>
                                                    @elseif ($txt->status == 'customized')
                                                        <span class="badge bg-orange text-orange-fg" >{{ __('customized') }}</span>
                                                    @elseif ($txt->status == 'closed')
                                                        <span class="badge bg-red text-red-fg" >{{ __('closed') }}</span>
                                                    @endif
                                                </td>
                                                <td class="text-secondary" data-label="Role">
                                                    @if ($txt->shearing_guests == 'general')
                                                        <span class="badge bg-teal text-teal-fg" >{{ __('For everyone') }}</span>
                                                    @elseif ($txt->shearing_guests == 'private')
                                                        <span class="badge bg-azure text-azure-fg" >{{ __('For subscribers') }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="btn-list flex-nowrap">
                                                    <a href="#" class="btn ">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M2.165 19.551c.186.28.499.449.835.449h15c.4 0 .762-.238.919-.606l3-7A.998.998 0 0 0 21 11h-1V7c0-1.103-.897-2-2-2h-6.1L9.616 3.213A.997.997 0 0 0 9 3H4c-1.103 0-2 .897-2 2v14h.007a1 1 0 0 0 .158.551zM17.341 18H4.517l2.143-5h12.824l-2.143 5zM18 7v4H6c-.4 0-.762.238-.919.606L4 14.129V7h14z"></path></svg>
                                                    </a>
                                                    <a href="#" class="btn btn-danger">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z"></path><path d="M9 10h2v8H9zm4 0h2v8h-2z"></path></svg>
                                                    </a>
                                                    </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>


                    <div class="hr-text">
                        <i class='bx bxs-file-txt' style='color:#dadfe5;font-size: 25px' ></i>
                    </div>
                @endif
                {{-- txt / End --}}



                {{-- pdf --}}
                @if ($contents->pdf->isEmpty())

                    <div class="hr-text">
                        <i class='bx bxs-file-pdf' style='color:#dadfe5;font-size: 25px'  ></i>
                    </div>

                    <div class="col-12">
                            <div class="card card-md">
                            <div class="card-body">
                                <div class="row align-items-center">
                                <div class="col">
                                    <h2 class="h3">{{ __('PDF content') }}</h2>
                                    <div class="markdown text-secondary">
                                        {{ __("You don't have a PDF, you can upload the PDF now and upload it to your own course") }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-pdf">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(218, 223, 229, 1);transform: ;msFilter:;"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zM9.998 14.768H8.895v3.274h-.917v-3.274H6.893V14h3.105v.768zm2.725 3.274-.365-.731c-.15-.282-.246-.492-.359-.726h-.013c-.083.233-.185.443-.312.726l-.335.731h-1.045l1.171-2.045L10.336 14h1.05l.354.738c.121.245.21.443.306.671h.013c.096-.258.174-.438.276-.671l.341-.738h1.043l-1.139 1.973 1.198 2.069h-1.055zm4.384-3.274h-1.104v3.274h-.917v-3.274h-1.085V14h3.105v.768zM14 9h-1V4l5 5h-4z"></path></svg>
                                        {{ __('Upload PDF') }}
                                    </a>
                                </div>
                                </div>
                            </div>
                            </div>
                    </div>
                    <div class="hr-text">
                        <i class='bx bxs-file-pdf' style='color:#dadfe5;font-size: 25px'  ></i>
                    </div>
                @else

                    <div class="hr-text">
                        <i class='bx bxs-file-pdf' style='color:#dadfe5;font-size: 25px'  ></i>
                    </div>

                        <div class="col-12">
                                <div class="card card-md">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                    <div class="col">
                                        <h2 class="h3">{{ __('PDF content') }}</h2>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-pdf">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(218, 223, 229, 1);transform: ;msFilter:;"><path d="M8.267 14.68c-.184 0-.308.018-.372.036v1.178c.076.018.171.023.302.023.479 0 .774-.242.774-.651 0-.366-.254-.586-.704-.586zm3.487.012c-.2 0-.33.018-.407.036v2.61c.077.018.201.018.313.018.817.006 1.349-.444 1.349-1.396.006-.83-.479-1.268-1.255-1.268z"></path><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zM9.498 16.19c-.309.29-.765.42-1.296.42a2.23 2.23 0 0 1-.308-.018v1.426H7v-3.936A7.558 7.558 0 0 1 8.219 14c.557 0 .953.106 1.22.319.254.202.426.533.426.923-.001.392-.131.723-.367.948zm3.807 1.355c-.42.349-1.059.515-1.84.515-.468 0-.799-.03-1.024-.06v-3.917A7.947 7.947 0 0 1 11.66 14c.757 0 1.249.136 1.633.426.415.308.675.799.675 1.504 0 .763-.279 1.29-.663 1.615zM17 14.77h-1.532v.911H16.9v.734h-1.432v1.604h-.906V14.03H17v.74zM14 9h-1V4l5 5h-4z"></path></svg>
                                            {{ __('Upload PDF') }}
                                        </a>
                                    </div>
                                    </div>
                                </div>
                                </div>
                        </div>





                            <div class="col-12">
                                <div class="card">
                                <div class="table-responsive">
                                    <table class="table table-vcenter table-mobile-md card-table">
                                    <thead>
                                        <tr>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('By the user') }}</th>
                                        <th>{{ __('Views') }}</th>
                                        <th>{{ __('Likes') }}</th>
                                        <th>{{ __('Comments') }}</th>
                                        <th>{{ __('Favorite') }}</th>
                                        <th>{{ __('Uploaded on') }}</th>
                                        <th>{{ __('Publication status') }}</th>
                                        <th>{{ __('Special for') }}</th>

                                        <th class="w-1"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contents->pdf as $pdf)
                                            <tr>
                                                <td data-label="Name">
                                                    <div class="d-flex py-1 align-items-center">
                                                    <span class="avatar me-2" style="background-image: url({{ asset('course_img/pdf-file.png') }})"></span>
                                                    <div class="flex-fill">
                                                        <div class="font-weight-medium">{{ $pdf->name }}</div>

                                                    </div>
                                                    </div>
                                                </td>
                                                <td class="text-secondary" data-label="Role">
                                                    --
                                                </td>
                                                <td class="text-secondary" data-label="Role">
                                                    {{ $pdf->views }}
                                                </td>
                                                <td class="text-secondary" data-label="Role">
                                                    {{ $pdf->likes }}
                                                </td>
                                                <td class="text-secondary" data-label="Role">
                                                    {{ $pdf->comments }}
                                                </td>
                                                <td class="text-secondary" data-label="Role">
                                                    {{ $pdf->favorite }}
                                                </td>
                                                <td data-label="Title">
                                                    <div>{{ $pdf->created_at->diffForHumans() }}</div>
                                                </td>
                                                <td class="text-secondary" data-label="Role">
                                                    @if ($pdf->status == 'waiting')
                                                        <span class="badge bg-yellow text-yellow-fg">{{ __('waiting') }}</span>
                                                    @elseif ($pdf->status == 'private')
                                                        <span class="badge bg-azure text-azure-fg" >{{ __('private') }}</span>
                                                    @elseif ($pdf->status == 'general')
                                                        <span class="badge bg-teal text-teal-fg" >{{ __('general') }}</span>
                                                    @elseif ($pdf->status == 'customized')
                                                        <span class="badge bg-orange text-orange-fg" >{{ __('customized') }}</span>
                                                    @elseif ($pdf->status == 'closed')
                                                        <span class="badge bg-red text-red-fg" >{{ __('closed') }}</span>
                                                    @endif
                                                </td>
                                                <td class="text-secondary" data-label="Role">
                                                    @if ($pdf->shearing_guests == 'general')
                                                        <span class="badge bg-teal text-teal-fg" >{{ __('For everyone') }}</span>
                                                    @elseif ($pdf->shearing_guests == 'private')
                                                        <span class="badge bg-azure text-azure-fg" >{{ __('For subscribers') }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="btn-list flex-nowrap">
                                                    <a href="#" class="btn ">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M2.165 19.551c.186.28.499.449.835.449h15c.4 0 .762-.238.919-.606l3-7A.998.998 0 0 0 21 11h-1V7c0-1.103-.897-2-2-2h-6.1L9.616 3.213A.997.997 0 0 0 9 3H4c-1.103 0-2 .897-2 2v14h.007a1 1 0 0 0 .158.551zM17.341 18H4.517l2.143-5h12.824l-2.143 5zM18 7v4H6c-.4 0-.762.238-.919.606L4 14.129V7h14z"></path></svg>
                                                    </a>
                                                    <a href="#" class="btn btn-danger">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z"></path><path d="M9 10h2v8H9zm4 0h2v8h-2z"></path></svg>
                                                    </a>
                                                    </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>


                            <div class="hr-text">
                                <i class='bx bxs-file-pdf' style='color:#dadfe5;font-size: 25px'  ></i>
                            </div>
                @endif
                {{-- pdf / End --}}




                {{-- tests --}}
                @if ($contents->test->isEmpty())

                    <div class="hr-text">
                        <i class='bx bx-book-open' style='color:#dadfe5;font-size: 25px'></i>
                    </div>

                    <div class="col-12">
                            <div class="card card-md">
                            <div class="card-body">
                                <div class="row align-items-center">
                                <div class="col">
                                    <h2 class="h3">{{ __('Test content') }}</h2>
                                    <div class="markdown text-secondary">
                                        {{ __("You don't have quizzes, you can create a quiz now and upload it to your own course") }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-report">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(218, 223, 229, 1);transform: ;msFilter:;"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zM9.998 14.768H8.895v3.274h-.917v-3.274H6.893V14h3.105v.768zm2.725 3.274-.365-.731c-.15-.282-.246-.492-.359-.726h-.013c-.083.233-.185.443-.312.726l-.335.731h-1.045l1.171-2.045L10.336 14h1.05l.354.738c.121.245.21.443.306.671h.013c.096-.258.174-.438.276-.671l.341-.738h1.043l-1.139 1.973 1.198 2.069h-1.055zm4.384-3.274h-1.104v3.274h-.917v-3.274h-1.085V14h3.105v.768zM14 9h-1V4l5 5h-4z"></path></svg>
                                        {{ __('Create a test') }}
                                    </a>
                                </div>
                                </div>
                            </div>
                            </div>
                    </div>
                    <div class="hr-text">
                        <i class='bx bx-book-open' style='color:#dadfe5;font-size: 25px'></i>
                    </div>
                @else

                    <div class="hr-text">

                        <i class='bx bx-book-open' style='color:#dadfe5;font-size: 25px'></i>
                    </div>

                        <div class="col-12">
                                <div class="card card-md">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                    <div class="col">
                                        <h2 class="h3">{{ __('Test content') }}</h2>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-report">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(218, 223, 229, 1);transform: ;msFilter:;"><path d="M8.267 14.68c-.184 0-.308.018-.372.036v1.178c.076.018.171.023.302.023.479 0 .774-.242.774-.651 0-.366-.254-.586-.704-.586zm3.487.012c-.2 0-.33.018-.407.036v2.61c.077.018.201.018.313.018.817.006 1.349-.444 1.349-1.396.006-.83-.479-1.268-1.255-1.268z"></path><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zM9.498 16.19c-.309.29-.765.42-1.296.42a2.23 2.23 0 0 1-.308-.018v1.426H7v-3.936A7.558 7.558 0 0 1 8.219 14c.557 0 .953.106 1.22.319.254.202.426.533.426.923-.001.392-.131.723-.367.948zm3.807 1.355c-.42.349-1.059.515-1.84.515-.468 0-.799-.03-1.024-.06v-3.917A7.947 7.947 0 0 1 11.66 14c.757 0 1.249.136 1.633.426.415.308.675.799.675 1.504 0 .763-.279 1.29-.663 1.615zM17 14.77h-1.532v.911H16.9v.734h-1.432v1.604h-.906V14.03H17v.74zM14 9h-1V4l5 5h-4z"></path></svg>
                                            {{ __('Create a test') }}
                                        </a>
                                    </div>
                                    </div>
                                </div>
                                </div>
                        </div>





                            <div class="col-12">
                                <div class="card">
                                <div class="table-responsive">
                                    <table class="table table-vcenter table-mobile-md card-table">
                                    <thead>
                                        <tr>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('By the user') }}</th>

                                        <th>{{ __('full mark') }}</th>
                                        <th>{{ __('degree success') }}</th>
                                        <th>{{ __('number of questions') }}</th>

                                        <th>{{ __('Uploaded on') }}</th>
                                        <th>{{ __('Publication status') }}</th>
                                        <th>{{ __('Special for') }}</th>

                                        <th class="w-1"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contents->test as $test)
                                            <tr>
                                                <td data-label="Name">
                                                    <div class="d-flex py-1 align-items-center">
                                                    <span class="avatar me-2" style="background-image: url({{ asset('course_img/test.png') }})"></span>
                                                    <div class="flex-fill">
                                                        <div class="font-weight-medium">{{ $test->test_name }}</div>

                                                    </div>
                                                    </div>
                                                </td>
                                                <td class="text-secondary" data-label="Role">
                                                    --
                                                </td>
                                                <td class="text-secondary" data-label="Role">
                                                    {{ $test->full_mark }}
                                                </td>
                                                <td class="text-secondary" data-label="Role">
                                                    {{ $test->degree_success }}
                                                </td>
                                                <td class="text-secondary" data-label="Role">
                                                    {{ $test->number_of_questions }}
                                                </td>
                                                <td data-label="Title">
                                                    <div>{{ $test->created_at->diffForHumans() }}</div>
                                                </td>
                                                <td class="text-secondary" data-label="Role">
                                                    @if ($test->status == 'waiting')
                                                        <span class="badge bg-yellow text-yellow-fg">{{ __('waiting') }}</span>
                                                    @elseif ($test->status == 'private')
                                                        <span class="badge bg-azure text-azure-fg" >{{ __('private') }}</span>
                                                    @elseif ($test->status == 'general')
                                                        <span class="badge bg-teal text-teal-fg" >{{ __('general') }}</span>
                                                    @elseif ($test->status == 'customized')
                                                        <span class="badge bg-orange text-orange-fg" >{{ __('customized') }}</span>
                                                    @elseif ($test->status == 'closed')
                                                        <span class="badge bg-red text-red-fg" >{{ __('closed') }}</span>
                                                    @endif
                                                </td>
                                                <td class="text-secondary" data-label="Role">
                                                    @if ($test->shearing_guests == 'general')
                                                        <span class="badge bg-teal text-teal-fg" >{{ __('For everyone') }}</span>
                                                    @elseif ($test->shearing_guests == 'private')
                                                        <span class="badge bg-azure text-azure-fg" >{{ __('For subscribers') }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="btn-list flex-nowrap">
                                                    <a href="#" class="btn ">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M2.165 19.551c.186.28.499.449.835.449h15c.4 0 .762-.238.919-.606l3-7A.998.998 0 0 0 21 11h-1V7c0-1.103-.897-2-2-2h-6.1L9.616 3.213A.997.997 0 0 0 9 3H4c-1.103 0-2 .897-2 2v14h.007a1 1 0 0 0 .158.551zM17.341 18H4.517l2.143-5h12.824l-2.143 5zM18 7v4H6c-.4 0-.762.238-.919.606L4 14.129V7h14z"></path></svg>
                                                    </a>
                                                    <a href="#" class="btn btn-danger">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z"></path><path d="M9 10h2v8H9zm4 0h2v8h-2z"></path></svg>
                                                    </a>
                                                    </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>


                            <div class="hr-text">
                                <i class='bx bx-book-open' style='color:#dadfe5;font-size: 25px'></i>
                            </div>
                @endif
                {{-- tests / End --}}

            @endif

            </div>
          </div>
        </div>
      </div>

             {{--  video Model --}}
             <div class="modal modal-blur fade" id="modal-video" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title">{{ __('Upload a video') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('teacher.course.section.Upload.video', ['section_id' => $section->id, 'content_id' => $contents->id] )}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">{{ __('Video Title') }} </label>
                                    <input type="text" class="form-control" value="{{ old('title-video') }}" name="title-video" placeholder="{{ __('Type a title name for your video') }}">
                                    {{-- <div class="form-text">{{ __('The name will be visible only to you') }}</div> --}}
                                    @error('title-video')
                                        <div class="form-text text-danger">{{ $errors->first('title-video') }}</div>
                                    @enderror
                                </div>


                                <div class="row">
                                    <div class="mb-3">
                                        <input type="file" name="file-video" class="form-control">
                                        <div class="form-text">{{ __('Allowed to upload') }} mp4,mov</div>
                                        @error('file-video')
                                            <div class="form-text text-danger">{{ $errors->first('file-video') }}</div>
                                        @enderror
                                    </div>
                                </div>



                                <div class="mb-3">
                                    <div class="form-label">{{ __('Publication status') }}</div>
                                    <select class="form-select" name="publication_status">
                                      <option value="private">{{ __('private') }}</option>
                                      <option value="general">{{ __('general') }}</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <div class="form-label"> {{ __('Special for') }} </div>
                                    <select class="form-select" name="special_for">
                                      <option value="private">{{ __('For subscribers') }}</option>
                                      <option value="general">{{ __('For everyone') }}</option>
                                    </select>
                                </div>



                                <br>
                                 <textarea id="tinymce-default" name="description"></textarea>
                                    @error('description')
                                        <div class="form-text text-danger">{{ $errors->first('description') }}</div>
                                    @enderror

                                  <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                      let options = {
                                        selector: '#tinymce-default',
                                        height: 300,
                                        menubar: false,
                                        statusbar: false,
                                        plugins: [
                                          'advlist autolink lists link image charmap print preview anchor',
                                          'searchreplace visualblocks code fullscreen',
                                          'insertdatetime media table paste code help wordcount'
                                        ],
                                        toolbar: 'undo redo | formatselect | ' +
                                          'bold italic backcolor | alignleft aligncenter ' +
                                          'alignright alignjustify | bullist numlist outdent indent | ' +
                                          'removeformat',
                                        content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; -webkit-font-smoothing: antialiased; }'
                                      }
                                      if (localStorage.getItem("tablerTheme") === 'dark') {
                                        options.skin = 'oxide-dark';
                                        options.content_css = 'dark';
                                      }
                                      tinyMCE.init(options);
                                    })
                                  </script>



                                <br>
                                <div class="mb-3">
                                    <div class="divide-y">
                                      <div>
                                        <label class="row">
                                          <span class="col">{{ __('Allow comments') }}</span>
                                          <span class="col-auto">
                                            <label class="form-check form-check-single form-switch">
                                              <input class="form-check-input" name="allow_comments" value="allow" type="checkbox" checked="">
                                            </label>
                                          </span>
                                        </label>
                                      </div>
                                    </div>
                                </div>

                                <br>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                        {{ __('Upload a video') }}
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
        {{-- video Model  / End --}}





        {{-- txt Model --}}
            <div class="modal modal-blur fade" id="modal-txt" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title">{{ __('Upload text') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('teacher.course.section.Upload.txt',['section_id' => $section->id, 'content_id' => $contents->id]) }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">{{ __('Text Title') }}</label>
                                    <input type="text" class="form-control" value="{{ old('title-txt') }}" name="title-txt" placeholder="{{ __('Type a title name for your text') }}">
                                    {{-- <div class="form-text">{{ __('The name will be visible only to you') }}</div> --}}
                                    @error('title-txt')
                                        <div class="form-text text-danger">{{ $errors->first('title-txt') }}</div>
                                    @enderror
                                </div>


                                <br>



                                <textarea id="tinymce-default" name="txt"></textarea>


                                  <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                      let options = {
                                        selector: '#tinymce-default',
                                        height: 300,
                                        menubar: false,
                                        statusbar: false,
                                        plugins: [
                                          'advlist autolink lists link image charmap print preview anchor',
                                          'searchreplace visualblocks code fullscreen',
                                          'insertdatetime media table paste code help wordcount'
                                        ],
                                        toolbar: 'undo redo | formatselect | ' +
                                          'bold italic backcolor | alignleft aligncenter ' +
                                          'alignright alignjustify | bullist numlist outdent indent | ' +
                                          'removeformat',
                                        content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; -webkit-font-smoothing: antialiased; }'
                                      }
                                      if (localStorage.getItem("tablerTheme") === 'dark') {
                                        options.skin = 'oxide-dark';
                                        options.content_css = 'dark';
                                      }
                                      tinyMCE.init(options);
                                    })
                                  </script>
                                    @error('txt')
                                        <div class="form-text text-danger">{{ $errors->first('txt') }}</div>
                                    @enderror


                                <br>
                                <div class="mb-3">
                                    <div class="form-label">{{ __('Publication status') }}</div>
                                    <select class="form-select" name="publication_status">
                                    <option value="private">{{ __('private') }}</option>
                                    <option value="general">{{ __('general') }}</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <div class="form-label"> {{ __('Special for') }} </div>
                                    <select class="form-select" name="special_for">
                                    <option value="private">{{ __('For subscribers') }}</option>
                                    <option value="general">{{ __('For everyone') }}</option>
                                    </select>
                                </div>



                                <br>
                                <div class="mb-3">
                                    <div class="divide-y">
                                      <div>
                                        <label class="row">
                                          <span class="col">{{ __('Allow comments') }}</span>
                                          <span class="col-auto">
                                            <label class="form-check form-check-single form-switch">
                                              <input class="form-check-input" name="allow_comments" type="checkbox" checked="">
                                            </label>
                                          </span>
                                        </label>
                                      </div>
                                    </div>
                                </div>

                                <br>



                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                        {{ __('Upload text') }}
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
        {{-- txt Model  / End --}}



        {{--  pdf Model --}}
            <div class="modal modal-blur fade" id="modal-pdf" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title">{{ __('Upload PDF') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('teacher.course.section.Upload.pdf',['section_id' => $section->id, 'content_id' => $contents->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">{{ __('Title') }}</label>
                                    <input type="text" class="form-control" value="{{ old('title-pdf') }}" name="title-pdf" placeholder="{{ __('Type a title name for your pdf') }}">
                                    {{-- <div class="form-text">{{ __('The name will be visible only to you') }}</div> --}}
                                    @error('title-pdf')
                                        <div class="form-text text-danger">{{ $errors->first('title-pdf') }}</div>
                                    @enderror
                                </div>


                                <div class="row">
                                    <div class="mb-3">
                                        <input type="file" name="file" class="form-control">
                                        <div class="form-text">{{ __('Allowed to upload') }} PDF,DOC,DOCX</div>
                                        @error('file')
                                            <div class="form-text text-danger">{{ $errors->first('file') }}</div>
                                        @enderror
                                    </div>
                                </div>




                                <div class="mb-3">
                                    <div class="form-label">{{ __('Publication status') }}</div>
                                    <select class="form-select" name="publication_status">
                                      <option value="private">{{ __('private') }}</option>
                                      <option value="general">{{ __('general') }}</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <div class="form-label"> {{ __('Special for') }} </div>
                                    <select class="form-select" name="special_for">
                                      <option value="private">{{ __('For subscribers') }}</option>
                                      <option value="general">{{ __('For everyone') }}</option>
                                    </select>
                                </div>


                                <br>
                                <div class="mb-3">
                                    <div class="divide-y">
                                      <div>
                                        <label class="row">
                                          <span class="col">{{ __('Allow comments') }}</span>
                                          <span class="col-auto">
                                            <label class="form-check form-check-single form-switch">
                                              <input class="form-check-input" name="allow_comments" type="checkbox" checked="">
                                            </label>
                                          </span>
                                        </label>
                                      </div>
                                    </div>
                                </div>

                                <br>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                        {{ __('Upload PDF') }}
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
        {{-- pdf Model  / End --}}


    {{-- content / End --}}

@endsection

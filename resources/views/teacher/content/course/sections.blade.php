@extends('layouts.Teacher')
@section('title',__('Course sections'))
@section('active.content.home','active')
@section('active.course.sections','active')
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
                                        <a href="{{ route('teacher.content.home') }}" class="btn btn-icon btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(236, 236, 236, 1);transform: ;msFilter:;"><path d="M21 11H6.414l5.293-5.293-1.414-1.414L2.586 12l7.707 7.707 1.414-1.414L6.414 13H21z"></path></svg>
                                        </a>
                                    @elseif (app()->getLocale() == 'ar')
                                        <a href="{{ route('teacher.content.home') }}" class="btn btn-icon btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(236, 236, 236, 1);transform: rotate(180deg);msFilter:progid:DXImageTransform.Microsoft.BasicImage(rotation=2);"><path d="M21 11H6.414l5.293-5.293-1.414-1.414L2.586 12l7.707 7.707 1.414-1.414L6.414 13H21z"></path></svg>
                                        </a>
                                    @endif
                                </div>
                        </div>
                    <!-- Page title actions -->
                        <div class="col-auto ms-auto d-print-none">
                                <div class="btn-list">
                                    <a href="#" class="btn btn-icon btn-primary">
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
                @include('teacher.content.course._nav-course')
            {{-- Nav / End --}}
            <br>
            <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="M19 11h-6V5h-2v6H5v2h6v6h2v-6h6z"></path></svg>
                {{ __('Create a section') }}

            </a>



            <br><br><br>

            {{-- Table --}}
            <div class="card">
                <div class="table-responsive">
                  <table class="table table-vcenter card-table table-hover">
                    <thead>
                      <tr>
                        <th>id</th>
                        <th>{{ __('Section Name') }}</th>
                        <th>{{ __('Number of videos') }}</th>
                        <th>{{ __('Number of text files') }}</th>
                        <th>{{ __('Number of PDF files') }}</th>
                        <th>{{ __('Number of tests') }}</th>
                        <th>{{ __('Date created') }}</th>
                        <th>{{ __('Updated on') }}</th>
                        <th class="w-1"></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($Sections as $Section)
                            <tr>
                                <td>{{ $Section->id }}</td>
                                <td>
                                    @if ($Section->name == null)
                                        {{ __('Follows the previous section') }}
                                    @else
                                        {{ $Section->name }}
                                    @endif
                                </td>
                                <td class="text-secondary">
                                    @if ($Section->videos == null)
                                        {{ __('No video has been uploaded') }}
                                    @else
                                        {{ $Section->videos }}
                                    @endif
                                </td>
                                <td class="text-secondary">
                                    @if ($Section->txt == null)
                                        {{ __('No text file was uploaded') }}
                                    @else
                                        {{ $Section->txt }}
                                    @endif
                                </td>
                                <td class="text-secondary">
                                    @if ($Section->pdf == null)
                                    {{ __('No PDF file was uploaded') }}
                                    @else
                                        {{ $Section->pdf }}
                                    @endif
                                </td>
                                <td class="text-secondary">
                                    @if ($Section->test == null)
                                    {{ __('No test has been uploaded') }}
                                    @else
                                        {{ $Section->test }}
                                    @endif


                                </td>
                                <td class="text-secondary">
                                    {{ $Section->created_at->diffForHumans() }}
                                </td>
                                <td class="text-secondary">
                                    @if ($Section->updated_at == null)
                                        --
                                    @else
                                        {{ $Section->updated_at->diffForHumans() }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('teacher.course.section.view',$Section->id) }}" class="btn btn-icon btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="M10.061 19.061 17.121 12l-7.06-7.061-2.122 2.122L12.879 12l-4.94 4.939z"></path></svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                  <br>
                  {{ $Sections->links('vendor.pagination.bootstrap-4') }}

                </div>
              </div>
            {{-- Table / End --}}





             {{-- Model --}}

    <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">{{ __('Create a section') }}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('teacher.course.sections.create',$Course->url) }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">{{ __('Section Name') }}</label>
                        <input type="text" class="form-control" value="{{ old('section-name') }}" name="section-name" placeholder="{{ __('The name of the content section') }}">
                        <div class="form-text">{{ __('When left blank, the name does not appear and belongs to the previous section') }}</div>
                        @error('section-name')
                            <div class="form-text text-danger">{{ $errors->first('section-name') }}</div>
                        @enderror
                    </div>



                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                            {{ __('Create a new section') }}
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
    {{-- Model / End --}}
    {{-- content / End --}}

@endsection

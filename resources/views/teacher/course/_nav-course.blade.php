{{-- Card --}}

<div class="card">
    <div class="card-body d-flex justify-content-center">
        <div class="btn-list">

            <a href="{{ route('teacher.course.info', $Course->url) }}" class="btn btn-6 btn-icon @yield('active.course.info')">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: #929dab;transform: ;msFilter:;">
                    <path d="M5 22h14a2 2 0 0 0 2-2v-9a1 1 0 0 0-.29-.71l-8-8a1 1 0 0 0-1.41 0l-8 8A1 1 0 0 0 3 11v9a2 2 0 0 0 2 2zm5-2v-5h4v5zm-5-8.59 7-7 7 7V20h-3v-5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v5H5z">
                    </path>
                </svg>
            </a>


            <a href="{{ route('teacher.course.contents.home',$Course->url) }}" class="btn @yield('active.course.contents')">
                {{ __('Course Content') }}
                </a>
            <a href="{{ route('teacher.course.settings',$Course->url) }}" class="btn @yield('active.course.settings')" >
            {{ __('Course settings') }}
            </a>
            <a href="{{ route('teacher.course.display',$Course->url) }}" class="btn @yield('active.course.display.sections')" >
            {{ __('Course display information') }}
            </a>
            <a href="#" class="btn @yield('active.course.student.interaction')" >
            {{ __('Student interaction') }}
            </a>
            <a href="#" class="btn @yield('active.course.publishing')" >
            {{ __('Publishing') }}
            </a>
        </div>
    </div>
</div>

{{-- Card / End --}}

{{-- Card --}}

<div class="card">
    <div class="card-body d-flex justify-content-center">
        <div class="btn-list">
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

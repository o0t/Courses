{{-- Card --}}

<div class="card">
    <div class="card-body d-flex justify-content-center">
        <div class="btn-list">
            <a href="{{ route('teacher.course.sections',$Course->url) }}" class="btn @yield('active.course.sections')">
                {{ __('Course sections') }}
                </a>
            <a href="{{ route('teacher.course.settings',$Course->url) }}" class="btn @yield('active.course.settings')" >
            {{ __('Course settings') }}
            </a>
            <a href="#" class="btn @yield('active.course.display.sections')" >
            {{ __('Content display settings') }}
            </a>
            <a href="#" class="btn @yield('active.course.pricing')" >
            {{ __('Pricing') }}
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

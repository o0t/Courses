<!doctype html>
@if (app()->getLocale() == 'ar')
    <html lang="ar" dir="rtl">
@elseif(app()->getLocale() == 'en')
    <html lang="en">
@endif
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
        <title>  {{ __('Raqeeb Courses') }} | @yield('title') </title>

        @if (app()->getLocale() == 'ar')
                <!-- CSS files -->
                <link href="{{ asset('assets/css/tabler.rtl.min.css?1684106062') }}" rel="stylesheet"/>
                <link href="{{ asset('assets/css/tabler-flags.rtl.min.css?1684106062') }}" rel="stylesheet"/>
                <link href="{{ asset('assets/css/tabler-payments.rtl.min.css?1684106062') }}" rel="stylesheet"/>
                <link href="{{ asset('assets/css/tabler-vendors.rtl.min.css?1684106062') }}" rel="stylesheet"/>
                <link href="{{ asset('assets/css/demo.rtl.min.css?1684106062') }}" rel="stylesheet"/>
        @elseif(app()->getLocale() == 'en')
                <!-- CSS files -->
                <link href="{{ asset('assets/css/tabler.min.css?1684106062') }}" rel="stylesheet"/>
                <link href="{{ asset('assets/css/tabler-flags.min.css?1684106062') }}" rel="stylesheet"/>
                <link href="{{ asset('assets/css/tabler-payments.min.css?1684106062') }}" rel="stylesheet"/>
                <link href="{{ asset('assets/css/tabler-vendors.min.css?1684106062') }}" rel="stylesheet"/>
                <link href="{{ asset('assets/css/demo.min.css?1684106062') }}" rel="stylesheet"/>
        @endif


    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
/*
      .navbar-overlap:after {
          content: "";
          height: 0rem;
          position: absolute;
          top: 100%;
          left: 0;
          right: 0;
          background: inherit;
          z-index: -1;
          box-shadow: inherit;
      } */

    </style>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
      </head>
<body>
    <script src="{{ asset('assets/js/demo-theme.min.js?1684106062')}}"></script>


    <div class="page">
        <!-- Navbar -->
        <header class="navbar navbar-expand-md navbar-overlap d-print-none" data-bs-theme="dark">
          <div class="container-xl">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
              <a href="{{ route('index') }}" class="nav-link">
                <img src="{{ asset('images/logo.png') }}" width="110" height="32" viewBox="0 0 232 68" class="navbar-brand-image">
                <span class="ms-2">
                    {{ __('Raqeeb') }}
                </span>
              </a>
            </div>
            @auth
                <div class="navbar-nav flex-row order-md-last">

                    <div class="me-3 mt-2 d-none d-md-block">
                        <div class="input-icon">
                          <input type="text" class="form-control" placeholder="{{ __('Search for the course') }}">
                          <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                              <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                              <path d="M21 21l-6 -6"></path>
                            </svg>
                          </span>
                        </div>
                    </div>
                    <div class="d-none d-md-flex">

                    <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Enable dark mode" data-bs-original-title="Enable dark mode">
                        <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"></path></svg>
                    </a>
                    <a href="?theme=light" class="nav-link px-0 hide-theme-light" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Enable light mode" data-bs-original-title="Enable light mode">
                        <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path><path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7"></path></svg>
                    </a>
                    <div class="nav-item dropdown d-none d-md-flex me-3">
                        <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
                        <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6"></path><path d="M9 17v1a3 3 0 0 0 6 0v-1"></path></svg>
                        <span class="badge bg-red"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                        <div class="card">
                            <div class="card-header">
                            <h3 class="card-title">Last updates</h3>
                            </div>
                            <div class="list-group list-group-flush list-group-hoverable">
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                <div class="col-auto"><span class="status-dot status-dot-animated bg-red d-block"></span></div>
                                <div class="col text-truncate">
                                    <a href="#" class="text-body d-block">Example 1</a>
                                    <div class="d-block text-secondary text-truncate mt-n1">
                                    Change deprecated html tags to text decoration classes (#29604)
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <a href="#" class="list-group-item-actions">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon text-muted"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path></svg>
                                    </a>
                                </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                <div class="col-auto"><span class="status-dot d-block"></span></div>
                                <div class="col text-truncate">
                                    <a href="#" class="text-body d-block">Example 2</a>
                                    <div class="d-block text-secondary text-truncate mt-n1">
                                    justify-content:between ⇒ justify-content:space-between (#29734)
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <a href="#" class="list-group-item-actions show">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon text-yellow"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path></svg>
                                    </a>
                                </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                <div class="col-auto"><span class="status-dot d-block"></span></div>
                                <div class="col text-truncate">
                                    <a href="#" class="text-body d-block">Example 3</a>
                                    <div class="d-block text-secondary text-truncate mt-n1">
                                    Update change-version.js (#29736)
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <a href="#" class="list-group-item-actions">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon text-muted"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path></svg>
                                    </a>
                                </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                <div class="col-auto"><span class="status-dot status-dot-animated bg-green d-block"></span></div>
                                <div class="col text-truncate">
                                    <a href="#" class="text-body d-block">Example 4</a>
                                    <div class="d-block text-secondary text-truncate mt-n1">
                                    Regenerate package-lock.json (#29730)
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <a href="#" class="list-group-item-actions">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon text-muted"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path></svg>
                                    </a>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                            <span class="avatar avatar-sm" style="background-image: url({{ asset('user_avatar/'.Auth::user()->avatar) }})"></span>
                            <div class="d-none d-xl-block ps-2">
                                <div>{{ Auth::user()->first_name .' '. Auth::user()->last_name }}</div>
                                <div class="mt-1 small text-muted">{{ Auth::user()->username }}</div>
                            </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a href="{{ route('account.settings') }}" class="dropdown-item">{{ __('Profile settings') }}</a>
                            <a href="{{ route('home') }}" class="dropdown-item">{{ __('Dashboard') }}</a>
                            <div class="dropdown-divider"></div>

                            @if (app()->getLocale() == 'ar')
                                <a href="{{ route('lan','en') }}" class="dropdown-item">EN</a>
                            @elseif(app()->getLocale() == 'en')
                                <a href="{{ route('lan','ar') }}" class="dropdown-item">AR</a>
                            @endif


                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            </div>
                        </div>
                </div>
            @else
                <div class="navbar-nav flex-row order-md-last">

                    <div class="me-3 mt-2 d-none d-md-block">
                        <div class="input-icon">
                          <input type="text" class="form-control" placeholder="{{ __('Search for the course') }}">
                          <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                              <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                              <path d="M21 21l-6 -6"></path>
                            </svg>
                          </span>
                        </div>
                    </div>
                    <div class="nav-item d-md-flex me-3">
                        <div class="btn-list">
                            <a href="{{ route('login') }}" class="btn"  rel="noreferrer">
                                {{ __('Sign in') }}
                            </a>
                            <a href="{{ route('register') }}" class="btn" rel="noreferrer">
                                {{ __('Register') }}
                            </a>
                        </div>
                    </div>
                    <div class="d-none d-md-flex">
                    <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Enable dark mode" data-bs-original-title="Enable dark mode">
                        <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"></path></svg>
                    </a>
                    <a href="?theme=light" class="nav-link px-0 hide-theme-light" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Enable light mode" data-bs-original-title="Enable light mode">
                        <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path><path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7"></path></svg>
                    </a>
                    @if (app()->getLocale() == 'ar')
                        <a href="{{ route('lan','en') }}" class="nav-link">
                    @elseif(app()->getLocale() == 'en')
                        <a href="{{ route('lan','ar') }}" class="nav-link">
                    @endif
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-translate" viewBox="0 0 16 16">
                            <path d="M4.545 6.714 4.11 8H3l1.862-5h1.284L8 8H6.833l-.435-1.286zm1.634-.736L5.5 3.956h-.049l-.679 2.022z"/>
                            <path d="M0 2a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v3h3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-3H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zm7.138 9.995q.289.451.63.846c-.748.575-1.673 1.001-2.768 1.292.178.217.451.635.555.867 1.125-.359 2.08-.844 2.886-1.494.777.665 1.739 1.165 2.93 1.472.133-.254.414-.673.629-.89-1.125-.253-2.057-.694-2.82-1.284.681-.747 1.222-1.651 1.621-2.757H14V8h-3v1.047h.765c-.318.844-.74 1.546-1.272 2.13a6 6 0 0 1-.415-.492 2 2 0 0 1-.94.31"/>
                        </svg>
                    </a>

                    {{-- <div class="nav-item dropdown d-none d-md-flex me-3">
                        <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
                        <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6"></path><path d="M9 17v1a3 3 0 0 0 6 0v-1"></path></svg>
                        <span class="badge bg-red"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                        <div class="card">
                            <div class="card-header">
                            <h3 class="card-title">Last updates</h3>
                            </div>
                            <div class="list-group list-group-flush list-group-hoverable">
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                <div class="col-auto"><span class="status-dot status-dot-animated bg-red d-block"></span></div>
                                <div class="col text-truncate">
                                    <a href="#" class="text-body d-block">Example 1</a>
                                    <div class="d-block text-secondary text-truncate mt-n1">
                                    Change deprecated html tags to text decoration classes (#29604)
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <a href="#" class="list-group-item-actions">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon text-muted"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path></svg>
                                    </a>
                                </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                <div class="col-auto"><span class="status-dot d-block"></span></div>
                                <div class="col text-truncate">
                                    <a href="#" class="text-body d-block">Example 2</a>
                                    <div class="d-block text-secondary text-truncate mt-n1">
                                    justify-content:between ⇒ justify-content:space-between (#29734)
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <a href="#" class="list-group-item-actions show">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon text-yellow"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path></svg>
                                    </a>
                                </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                <div class="col-auto"><span class="status-dot d-block"></span></div>
                                <div class="col text-truncate">
                                    <a href="#" class="text-body d-block">Example 3</a>
                                    <div class="d-block text-secondary text-truncate mt-n1">
                                    Update change-version.js (#29736)
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <a href="#" class="list-group-item-actions">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon text-muted"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path></svg>
                                    </a>
                                </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                <div class="col-auto"><span class="status-dot status-dot-animated bg-green d-block"></span></div>
                                <div class="col text-truncate">
                                    <a href="#" class="text-body d-block">Example 4</a>
                                    <div class="d-block text-secondary text-truncate mt-n1">
                                    Regenerate package-lock.json (#29730)
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <a href="#" class="list-group-item-actions">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon text-muted"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path></svg>
                                    </a>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div> --}}
                    </div>
                    {{-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                        <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"></span>
                        <div class="d-none d-xl-block ps-2">
                        <div>Paweł Kuna</div>
                        <div class="mt-1 small text-secondary">UI Designer</div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <a href="#" class="dropdown-item">Status</a>
                        <a href="./profile.html" class="dropdown-item">Profile</a>
                        <a href="#" class="dropdown-item">Feedback</a>
                        <div class="dropdown-divider"></div>
                        <a href="./settings.html" class="dropdown-item">Settings</a>
                        <a href="./sign-in.html" class="dropdown-item">Logout</a>
                    </div>
                    </div> --}}
                </div>
            @endauth

            <div class="collapse navbar-collapse" id="navbar-menu">
              <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
                <ul class="navbar-nav">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                      <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/layout-2 -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 4m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v1a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path><path d="M4 13m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path><path d="M14 4m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path><path d="M14 15m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v1a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path></svg>
                      </span>
                      <span class="nav-link-title">
                        {{ __('Categories') }}
                      </span>
                    </a>
                    <div class="dropdown-menu">
                      <div class="dropdown-menu-columns">
                        <div class="dropdown-menu-column">
                          @foreach ($categories as $category)
                            <a class="dropdown-item" href="{{ route('category',$category->name) }}">
                                {{ __($category->name) }}
                            </a>
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./icons.html">
                      <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/ghost -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 11a7 7 0 0 1 14 0v7a1.78 1.78 0 0 1 -3.1 1.4a1.65 1.65 0 0 0 -2.6 0a1.65 1.65 0 0 1 -2.6 0a1.65 1.65 0 0 0 -2.6 0a1.78 1.78 0 0 1 -3.1 -1.4v-7"></path><path d="M10 10l.01 0"></path><path d="M14 10l.01 0"></path><path d="M10 14a3.5 3.5 0 0 0 4 0"></path></svg>
                      </span>
                      <span class="nav-link-title">
                        {{ __('Projects') }}
                      </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./emails.html">
                      <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/mail-opened -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 9l9 6l9 -6l-9 -6l-9 6"></path><path d="M21 9v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10"></path><path d="M3 19l6 -6"></path><path d="M15 13l6 6"></path></svg>
                      </span>
                      <span class="nav-link-title">
                            {{ __('Articles') }}
                      </span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </header>



        @yield('content')



        <br>

        <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js?1684106062')}}" defer></script>
        <script src="{{ asset('assets/libs/jsvectormap/dist/js/jsvectormap.min.js?1684106062')}}" defer></script>
        <script src="{{ asset('assets/libs/jsvectormap/dist/maps/world.js?1684106062')}}" defer></script>
        <script src="{{ asset('assets/libs/jsvectormap/dist/maps/world-merc.js?1684106062')}}" defer></script>
        <!-- Tabler Core -->
        <script src="{{ asset('assets/js/tabler.min.js?1684106062')}}" defer></script>
        <script src="{{ asset('assets/js/demo.min.js?1684106062')}}" defer></script>

        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/libs/tinymce/tinymce.min.js" defer></script>

        @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])


          <script src="{{ asset('assets/libs/plyr/dist/plyr.min.js?1692870487')}}" defer></script>
          <!-- Tabler Core -->
          {{-- <script src="{{ asset('assets/js/tabler.min.js?1692870487')}}" defer></script> --}}
          <script src="{{ asset('assets/js/demo.min.js?1692870487')}}" defer></script>

    </body>
    </html>

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
        <title>  {{ __('Raqeeb Courses') }} | {{ __('home') }} </title>

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
              <a href=".">
                <svg xmlns="http://www.w3.org/2000/svg" width="110" height="32" viewBox="0 0 232 68" class="navbar-brand-image">
                  <path d="M64.6 16.2C63 9.9 58.1 5 51.8 3.4 40 1.5 28 1.5 16.2 3.4 9.9 5 5 9.9 3.4 16.2 1.5 28 1.5 40 3.4 51.8 5 58.1 9.9 63 16.2 64.6c11.8 1.9 23.8 1.9 35.6 0C58.1 63 63 58.1 64.6 51.8c1.9-11.8 1.9-23.8 0-35.6zM33.3 36.3c-2.8 4.4-6.6 8.2-11.1 11-1.5.9-3.3.9-4.8.1s-2.4-2.3-2.5-4c0-1.7.9-3.3 2.4-4.1 2.3-1.4 4.4-3.2 6.1-5.3-1.8-2.1-3.8-3.8-6.1-5.3-2.3-1.3-3-4.2-1.7-6.4s4.3-2.9 6.5-1.6c4.5 2.8 8.2 6.5 11.1 10.9 1 1.4 1 3.3.1 4.7zM49.2 46H37.8c-2.1 0-3.8-1-3.8-3s1.7-3 3.8-3h11.4c2.1 0 3.8 1 3.8 3s-1.7 3-3.8 3z" fill="#066fd1" style="fill: var(--tblr-primary, #066fd1)"></path>
                  <path d="M105.8 46.1c.4 0 .9.2 1.2.6s.6 1 .6 1.7c0 .9-.5 1.6-1.4 2.2s-2 .9-3.2.9c-2 0-3.7-.4-5-1.3s-2-2.6-2-5.4V31.6h-2.2c-.8 0-1.4-.3-1.9-.8s-.9-1.1-.9-1.9c0-.7.3-1.4.8-1.8s1.2-.7 1.9-.7h2.2v-3.1c0-.8.3-1.5.8-2.1s1.3-.8 2.1-.8 1.5.3 2 .8.8 1.3.8 2.1v3.1h3.4c.8 0 1.4.3 1.9.8s.8 1.2.8 1.9-.3 1.4-.8 1.8-1.2.7-1.9.7h-3.4v13c0 .7.2 1.2.5 1.5s.8.5 1.4.5c.3 0 .6-.1 1.1-.2.5-.2.8-.3 1.2-.3zm28-20.7c.8 0 1.5.3 2.1.8.5.5.8 1.2.8 2.1v20.3c0 .8-.3 1.5-.8 2.1-.5.6-1.2.8-2.1.8s-1.5-.3-2-.8-.8-1.2-.8-2.1c-.8.9-1.9 1.7-3.2 2.4-1.3.7-2.8 1-4.3 1-2.2 0-4.2-.6-6-1.7-1.8-1.1-3.2-2.7-4.2-4.7s-1.6-4.3-1.6-6.9c0-2.6.5-4.9 1.5-6.9s2.4-3.6 4.2-4.8c1.8-1.1 3.7-1.7 5.9-1.7 1.5 0 3 .3 4.3.8 1.3.6 2.5 1.3 3.4 2.1 0-.8.3-1.5.8-2.1.5-.5 1.2-.7 2-.7zm-9.7 21.3c2.1 0 3.8-.8 5.1-2.3s2-3.4 2-5.7-.7-4.2-2-5.8c-1.3-1.5-3-2.3-5.1-2.3-2 0-3.7.8-5 2.3-1.3 1.5-2 3.5-2 5.8s.6 4.2 1.9 5.7 3 2.3 5.1 2.3zm32.1-21.3c2.2 0 4.2.6 6 1.7 1.8 1.1 3.2 2.7 4.2 4.7s1.6 4.3 1.6 6.9-.5 4.9-1.5 6.9-2.4 3.6-4.2 4.8c-1.8 1.1-3.7 1.7-5.9 1.7-1.5 0-3-.3-4.3-.9s-2.5-1.4-3.4-2.3v.3c0 .8-.3 1.5-.8 2.1-.5.6-1.2.8-2.1.8s-1.5-.3-2.1-.8c-.5-.5-.8-1.2-.8-2.1V18.9c0-.8.3-1.5.8-2.1.5-.6 1.2-.8 2.1-.8s1.5.3 2.1.8c.5.6.8 1.3.8 2.1v10c.8-1 1.8-1.8 3.2-2.5 1.3-.7 2.8-1 4.3-1zm-.7 21.3c2 0 3.7-.8 5-2.3s2-3.5 2-5.8-.6-4.2-1.9-5.7-3-2.3-5.1-2.3-3.8.8-5.1 2.3-2 3.4-2 5.7.7 4.2 2 5.8c1.3 1.6 3 2.3 5.1 2.3zm23.6 1.9c0 .8-.3 1.5-.8 2.1s-1.3.8-2.1.8-1.5-.3-2-.8-.8-1.3-.8-2.1V18.9c0-.8.3-1.5.8-2.1s1.3-.8 2.1-.8 1.5.3 2 .8.8 1.3.8 2.1v29.7zm29.3-10.5c0 .8-.3 1.4-.9 1.9-.6.5-1.2.7-2 .7h-15.8c.4 1.9 1.3 3.4 2.6 4.4 1.4 1.1 2.9 1.6 4.7 1.6 1.3 0 2.3-.1 3.1-.4.7-.2 1.3-.5 1.8-.8.4-.3.7-.5.9-.6.6-.3 1.1-.4 1.6-.4.7 0 1.2.2 1.7.7s.7 1 .7 1.7c0 .9-.4 1.6-1.3 2.4-.9.7-2.1 1.4-3.6 1.9s-3 .8-4.6.8c-2.7 0-5-.6-7-1.7s-3.5-2.7-4.6-4.6-1.6-4.2-1.6-6.6c0-2.8.6-5.2 1.7-7.2s2.7-3.7 4.6-4.8 3.9-1.7 6-1.7 4.1.6 6 1.7 3.4 2.7 4.5 4.7c.9 1.9 1.5 4.1 1.5 6.3zm-12.2-7.5c-3.7 0-5.9 1.7-6.6 5.2h12.6v-.3c-.1-1.3-.8-2.5-2-3.5s-2.5-1.4-4-1.4zm30.3-5.2c1 0 1.8.3 2.4.8.7.5 1 1.2 1 1.9 0 1-.3 1.7-.8 2.2-.5.5-1.1.8-1.8.7-.5 0-1-.1-1.6-.3-.2-.1-.4-.1-.6-.2-.4-.1-.7-.1-1.1-.1-.8 0-1.6.3-2.4.8s-1.4 1.3-1.9 2.3-.7 2.3-.7 3.7v11.4c0 .8-.3 1.5-.8 2.1-.5.6-1.2.8-2.1.8s-1.5-.3-2.1-.8c-.5-.6-.8-1.3-.8-2.1V28.8c0-.8.3-1.5.8-2.1.5-.6 1.2-.8 2.1-.8s1.5.3 2.1.8c.5.6.8 1.3.8 2.1v.6c.7-1.3 1.8-2.3 3.2-3 1.3-.7 2.8-1 4.3-1z" fill-rule="evenodd" clip-rule="evenodd" fill="#4a4a4a"></path>
                </svg>
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
                  <li class="nav-item active dropdown">
                    <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                      <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/layout-2 -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 4m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v1a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path><path d="M4 13m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path><path d="M14 4m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path><path d="M14 15m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v1a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path></svg>
                      </span>
                      <span class="nav-link-title">
                        {{ __('Courses') }}
                      </span>
                    </a>
                    <div class="dropdown-menu">
                      <div class="dropdown-menu-columns">
                        <div class="dropdown-menu-column">
                          <a class="dropdown-item" href="./layout-horizontal.html">
                            Horizontal
                          </a>
                          <a class="dropdown-item" href="./layout-boxed.html">
                            Boxed
                            <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                          </a>
                          <a class="dropdown-item" href="./layout-vertical.html">
                            Vertical
                          </a>
                          <a class="dropdown-item" href="./layout-vertical-transparent.html">
                            Vertical transparent
                          </a>
                          <a class="dropdown-item" href="./layout-vertical-right.html">
                            Right vertical
                          </a>
                          <a class="dropdown-item" href="./layout-condensed.html">
                            Condensed
                          </a>
                          <a class="dropdown-item" href="./layout-combo.html">
                            Combined
                          </a>
                        </div>
                        <div class="dropdown-menu-column">
                          <a class="dropdown-item" href="./layout-navbar-dark.html">
                            Navbar dark
                          </a>
                          <a class="dropdown-item" href="./layout-navbar-sticky.html">
                            Navbar sticky
                          </a>
                          <a class="dropdown-item active" href="./layout-navbar-overlap.html">
                            Navbar overlap
                          </a>
                          <a class="dropdown-item" href="./layout-rtl.html">
                            RTL mode
                          </a>
                          <a class="dropdown-item" href="./layout-fluid.html">
                            Fluid
                          </a>
                          <a class="dropdown-item" href="./layout-fluid-vertical.html">
                            Fluid vertical
                          </a>
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



        <div class="container text-light mt-6">
            <h1 style="text-align: center">{{ __('what do you want to learn ?') }}</h1>
        </div>


        <br><br><br><br>
        <div class="container">
            <div class="col-12">
                <div class="row row-cards">
                  <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <img src="{{ asset('assets/img/webinar.png') }}" width="64" height="64"  alt="">
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                              132 {{ __('course') }}
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <img src="{{ asset('assets/img/people.png') }}" width="64" height="64"  alt="">
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                              78 {{ __('student') }}
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <img src="{{ asset('assets/img/montage.png') }}" width="64" height="64"  alt="">
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                              623 {{ __('Lesson') }}
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <img src="{{ asset('assets/img/clock.png') }}" width="64" height="64"  alt="">
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                              132 {{ __('Educational hour') }}
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>

        <br><br>


        <div class="container text-dark mt-6">
            <h1 style="text-align: center">
                {{ __('Course Categories') }}
            </h1>
            <div class="hr-text"></div>

        </div>

        {{-- Cards --}}
        <br><br>
        <div class="container col-12 ">
            <div class="card ">
              <div class="card-body ">
                <div class="row row-cards">
                  <div class="col-md">
                    <div class="card card-link card-link-pop">
                      <div class="card-status-top"></div>
                      <div class="card-body p-0">
                        <img src="https://promoidea.ba/wp-content/uploads/2014/03/img.gif" class="w-100" preserveAspectRatio="none" width="400" height="200" alt="">
                      </div>
                      <div class="card-footer" style="text-align: center">
                        <span class="h1">test</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="card">
                      <div class="card-status-top bg-green"></div>
                      <div class="card-header">
                        <h3 class="card-title">Second card</h3>
                      </div>
                      <div class="card-body p-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-100" preserveAspectRatio="none" width="400" height="200" viewBox="0 0 400 200" fill="transparent" stroke="var(--tblr-border-color, #b8cef1)">
                          <line x1="0" y1="0" x2="400" y2="200"></line>
                          <line x1="0" y1="200" x2="400" y2="0"></line>
                        </svg>
                      </div>
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="card">
                      <div class="card-status-top bg-blue"></div>
                      <div class="card-header">
                        <h3 class="card-title">Third card</h3>
                      </div>
                      <div class="card-body p-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-100" preserveAspectRatio="none" width="400" height="200" viewBox="0 0 400 200" fill="transparent" stroke="var(--tblr-border-color, #b8cef1)">
                          <line x1="0" y1="0" x2="400" y2="200"></line>
                          <line x1="0" y1="200" x2="400" y2="0"></line>
                        </svg>
                      </div>
                    </div>
                  </div>
                </div>
                <br>
                <div class="row row-cards">
                    <div class="col-md">
                      <div class="card">
                        <div class="card-status-top bg-red"></div>
                        <div class="card-header">
                          <h3 class="card-title">First card</h3>
                        </div>
                        <div class="card-body p-0">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-100" preserveAspectRatio="none" width="400" height="200" viewBox="0 0 400 200" fill="transparent" stroke="var(--tblr-border-color, #b8cef1)">
                            <line x1="0" y1="0" x2="400" y2="200"></line>
                            <line x1="0" y1="200" x2="400" y2="0"></line>
                          </svg>
                        </div>
                      </div>
                    </div>
                    <div class="col-md">
                      <div class="card">
                        <div class="card-status-top bg-green"></div>
                        <div class="card-header">
                          <h3 class="card-title">Second card</h3>
                        </div>
                        <div class="card-body p-0">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-100" preserveAspectRatio="none" width="400" height="200" viewBox="0 0 400 200" fill="transparent" stroke="var(--tblr-border-color, #b8cef1)">
                            <line x1="0" y1="0" x2="400" y2="200"></line>
                            <line x1="0" y1="200" x2="400" y2="0"></line>
                          </svg>
                        </div>
                      </div>
                    </div>
                    <div class="col-md">
                      <div class="card">
                        <div class="card-status-top bg-blue"></div>
                        <div class="card-header">
                          <h3 class="card-title">Third card</h3>
                        </div>
                        <div class="card-body p-0">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-100" preserveAspectRatio="none" width="400" height="200" viewBox="0 0 400 200" fill="transparent" stroke="var(--tblr-border-color, #b8cef1)">
                            <line x1="0" y1="0" x2="400" y2="200"></line>
                            <line x1="0" y1="200" x2="400" y2="0"></line>
                          </svg>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
        </div>

        {{-- Cards /End --}}

        <div class="container text-dark mt-6">
            <h1 style="text-align: center">
                {{ __('Special courses') }}
            </h1>
            <div class="hr-text"></div>
        </div>


        <br><br>

    </div>


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



</body>
</html>

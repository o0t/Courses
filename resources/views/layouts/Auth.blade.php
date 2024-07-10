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
    </style>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
      </head>
<body>
    <script src="{{ asset('assets/js/demo-theme.min.js?1684106062')}}"></script>

        <main class="py-4">
            @yield('content')
        </main>


        <footer class="footer footer-transparent d-print-none">
            <div class="container-xl">
              <div class="row text-center align-items-center flex-row-reverse">
                <div class="col-lg-auto ms-lg-auto">
                  <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item"><a href="https://tabler.io/docs" target="_blank" class="link-secondary" rel="noopener">Documentation</a></li>
                    <li class="list-inline-item"><a href="./license.html" class="link-secondary">License</a></li>
                    <li class="list-inline-item"><a href="https://github.com/tabler/tabler" target="_blank" class="link-secondary" rel="noopener">Source code</a></li>
                    <li class="list-inline-item">
                      <a href="https://github.com/sponsors/codecalm" target="_blank" class="link-secondary" rel="noopener">
                        <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon text-pink icon-filled icon-inline"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"></path></svg>
                        Sponsor
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                  <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item">
                      Copyright © 2024
                      <a href="." class="link-secondary">Tabler</a>.
                      All rights reserved.
                    </li>
                    <li class="list-inline-item">
                      <a href="./changelog.html" class="link-secondary" rel="noopener">
                        v1.0.0-beta20
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </footer>
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


</body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
        <title>  - </title>
        <!-- CSS files -->
        <link href="{{ asset('assets/css/tabler.min.css?1684106062') }}" rel="stylesheet"/>
        <link href="{{ asset('assets/css/tabler-flags.min.css?1684106062') }}" rel="stylesheet"/>
        <link href="{{ asset('assets/css/tabler-payments.min.css?1684106062') }}" rel="stylesheet"/>
        <link href="{{ asset('assets/css/tabler-vendors.min.css?1684106062') }}" rel="stylesheet"/>
        <link href="{{ asset('assets/css/demo.min.css?1684106062') }}" rel="stylesheet"/>
        <style>
          @import url('https://rsms.me/inter/inter.css');
          :root {
              --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
          }
          body {
              font-feature-settings: "cv03", "cv04", "cv11";
          }
        </style>
      </head>
<body>
    <script src="{{ asset('assets/js/demo-theme.min.js?1684106062')}}"></script>

        <main class="py-4">
            @yield('content')
        </main>

    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js?1684106062')}}" defer></script>
    <script src="{{ asset('assets/libs/jsvectormap/dist/js/jsvectormap.min.js?1684106062')}}" defer></script>
    <script src="{{ asset('assets/libs/jsvectormap/dist/maps/world.js?1684106062')}}" defer></script>
    <script src="{{ asset('assets/libs/jsvectormap/dist/maps/world-merc.js?1684106062')}}" defer></script>
    <!-- Tabler Core -->
    <script src="{{ asset('assets/js/tabler.min.js?1684106062')}}" defer></script>
    <script src="{{ asset('assets/js/demo.min.js?1684106062')}}" defer></script>
</body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/all.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/fontawesome.min')}}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/normalize.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/main.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/responsive.css')}}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @include('frontend.partials.__header')
    <div id="app">
        @if(session()->get('message'))
                    <div class="alert alert-success" role="alert">
                        <strong>Success: </strong>{{session()->get('message')}}
                    </div>
                     @endif
        <main class="py-4">
            @yield('body-content')
        </main>
    </div>

    @include('frontend.partials.__footer')

  <script src="{{ asset('assets/frontend/js/vendor/modernizr-3.11.2.min.js')}}"></script>
  <script src="{{ asset('assets/frontend/js/plugins.js')}}"></script>
  
  
  <script src="{{ asset('assets/frontend/js/jquery-slim.min.js')}}"></script>
  <script src="{{ asset('assets/frontend/js/popper.min.js')}}"></script>
  <script src="{{ asset('assets/frontend/js/bootstrap.min.js')}}"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
  <script src="{{ asset('assets/frontend/js/main.js')}}"></script>

  
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set', 'anonymizeIp', true); ga('set', 'transport', 'beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>

</body>
</html>

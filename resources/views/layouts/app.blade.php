<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }} "/>
    <!-- Scripts -->
    <script src="{{ asset('resources/js/app.js') }}" defer></script>

    <script src="{{ asset('js/app-js.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('resources/css/main.css') }}"/>
    <link rel="stylesheet" href="{{ asset('resources/css/fonts.css') }}"/>
    <link rel="stylesheet" href="{{ asset('resources/css/slick-theme.css') }}"/>
    <link rel="stylesheet" href="{{ asset('resources/css/slick.css') }}"/>
    <link rel="stylesheet" href="{{ asset('resources/css/modal-video.min.css') }}"/>

    <link href="{{ asset('resources/css/app.css') }}" rel="stylesheet">

{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">--}}

{{--    <!-- Optional theme -->--}}
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">--}}


{{--    @stack('styles')--}}
</head>
<body>
<div></div>
    <div id="app">
        @include('errors.session')
       @yield('content')
    </div>
@yield('scripts')
{{--@stack('scripts')--}}
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>--}}
</body>
</html>


<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{asset('images/tootiko/tootiko-alone.png')}}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Tootiko') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->


    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">



    {{--    <link rel="stylesheet" href="{{ asset('css/rtl-bootstrap.css') }}">--}}

    @stack('styles')
    <meta name="google-site-verification" content="o0Xco_SisHJ_4RrLylGYcCa_hRSEwZiB71mK44wzXFM" />

</head>
<body>


@include('inc.navbar')


@yield('content')


<script src="{{asset('js/app.js')}}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
@stack('scripts')

</body>
</html>

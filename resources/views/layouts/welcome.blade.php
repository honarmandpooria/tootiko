<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>طوطیکو</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->


    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    {{--    <link rel="stylesheet" href="{{ asset('css/rtl-bootstrap.css') }}">--}}

    @stack('styles')

</head>
<body>


@include('inc.navbar')

@yield('content')


<script src="{{asset('js/app.js')}}"></script>
@stack('scripts')

</body>
</html>

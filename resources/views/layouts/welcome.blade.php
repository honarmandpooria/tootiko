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
    <style>


        .tooltip-inner {

            direction: rtl;
            max-width: 300px;
            padding: 0.25rem 0.5rem;
            color: #fff;
            text-align: center;
            background-color: #38c172;
            border-radius: 22px;
        }

        .bs-tooltip-bottom .arrow::before, .bs-tooltip-auto[x-placement^="bottom"] .arrow::before {
            bottom: 0;
            border-width: 0 0.4rem 0.4rem;
            border-bottom-color: #38c172;
        }

    </style>

</head>
<body>


@include('inc.navbar')


@yield('content')


<script src="{{asset('js/app.js')}}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script>

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });

</script>
@stack('scripts')

</body>
</html>

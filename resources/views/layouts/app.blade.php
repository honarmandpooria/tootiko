<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{asset('images/tootiko/tootiko-alone.png')}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tootiko') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">


    {{--    <link href="{{ asset('css/rtl-bootstrap.css') }}" rel="stylesheet">--}}

    <meta name="google-site-verification" content="o0Xco_SisHJ_4RrLylGYcCa_hRSEwZiB71mK44wzXFM"/>
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
            border-bottom-color: #38c172;
        }

        .bs-tooltip-top .arrow::before, .bs-tooltip-auto[x-placement^="top"] .arrow::before {
            border-top-color: #38c172;
        }

        .bs-tooltip-right .arrow::before, .bs-tooltip-auto[x-placement^="top"] .arrow::before {
            border-top-color: #38c172;
        }

        .bs-tooltip-left .arrow::before, .bs-tooltip-auto[x-placement^="top"] .arrow::before {
            border-top-color: #38c172;
        }


    </style>
    @stack('styles')

</head>
<body>
<div>


    @include('inc.navbar')

    <div class="@guest py-4 @else py-5 @endguest"></div>

    <main class="py-4">
        @yield('content')
    </main>
</div>


<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script>

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });

</script>
@stack('scripts')


</body>
</html>

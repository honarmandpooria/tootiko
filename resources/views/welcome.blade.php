<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>طوطیکو</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->


    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    {{--    <link rel="stylesheet" href="{{ asset('css/rtl-bootstrap.css') }}">--}}

</head>
<body>


@include('inc.navbar')


<div class="d-flex align-items-center justify-content-center px-2"
     style="height: 100vh; background: url({{asset('images/hero-small.jpg')}}) no-repeat center center; background-size:cover !important">
    <div class="text-center">
        <h1 dir="rtl" class="text-muted font-weight-bold" style="font-size: 1.75rem;">سفارش آنلاین ترجمه از بهترین
            اساتید و مترجمین</h1>


        {{--        form--}}





    </div>
</div>

<script src="{{asset('js/app.js')}}"></script>


</body>
</html>

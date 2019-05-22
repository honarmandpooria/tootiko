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


@include('inc.welcome-navbar')


<div class="d-flex align-items-center justify-content-center px-2" style="height: 100vh">
    <div dir="rtl" class="text-center">
        <h1>خدمات ترجمه آنلاین</h1>
        <h5 class=" ">طوطیکو یک سیستم خدمات ترجمه آنلاین است، به راحتی و در سریع ترین زمان ممکن مقاله خود را ترجمه
            کنید.</h5>
        <p class="text-muted">فقط کافیست از منوی بالا وارد شوید و با چند کلیک ساده ترجمه خود را به بهترین مترجمین
            بسپارید.</p>
    </div>
</div>

<script src="{{asset('js/app.js')}}"></script>

</body>
</html>

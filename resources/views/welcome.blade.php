<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->


    <link rel="stylesheet" href="{{asset('css/app.css')}}">


</head>
<body dir="rtl">


<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand" href="#">هنرمند ترنس</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07"
                aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample07">
            <ul class="navbar-nav m-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">صفحه اصلی</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">قیمت ترجمه</a>
                </li>

            </ul>
        </div>

        @if (Route::has('login'))
            <div class="float-left text-white">
                @auth
                    <a class="text-white" href="{{ url('/home') }}">داشبورد</a>
                @else
                    <a class="text-white mx-3" href="{{ route('login') }}">ورود</a>
                    @if (Route::has('register'))
                        <a class="text-white" href="{{ route('register') }}">ثبت نام</a>
                    @endif
                @endauth
            </div>
        @endif

    </div>
</nav>


<script src="{{asset('js/app.js')}}"></script>

</body>
</html>

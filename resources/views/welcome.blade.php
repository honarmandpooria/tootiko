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

{{--    <link rel="stylesheet" href="{{ asset('css/rtl-bootstrap.css') }}">--}}

</head>
<body>


<nav dir="rtl" class="navbar navbar-expand-lg fixed-top navbar-dark bg-success">
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
            <ul class="navbar-nav mr-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">ورود</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">ثبت نام</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('home') }}">
                                پنل کاربری
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                خروج
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>


    </div>
</nav>


<div class="d-flex align-items-center justify-content-center px-2" style="height: 100vh">
    <div dir="rtl" class="text-center">
        <h1>خدمات ترجمه آنلاین</h1>
        <h5 class=" ">هنرمند ترنس یک سیستم خدمات ترجمه آنلاین است، به راحتی و در سریع ترین زمان ممکن مقاله خود را ترجمه
            کنید.</h5>
        <p class="text-muted">فقط کافیست از منوی بالا وارد شوید و با چند کلیک ساده ترجمه خود را به بهترین مترجمین
            بسپارید.</p>
    </div>
</div>

<script src="{{asset('js/app.js')}}"></script>

</body>
</html>

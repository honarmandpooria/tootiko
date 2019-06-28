

<nav dir="rtl" class="navbar navbar-expand navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand ml-auto d-none d-md-block" href="{{ url('/') }}">
            طوطیکو
        </a>
        {{--        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"--}}
        {{--                aria-controls="navbarSupportedContent" aria-expanded="false"--}}
        {{--                aria-label="{{ __('Toggle navigation') }}">--}}
        {{--            <span class="navbar-toggler-icon"></span>--}}
        {{--        </button>--}}

        <div class=" navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav m-auto">

                @guest
                @else
                    <li class="nav-item">
                        <a href="{{route('admin-home')}}"
                           class="nav-link {{Request::is('admin-home') ? 'active border-3' : ''}}">
                            <div class="d-flex justify-content-center"><i class=" fas fa-2x fa-tachometer-alt"></i>
                            </div>
                            <span class="d-none d-md-block">داشبورد</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin-orders.index')}}"
                           class="nav-link {{Request::is('admin-orders') ? 'active border-3' : ''}}">
                            <div class="d-flex justify-content-center"><i class="fas fa-2x fa-folder-open"></i></div>
                            <span class="d-none d-md-block">سفارشها</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('transactions.index')}}"
                           class="nav-link {{Request::is('transactions') ? 'active border-3' : ''}}">
                            <div class="d-flex justify-content-center"><i class="fas fa-2x fa-clipboard-list"></i></div>
                            <span class="d-none d-md-block">فاکتورها</span>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{route('files.index')}}"
                           class="nav-link {{Request::is('files') ? 'active border-3' : ''}}">
                            <div class="d-flex justify-content-center"><i class="fas fa-2x fa-upload"></i></div>
                            <span class="d-none d-md-block">آپلودها</span>
                        </a>
                    </li>

                @endguest
            </ul>

            <!-- Right Side Of Navbar -->
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
                            <i class="fas fa-user"></i><span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-left text-right" style="overflow: hidden"
                             aria-labelledby="navbarDropdown">
                            <a class="dropdown-item"
                               href="{{Auth::user()->role_id==1 ? route('admin-home') : route('home')}}">
                                پنل کاربری
                            </a>
                            <a class="dropdown-item"
                               href="{{Auth::user()->role_id==1 ? route('home') : route('home')}}">
                                پنل مشتری
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

<nav dir="rtl" class="navbar navbar-expand navbar-dark bg-primary shadow-sm fixed-top p-0 shadow">
    <div class="container">
        {{-- <a class="navbar-brand ml-auto d-none d-md-block" href="{{ url('/') }}">
             طوطیکو
         </a>--}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Right Side Of Navbar -->
            <ul dir="rtl" class="navbar-nav p-0">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('welcome') }}"><i class="fas fa-home mx-2"></i>خانه</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login-register') }}"><i class="fas fa-key mx-2"></i>ورود | ثبت نام</a>
                    </li>

                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                            <img src="{{asset('images/avatar.png')}}" alt="">
                            <span class="d-none d-md-inline">{{Auth::user()->name}}</span>
                            <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right text-right" style="overflow: hidden"
                             aria-labelledby="navbarDropdown">
                            <a class="dropdown-item"
                               href="{{Auth::user()->role_id==1 ? route('admin-home') : route('welcome')}}">
                                صفحه اصلی
                            </a>
                            <a class="dropdown-item"
                               href="{{Auth::user()->role_id==1 ? route('admin-home') : route('home')}}">
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



            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav m-auto p-0">


                @guest

                @else

                    @if(Auth::user()->email_verified_at)


                        <li class="nav-item">
                            <a href="{{route('welcome')}}"
                               class="text-center px-3 nav-link {{Request::is('/') ? 'active border-3' : ''}}">
                                <div class="d-flex justify-content-center"><i class="fas fa-2x fa-home"></i>
                                </div>
                                <span class="d-none d-md-block">خانه</span></a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('home')}}"
                               class="nav-link {{Request::is('home') ? 'active border-3' : ''}}">
                                <div class="d-flex justify-content-center"><i class="fas fa-2x fa-folder"></i>
                                </div>
                                <span class="d-none d-md-block">ترجمه های من</span></a>
                        </li>


                        <li class="nav-item">
                            <a href="{{route('customer-orders.create')}}"
                               class="nav-link {{Request::is('customer-orders/create') ? 'active border-3' : ''}}">
                                <div class="d-flex justify-content-center"><i class=" fas fa-2x fa-folder-plus"></i>
                                </div>
                                <span class="d-none d-md-block">ثبت سفارش</span></a>
                        </li>

             {{--           <li class="nav-item">
                            <a href="{{route('customer-orders.index')}}"
                               class="nav-link {{Request::is('customer-orders') ? 'active border-3' : ''}}">
                                <div class="d-flex justify-content-center"><i class=" fas fa-2x fa-folder-open"></i>
                                </div>
                                <span class="d-none d-md-block">ترجمه های من</span></a>
                        </li>
--}}
                    @endif
                @endguest
            </ul>


        </div>
    </div>


</nav>



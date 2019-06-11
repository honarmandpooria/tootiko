@extends('layouts.app')



@push('styles')

    <style>

        #nav-tab a.active {

            border-bottom: 3px solid #9c27b0 !important;

        }

    </style>



@endpush

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">


                <div class="shadow rounded-bottom">

                    <nav dir="rtl">
                        <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active rounded-0" id="nav-home-tab" data-toggle="tab"
                               href="#nav-home"
                               role="tab"
                               aria-controls="nav-home" aria-selected="true"><i class="fas fa-key mx-2 fa-2x"></i><span
                                    class="d-block">ورود</span></a>
                            <a class="nav-item nav-link rounded-0" id="nav-profile-tab" data-toggle="tab"
                               href="#nav-profile" role="tab"
                               aria-controls="nav-profile" aria-selected="false"><i
                                    class="fas fa-pen-alt mx-2 fa-2x"></i><span
                                    class="d-block">ثبت نام</span></a>

                        </div>
                    </nav>
                    <div dir="rtl" class="tab-content border" id="nav-tabContent">

                        {{--    Login--}}

                        <div class="tab-pane fade show active p-2" id="nav-home"
                             role="tabpanel"
                             aria-labelledby="nav-home-tab">



                            <div class="text-center">

                                <p class="text-center pt-5">ورود به روش جدید (بدون نیاز به ثبت نام):</p>


                                <a class="btn btn-danger" href="/login/google"> <i class="fab fa-google mx-2"></i>ورود با اکانت گوگل</a>


                            </div>

                            <hr class="border-danger">

                            <p class="text-center">ورود به روش قدیمی؛</p>



                            <form class="p-4" method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">آدرس ایمیل</label>

                                    <div class="col-md-6">
                                        <input dir="ltr" id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">رمز عبور</label>

                                    <div class="col-md-6">
                                        <input dir="ltr" id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password"
                                               required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="container">
                                    <div class="row ">
                                        <div class="col-md-6">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" name="remember"
                                                       id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="custom-control-label" for="remember">
                                                    من را به خاطر بسپار
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            ورود
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                رمز خود را فراموش کرده اید؟
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>

                        </div>


                        {{--    Register--}}


                        <div class="tab-pane fade p-2"
                             id="nav-profile"
                             role="tabpanel" aria-labelledby="nav-profile-tab">


                            <div class="text-center">

                                <p class="text-center pt-5">ثبت نام به روش جدید:</p>


                                <a class="btn btn-danger" href="/login/google"> <i class="fab fa-google mx-2"></i>ثبت نام با اکانت گوگل</a>


                            </div>

                            <hr class="border-danger">

                            <p class="text-center">ثبت نام به روش قدیمی:</p>


                            <form method="POST" class="p-4" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">نام</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                               class="form-control @error('name') is-invalid @enderror" name="name"
                                               value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">آدرس ایمیل</label>

                                    <div class="col-md-6">
                                        <input dir="ltr" id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">رمز عبور</label>

                                    <div class="col-md-6">
                                        <input dir="ltr" id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror" name="password"
                                               required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">تکرار رمز
                                        عبور</label>

                                    <div class="col-md-6">
                                        <input dir="ltr" id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            ثبت نام
                                        </button>
                                    </div>
                                </div>
                            </form>


                        </div>

                    </div>

                </div>


            </div>
        </div>
    </div>
@endsection

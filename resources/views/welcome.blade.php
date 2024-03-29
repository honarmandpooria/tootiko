@extends('layouts.welcome')


@push('styles')


    <style>

        /* Landscape phones and portrait tablets */
        @media (max-width: 767px) {

            #hero {
                background-image: unset !important;
                background-color: rgba(118, 118, 118, 0.05) !important;
            }

        }

    </style>


@endpush

@section('content')


    @guest

    @else
        @if(count(Auth::user()->orders->where('status_id',2)) == 1)

            <div dir="rtl"
                 class="alert text-center alert-warning position-fixed rounded-0 d-block animated bounceInRight shadow"
                 style="top: 74px; width: 100%; z-index:1000;" role="alert">
                <i class="fas fa-bell"></i>
                <span class="d-none d-md-inline-block">تبریک! آماده سازی سفارش انجام شد!</span>
                <span
                    class="d-sm-inline-block d-md-none">سفارش آماده سازی شد!</span> <a
                    href="{{route('customer-orders.show',$orders->first()->id)}}"
                    class="alert-link btn btn-warning"><i
                        class="fas fa-eye mx-2"></i>مشاهده</a>
            </div>

        @elseif(count(Auth::user()->orders->where('status_id',2)) > 1)

            <div dir="rtl" class="alert alert-warning position-fixed rounded-0 d-block"
                 style="top: 74px; width: 100%; z-index:1000;" role="alert">
                <span class="d-none d-md-inline-block">تبریک! آماده سازی سفارش انجام شد!</span>
                <span
                    class="d-sm-inline-block d-md-none">سفارش آماده سازی شد!</span> <a
                    href="{{route('get-order-with-status',2)}}"
                    class="alert-link btn btn-warning"><i
                        class="fas fa-eye mx-2"></i>مشاهده</a>
            </div>

        @endif
    @endguest

    <div id="hero" class="d-flex align-items-center justify-content-center px-2"
         style="height: 100vh; background: url({{asset('images/hero-small.jpg')}}) no-repeat center center; background-size:cover !important">

        <div class="text-center mb-md-5 pb-md-5">
            <img class="mb-4" src="{{asset('images/Tootiko-Logo.png')}}" alt="Tootiko Logo">
            <h1 dir="rtl" class="text-muted font-weight-bold" style="font-size: 1.75rem;">سفارش آنلاین ترجمه از بهترین
                اساتید و مترجمین</h1>
            <button class="btn btn-success btn-lg mt-4 rounded shadow" data-toggle="modal"
                    data-target="#translate-form-modal">ثبت سفارش ترجمه
            </button>
            <button class="btn btn-outline-primary btn-lg mt-4 rounded shadow" data-toggle="modal"
                    data-target="#translate-form-modal">برآورد قیمت رایگان
            </button>


        </div>
    </div>


    <div class="container">

        <h4 class="text-center text-primary my-5">راهنمای سفارش آسان و سریع ۴ مرحله ای</h4>

        <div dir="rtl" class="row">
            <div class="col-md-3 text-center">

                <img src="{{asset('images/step1.png')}}" alt="">
                <p class="text-center text-primary my-3">سفارش ترجمه ات رو ثبت کن</p>
                <p class="text-center text-muted my-3 small">روی دکمه ثبت سفارش کلیک کن و فایل یا لینک ترجمه ات رو همراه
                    با اطلاعات سفارش به ما بده</p>

            </div>
            <div class="col-md-3 text-center">

                <img src="{{asset('images/step2.png')}}" alt="">
                <p class="text-center text-primary my-3">منتظر شمارش کلمات و مترجم باش</p>
                <p class="text-center text-muted my-3 small">چند دقیقه منتظر بمون تا کارشناسا کلمات رو شمارش کنن و
                    همینطور یه مترجم مناسب با متن انتخاب کنن</p>

            </div>
            <div class="col-md-3 text-center">

                <img src="{{asset('images/step3.png')}}" alt="">
                <p class="text-center text-primary my-3">به راحتی پرداخت کن</p>
                <p class="text-center text-muted my-3 small">به راحتی با هر کارت عضو شتابی، هزینه مترجم رو پرداخت کن</p>


            </div>
            <div class="col-md-3 text-center">

                <img src="{{asset('images/step4.png')}}" alt="">
                <p class="text-center text-primary my-3">فایل ترجمه ات رو تحویل بگیر</p>
                <p class="text-center text-muted my-3 small">بعد از مهلتی که برای مترجم انتخاب کردی ، فایل ترجمه شده ات
                    رو تحویل بگیر</p>


            </div>
        </div>
    </div>




    {{--==========    price plans ========--}}
    <h4 class="text-center text-muted mt-5">تعرفه خدمات</h4>
    <div class="container">
        <hr>
        <div dir="rtl" class="row">
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm" style="transform: scale(0.90);">

                    <div class="card-header text-center bg-info text-white">کیفیت معمولی</div>
                    <div class="card-body">

                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <span>مترجم عمومی و تازه کار</span>
                        <hr>

                        <i class="fas fa-check text-success"></i>
                        <span>گارانتی کیفیت</span>
                        <hr>


                        <i class="fas fa-times text-danger"></i>
                        <span>دیکشنری واژگان تخصصی</span>
                        <hr>


                        <i class="fas fa-times text-danger"></i>
                        <span>بازخوانی و ویراست</span>
                        <hr>


                    </div>
                    <div class="card-footer text-center ">


                        <div class="text-success">
                            قیمت:
                            <span class="persian-num ">
                                20
                                </span>
                            تومان / کلمه

                        </div>


                    </div>

                </div>
            </div>
            <div class="col-md-4 mb-3 ">
                <div class="card shadow-lg">

                    <div class="card-header bg-success text-white text-center">کیفیت خوب</div>
                    <div class="card-body">

                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <span>مترجم تخصصی و مرتبط</span>
                        <hr>


                        <i class="fas fa-check text-success"></i>
                        <span>گارانتی کیفیت</span>
                        <hr>


                        <i class="fas fa-check text-success"></i>
                        <span>دیکشنری واژگان تخصصی</span>
                        <hr>


                        <i class="fas fa-times text-danger"></i>
                        <span>بازخوانی و ویراست</span>
                        <hr>


                    </div>
                    <div class="card-footer text-center">


                        <div class="text-success">
                            قیمت:
                            <span class="persian-num ">
                                25
                                </span>
                            تومان / کلمه

                        </div>


                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card shadow" style="transform: scale(0.90);">
                    <div class="card-header bg-warning text-center">کیفیت عالی</div>
                    <div class="card-body">

                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <span>مترجم برگزیده طوطیکو</span>
                        <hr>


                        <i class="fas fa-check text-success"></i>
                        <span>گارانتی کیفیت</span>
                        <hr>


                        <i class="fas fa-check text-success"></i>
                        <span>دیکشنری واژگان تخصصی</span>
                        <hr>


                        <i class="fas fa-check text-success"></i>
                        <span>بازخوانی و ویراست</span>
                        <hr>


                    </div>
                    <div class="card-footer text-center">


                        <div class="text-success">
                            قیمت:
                            <span class="persian-num ">
                                30
                                </span>
                            تومان / کلمه

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--    footer--}}
    <div class="d-flex align-items-end" style="height: 140px; background: url({{asset('images/repeat-1920-140.png')}})">

        <p dir="rtl" class="text-left text-white small ml-3">تمامی حقوق این وبسایت برای <span class="text-primary">طوطیکو</span>
            محفوظ است. | ۱۳۹۸ ©</p>

    </div>







    {{--        form modal--}}


    <div class="modal  fade" id="translate-form-modal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div dir="rtl" class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">سفارش جدید</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('order.form')
                </div>

            </div>
        </div>
    </div>


@endsection



@push('scripts')






@endpush


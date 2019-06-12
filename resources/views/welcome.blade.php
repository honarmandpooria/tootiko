@extends('layouts.welcome')




@section('content')

    <div class="d-flex align-items-center justify-content-center px-2"
         style="height: 100vh; background: url({{asset('images/hero-small.jpg')}}) no-repeat center center; background-size:cover !important">
        <div class="text-center" style="margin-top: -175px;">
            <img class="mb-4" src="{{asset('images/Tootiko-Logo.png')}}" alt="Tootiko Logo">
            <h1 dir="rtl" class="text-muted font-weight-bold" style="font-size: 1.75rem;">سفارش آنلاین ترجمه از بهترین
                اساتید و مترجمین</h1>
            <button class="btn btn-success btn-lg mt-4 rounded shadow" data-toggle="modal" data-target="#translate-form-modal">ثبت سفارش ترجمه
            </button>


            {{--        form--}}


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


        </div>
    </div>


    <div class="container">

        <h4 class="text-center text-primary my-5">راهنمای سفارش آسان و سریع ۴ مرحله ای</h4>

        <div dir="rtl" class="row">
            <div class="col-md-3 text-center">

                <img src="{{asset('images/step1.png')}}" alt="">
                <p class="text-center text-primary my-3">سفارش ترجمه ات رو ثبت کن</p>
                <p class="text-center text-muted my-3 small">روی دکمه ثبت سفارش کلیک کن و فایل یا لینک ترجمه ات رو همراه با اطلاعات سفارش به ما بده</p>

            </div>
            <div class="col-md-3 text-center">

                <img src="{{asset('images/step2.png')}}" alt="">
                <p class="text-center text-primary my-3">منتظر شمارش کلمات و مترجم باش</p>
                <p class="text-center text-muted my-3 small">چند دقیقه منتظر بمون تا کارشناسا کلمات رو شمارش کنن و همینطور یه مترجم مناسب با متن انتخاب کنن</p>

            </div>
            <div class="col-md-3 text-center">

                <img src="{{asset('images/step3.png')}}" alt="">
                <p class="text-center text-primary my-3">به راحتی پرداخت کن</p>
                <p class="text-center text-muted my-3 small">به راحتی با هر کارت عضو شتابی، هزینه مترجم رو پرداخت کن</p>


            </div>
            <div class="col-md-3 text-center">

                <img src="{{asset('images/step4.png')}}" alt="">
                <p class="text-center text-primary my-3">فایل ترجمه ات رو تحویل بگیر</p>
                <p class="text-center text-muted my-3 small">بعد از مهلتی که برای مترجم انتخاب کردی ، فایل ترجمه شده ات رو تحویل بگیر</p>


            </div>
        </div>
    </div>



@endsection

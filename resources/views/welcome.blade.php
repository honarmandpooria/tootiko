@extends('layouts.welcome')




@section('content')

    <div class="d-flex align-items-center justify-content-center px-2"
         style="height: 100vh; background: url({{asset('images/hero-small.jpg')}}) no-repeat center center; background-size:cover !important">
        <div class="text-center">
            <h1 dir="rtl" class="text-muted font-weight-bold" style="font-size: 1.75rem;">سفارش آنلاین ترجمه از بهترین
                اساتید و مترجمین</h1>


            {{--        form--}}


            <button class="btn btn-primary mt-3" data-toggle="modal" data-target="#translate-form-modal">ثبت سفارش ترجمه
            </button>

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



@endsection

@extends('layouts.app')




@section('content')
    <div class="container">

       {{-- <h4 class="text-muted font-weight-bolder text-center"><i class="fas fa-book-reader fa-2x mx-2"></i>وضعیت
            سفارش</h4>--}}

        @if($order->status_id ==1)
            <div class="card">

                <div class="card-header bg-danger text-white">
                    توجه
                </div>

                <div class="card-body">
                    <p dir="rtl">لطفا منتظر بمانید ... درحال حاضر در حال شمارش کلمات و انتخاب مترجم
                        مناسب برای
                        متن شما هستیم.</p>

                    <p dir="rtl" class="blockquote-footer mt-2">حداکثر تا <span
                            class="text-danger"> ۱۵ دقیقه آینده </span>
                        سفارش شما قیمت گذاری و آماده ترجمه خواهد شد. بعد از گذشت ۱۵ دقیقه میتوانید از صفحه ترجمه های من
                        وضعیت سفارش خود را پیگیری کنید.</p>
                </div>


            </div>

        @endif

        @if($order->status_id ==2)

            <p dir="rtl" class="text-center">
                {{Auth::user()->name}}
                عزیز؛ ممنونیم که طوطیکو را انتخاب کردید! تیم ارزیابی فایل شما را بررسی کرد.
                <br>
                تعداد کلمات در سفارشی که ثبت کردید
                <span class="persian-num">
                    {{$order->words}}
                </span>
                بود،
                با توجه به نوع مترجم و کیفیت درخواستی میتوانید هر یک از پلن های زیر را انتخاب کنید.
            </p>

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

                            <strike class="text-danger">
                                مبلغ پرداختی:
                                <span class="persian-num ">
                                {{$order->transaction->quality_3_price * 1.1}}
                                </span>
                                تومان

                            </strike>

                            <div class="text-success">
                                مبلغ پرداختی برای شما:
                                <span class="persian-num ">
                                {{$order->transaction->quality_3_price}}
                                </span>
                                تومان

                            </div>

                            <button class="btn m-2 p-2  btn-info text-white shadow-sm animated"
                                    onclick="event.preventDefault();
                                        document.getElementById('payment-form{{$order->transaction->quality_3_price}}').submit();">
                                <i class="fas fa-money-check mx-2"></i>
                                انتخاب کیفیت معمولی و پرداخت
                            </button>


                            <form id="payment-form{{$order->transaction->quality_3_price}}" method="post"
                                  action="{{route('payment')}}">
                                @csrf

                                <input type="hidden" name="transaction_id" value="{{$order->transaction->id}}">
                                <input type="hidden" name="quality_id" value="3">

                            </form>

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

                            <strike class="text-danger">
                                مبلغ پرداختی:
                                <span class="persian-num ">
                                 {{$order->transaction->quality_2_price * 1.1}}
                                </span>
                                تومان

                            </strike>

                            <div class="text-success">
                                مبلغ پرداختی برای شما:
                                <span class="persian-num ">
                                 {{$order->transaction->quality_2_price}}
                                </span>
                                تومان

                            </div>

                            <button class="btn m-2 p-2  btn-success shadow-sm animated"
                                    onclick="event.preventDefault();
                                        document.getElementById('payment-form{{$order->transaction->quality_2_price}}').submit();">
                                <i class="fas fa-money-check mx-2"></i>
                                انتخاب کیفیت خوب و پرداخت
                            </button>


                            <form id="payment-form{{$order->transaction->quality_2_price}}" method="post"
                                  action="{{route('payment')}}">
                                @csrf

                                <input type="hidden" name="transaction_id" value="{{$order->transaction->id}}">
                                <input type="hidden" name="quality_id" value="2">

                            </form>


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

                            <strike class="text-danger">
                                مبلغ پرداختی:
                                <span class="persian-num ">
                                 {{$order->transaction->quality_1_price * 1.1}}
                                </span>
                                تومان

                            </strike>

                            <div class="text-success">
                                مبلغ پرداختی برای شما:
                                <span class="persian-num ">
                                 {{$order->transaction->quality_1_price}}
                                </span>
                                تومان

                            </div>

                            <button class="btn m-2 p-2  btn-warning shadow-sm animated"
                                    onclick="event.preventDefault();
                                        document.getElementById('payment-form{{$order->transaction->quality_1_price}}').submit();">
                                <i class="fas fa-money-check mx-2"></i>
                                انتخاب کیفیت عالی و پرداخت
                            </button>


                            <form id="payment-form{{$order->transaction->quality_1_price}}" method="post"
                                  action="{{route('payment')}}">
                                @csrf

                                <input type="hidden" name="transaction_id" value="{{$order->transaction->id}}">
                                <input type="hidden" name="quality_id" value="1">

                            </form>

                        </div>
                    </div>
                </div>
            </div>


        @endif


        <h4 dir="rtl"><i class="fas fa-list m-3"></i>جزئیات سفارش</h4>

        @include('inc.order.customer-order')



    </div>
@endsection



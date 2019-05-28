@extends('layouts.admin')

@section('content')
    <div class="container">

        @foreach($orders as $order)

            <div class="card mb-4 border border-danger">
                <div class="card-header bg-light">
                    <div class="card-title">

                        <div dir="rtl" class="row">
                            <div class="col-md-4 order-md-2">
                                <i class="far fa-2x fa-clipboard ml-2"></i>
                                شماره سفارش:
                                {{$order->id}}
                            </div>
                            <div class="col-md-4 order-md-2">
                                کاربر:
                                {{$order->user->name}}


                            </div>
                            <div class="col-md-4 order-md-2">

                                وضعیت فاکتور:

                                @if($order->transaction)


                                    @if($order->transaction->isPaid == 0)

                                        <span class="text-danger">پرداخت نشده</span> <i
                                            class="fas fa-times text-danger mx-2"></i>

                                    @else

                                        <span class="text-success">پرداخت شده</span><i
                                            class="fas fa-check text-success mx-2"></i>

                                    @endif

                                @else

                                    بدون صورت حساب

                                @endif


                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-body">

                    @include('inc.order-body')


                </div>
                <div class="card-footer bg-white">

                    <div dir="rtl" class="row">
                        @if($order->status_id == 1)

                            <div class="col-md-6 order-md-2">

                                <a class="card-text">منتظر شمارش کلمات</a>

                            </div>

                        @elseif ($order->status_id ==2)


                            <div class="col-md-6 order-md-2">
                                مبلغ پرداختی:
                                <span class="persian-num">
                                {{$order->transaction->price}}
                                </span>
                                تومان

                            </div>



                        @elseif ($order->status_id ==3)


                            <div class="col-md-6 order-md-2">

                                <a class="card-text">در انتظار تحویل فایل ترجمه</a>

                            </div>


                        @else

                            <div class="col-md-6 order-md-1">
                                <a download="فایل ترجمه شده" href="{{Storage::url($order->translated_file)}}"
                                   class="btn btn-success">دانلود فایل ترجمه شده</a>


                            </div>



                        @endif


                    </div>
                </div>
            </div>

        @endforeach
    </div>
@endsection



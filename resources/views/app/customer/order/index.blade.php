@extends('layouts.app')

@section('content')
    <div class="container">

        @foreach($orders as $order)

            <div class="card mb-4 border">
                <div class="card-header bg-primary text-white">
                    <div class="card-title">

                        <div dir="rtl" class="row">
                            <div class="col-md-6 order-md-2">
                                <i class="far fa-2x fa-clipboard ml-2"></i>
                                شماره سفارش:
                                {{$order->id}}
                            </div>
                            <div class="col-md-6 order-md-2">

                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-body">

                    @include('inc.order-body')

                </div>
                <div class="card-footer bg-white">

                    @if($order->status_id == 1)

                        <p class="card-text">سفارش شما در حال محاسبه تعداد کلمات و یافتن مترجم مناسب است.</p>

                    @elseif ($order->status_id ==2)

                        <div class="row">
                            <div class="col-md-6 order-md-2">


                            </div>
                            <div class="col-md-6 order-md-2">
                                مبلغ پرداختی:
                                <span class="persian-num">
                                {{$order->transaction->price}}
                                </span>
                                تومان


                                <button class="btn p-3  btn-outline-success"
                                        onclick="event.preventDefault();
                                            document.getElementById('payment-form{{$order->id}}').submit();">
                                    <i class="fas fa-money-check mx-2"></i>
                                    پرداخت
                                    مبلغ
                                </button>


                                <form id="payment-form{{$order->id}}" method="post"
                                      action="{{route('payment')}}">
                                    @csrf

                                    <input type="hidden" name="transaction_id" value="{{$order->transaction->id}}">

                                </form>


                            </div>
                        </div>


                    @elseif($order->status_id == 4)


                        <div class="row">
                            <div class="col-md-6 order-md-2">

                                <a download="فایل ترجمه شده" href="{{Storage::url($order->translated_file)}}"
                                   class="btn btn-success">دانلود فایل ترجمه شده</a>


                            </div>
                            <div class="col-md-6 order-md-2">

                            </div>
                        </div>


                    @endif

                </div>
            </div>

        @endforeach
    </div>
@endsection


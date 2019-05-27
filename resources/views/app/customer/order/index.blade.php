@extends('layouts.app')

@section('content')
    <div class="container">

        @foreach($orders as $order)

            <div class="card mb-4 border border-primary">
                <div class="card-header text-white bg-primary">
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
                    <div dir="rtl" class="row">
                        <div class="col-md-6 my-2">
                            <i class="fas fa-2x fa-bell text-warning mx-2"></i>
                            وضعیت سفارش:
                            {{$order->status->name}}
                        </div>
                        <div class="col-md-6 my-2">
                            <i class="fas fa-2x fa-language mx-2"></i>
                            زبان:
                            {{$order->operation->name}}
                        </div>
                        <div class="col-md-6 my-2">
                            زمینه کلی:
                            {{$order->category->name}}
                        </div>
                        <div class="col-md-6 my-2">
                            فایل مبدا: <a download="فایل مبدا {{$order->id}}"
                                          href="{{Storage::url($order->translation_file)}}"
                                          class="btn  btn-outline-primary"><i
                                    class="fas fa-download mx-2"></i>دانلود</a>
                        </div>
                        <div class="col-md-6 my-2">
                            کیفیت ترجمه:
                            {{$order->quality->name}}
                        </div>
                        <div class="col-md-6 my-2">
                            حق دسترسی:
                            {{$order->is_secret == 0 ? 'آزاد' : 'محرمانه'}}
                        </div>
                        <div class="col-md-6 my-2">
                            زمان ثبت سفارش:
                            <span class="translate">
                            {{$order->created_at->diffForHumans()}}
                            </span>
                        </div>
                        <div class="col-md-6 my-2">
                            مهلت:
                            <span class="persian-num">
                            {{$order->remaining_days}}
                            </span>
                            روز
                        </div>
                    </div>
                </div>
                <div dir="rtl" class="card-footer bg-white">

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

                        <a download="فایل ترجمه شده" href="{{Storage::url($order->translated_file)}}"
                           class="btn btn-success">دانلود فایل ترجمه شده</a>

                    @endif

                </div>
            </div>

        @endforeach
    </div>
@endsection


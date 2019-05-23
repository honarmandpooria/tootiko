@extends('layouts.admin')

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
                                کاربر:
                                {{$order->user->name}}
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
                        <div class="col-md-6 my-2 translate">
                            زمان ثبت سفارش:
                            {{$order->created_at->diffForHumans()}}
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

                    <div class="row">
                        @if($order->status_id == 1)

                            <div class="col-md-6 order-md-2">

                                <p class="card-text">منتظر شمارش کلمات</p>

                            </div>

                        @elseif ($order->status_id ==2)


                            <div class="col-md-6 order-md-2">
                                مبلغ پرداختی:
                                <span class="persian-num">
                                {{$order->words * ($order->status_id ==1 ? '20' : ($order->status_id ==2 ? '25' : '30'))}}
                                </span>
                                تومان

                            </div>




                        @endif

                        <div class="col-md-6 order-md-1">
                            <a href="{{route('admin-orders.edit',$order->id)}}" class="btn btn-primary rounded">تغییر
                                وضعیت</a>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
@endsection



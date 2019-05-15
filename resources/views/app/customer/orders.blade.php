@extends('layouts.app')

@section('content')
    <div class="container">

        @foreach($orders as $order)

            <div dir="rtl" class="card mb-2">
                <div class="card-header bg-primary text-white">
                    <div class="card-title">کد سفارش :۱۲۴</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 my-2">
                            زبان:
                            {{$order->operation->name}}
                        </div>
                        <div class="col-md-6 my-2">
                            زمینه کلی:
                            {{$order->category->name}}
                        </div>
                        <div class="col-md-6 my-2">
                            فایل مبدا: <a href="" class="btn btn-primary">دانلود</a>
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
                            {{$order->created_at}}
                        </div>
                        <div class="col-md-6 my-2">
                            مهلت:
                            {{$order->remaining_days}}
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white">

                    <div class="row">
                        <div class="col-sm-4">
                            <a href="" class="btn btn-outline-success">دانلود فایل ترجمه شده</a>
                        </div>
                    </div>

                </div>
            </div>

        @endforeach
    </div>
@endsection

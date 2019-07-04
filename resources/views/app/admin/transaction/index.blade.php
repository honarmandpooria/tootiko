@extends('layouts.admin')

@section('content')
    <div class="container">
        @foreach($transactions as $transaction)


            <div class="card mb-3 border-dark">

                <div class="card-header">
                    <div dir="rtl" class="row">
                        <div class="col-md-4 order-md-2">
                            کد سفارش:
                            {{$transaction->order->code}}

                        </div>
                        <div class="col-md-4 order-md-2">
                            نام مشتری:
                            {{$transaction->order->user->name}}

                        </div>
                        <div class="col-md-4 order-md-2">

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div dir="rtl" class="row">
                        <div class="col-md-4">
                            وضعیت فاکتور:

                            @if($transaction->isPaid == 0)

                                <span class="text-danger">پرداخت نشده</span> <i
                                    class="fas fa-times text-danger mx-2"></i>

                            @else

                                <span class="text-success">پرداخت شده</span><i
                                    class="fas fa-check text-success mx-2"></i>

                            @endif


                        </div>

                        <div class="col-md-2">
                            عالی:
                            <span class="persian-num">
                                {{$transaction->quality_1_price}}
                                </span>
                        </div>

                        <div class="col-md-2">
                            متوسط:
                            <span class="persian-num">
                                {{$transaction->quality_2_price}}
                                </span>
                        </div>

                        <div class="col-md-2">
                            معمولی:
                            <span class="persian-num">
                                {{$transaction->quality_3_price}}
                                </span>
                        </div>

                    </div>
                </div>

            </div>


        @endforeach
    </div>
@endsection



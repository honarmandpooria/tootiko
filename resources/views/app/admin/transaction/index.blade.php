@extends('layouts.admin')

@section('content')
    <div class="container">
        @foreach($transactions as $transaction)


            <div class="card mb-3 border-dark">

                <div class="card-header">
                    <div dir="rtl" class="row">
                        <div class="col-md-4 order-md-2">
                            شماره سفارش:
                            {{$transaction->order_id}}

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

                        <div class="col-md-4">
                            هزینه:
                            <span class="persian-num">
                                {{$transaction->price}}
                                </span>
                        </div>

                    </div>
                </div>

            </div>


        @endforeach
    </div>
@endsection



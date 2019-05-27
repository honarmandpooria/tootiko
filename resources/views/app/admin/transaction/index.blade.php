@extends('layouts.admin')

@section('content')
    <div class="container">
        @foreach($transactions as $transaction)


            <div class="card mb-3">

                <div class="card-header bg-primary text-white">
                    <div dir="rtl" class="row">
                        <div class="col-md-4 order-md-2">
                            آیدی فاکتور:
                            {{$transaction->id}}
                        </div>
                        <div class="col-md-4 order-md-2">
                            هزینه:
                            <span class="persian-num">
                                {{$transaction->price}}
                                </span>
                        </div>
                        <div class="col-md-4 order-md-2">
                            شماره سفارش:
                            {{$transaction->order_id}}

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div dir="rtl" class="row">
                        <div class="col-md-4 order-md-2">
                            وضعیت فاکتور:
                            {{$transaction->idPaid == 0 ? 'پرداخت نشده' : 'پرداخت شده'}}
                        </div>
                    </div>
                </div>

            </div>


        @endforeach
    </div>
@endsection



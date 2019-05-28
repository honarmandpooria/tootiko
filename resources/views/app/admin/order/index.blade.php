@extends('layouts.admin')

@section('content')
    <div class="container">

        @foreach($orders as $order)

            <div class="card mb-4 border border-danger">
                <div class="card-header bg-light">

                    @include('inc.order.header')

                </div>
                <div class="card-body">

                    @include('inc.order.body')


                </div>
                <div class="card-footer bg-white">

                    <div dir="rtl" class="row">


                        <div class="col-md-6 order-md-1">

                            <a href="{{route('admin-orders.edit', $order->id)}}" class="btn btn-warning">رسیدگی به سفارش</a>

                        </div>


                        @if ($order->status_id ==2)


                            <div class="col-md-6 order-md-2">
                                مبلغ پرداختی:
                                <span class="persian-num">
                                {{$order->transaction->price}}
                                </span>
                                تومان

                            </div>


                        @endif


                    </div>
                </div>
            </div>

        @endforeach
    </div>
@endsection



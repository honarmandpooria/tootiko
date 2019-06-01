@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="card mb-4 shadow">
            <div
                class="card-header {{$order->status_id == 1 ? 'bg-success text-white' : ($order->status_id ==2 ? 'bg-warning' : 'bg-light')}}">


                <div class="">


                    شماره سفارش:

                    <span class="persian-num">
            {{$order->id}}
</span>


                </div>

            </div>
            <div class="card-body">

                @include('inc.order.body')

            </div>
            <div class="card-footer bg-light">


                <div dir="rtl" class="row">
                    <div class="col-md-6 order-md-2">


                    </div>
                    <div class="col-md-6 order-md-2">


                        @if ($order->status_id ==2)
                            مبلغ پرداختی:
                            <span class="persian-num">
                                {{$order->transaction->price}}
                                </span>
                            تومان


                            <button class="btn p-3  btn-outline-success shadow-sm"
                                    onclick="event.preventDefault();
                                        document.getElementById('payment-form{{$order->id}}').submit();">
                                <i class="fas fa-money-check mx-2"></i>
                                پرداخت مبلغ و شروع فرایند ترجمه
                            </button>


                            <form id="payment-form{{$order->id}}" method="post"
                                  action="{{route('payment')}}">
                                @csrf

                                <input type="hidden" name="transaction_id" value="{{$order->transaction->id}}">

                            </form>


                        @endif

                    </div>
                </div>


            </div>
        </div>

    </div>
@endsection

<div class="card mb-4 shadow">
    <div
        class="card-header {{$order->status_id == 1 ? 'bg-primary text-white' : ($order->status_id ==2 ? 'bg-info text-white' : ($order->status_id ==3 ? 'bg-success text-white' : 'bg-light'))}}">
        <div dir="rtl" class="">


            کد سفارش:

            <span>
            {{$order->code}}
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
                   {{-- مبلغ پرداختی:
                    <span class="persian-num">
                                {{$order->transaction->price}}
                                </span>
                    تومان


                    <button id="payment" class="btn p-3  btn-success shadow-sm animated"
                            onclick="event.preventDefault();
                                document.getElementById('payment-form{{$order->code}}').submit();">
                        <i class="fas fa-money-check mx-2"></i>
                        پرداخت مبلغ و شروع فرایند ترجمه
                    </button>


                    <form id="payment-form{{$order->code}}" method="post"
                          action="{{route('payment')}}">
                        @csrf

                        <input type="hidden" name="transaction_id" value="{{$order->transaction->id}}">

                    </form>
--}}

                @endif

            </div>
        </div>


    </div>
</div>


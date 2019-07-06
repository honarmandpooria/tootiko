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


                @if ($order->ticket)
                    <a href="{{route('tickets.show',$order->ticket->id)}}" data-toggle="tooltip" data-placement="bottom"
                            title="آیا مشکلی در سفارش شما وجود دارد؟ با پشتیبانی طوطیکو درمیان بگذارید."
                            class="btn btn-warning float-left"><i class="fas fa-headphones-alt mx-2"></i>پشتیبانی
                    </a>
                @else
                    <form method="post" action="{{route('tickets.store')}}">

                        @csrf
                        <button type="submit" data-toggle="tooltip" data-placement="bottom"
                                title="آیا مشکلی در سفارش شما وجود دارد؟ با پشتیبانی طوطیکو درمیان بگذارید."
                                class="btn btn-warning float-left"><i class="fas fa-headphones-alt mx-2"></i>درخواست
                            پشتیبانی
                        </button>

                        <input type="hidden" name="code" value="{{$order->code}}">

                    </form>

                @endif


            </div>
        </div>
    </div>
</div>


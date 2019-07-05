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

                <a data-toggle="tooltip" data-placement="bottom"
                   title="آیا مشکلی در سفارش شما وجود دارد؟ با پشتیبانی طوطیکو درمیان بگذارید." class="btn btn-warning float-left" href="#"><i class="fas fa-headphones-alt mx-2"></i>درخواست
                    پشتیبانی</a>

            </div>
        </div>


    </div>
</div>


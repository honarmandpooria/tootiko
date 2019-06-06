<div dir="rtl" class="row">
    <div class="col-md-12 my-2">

        @if($order->status_id == 1)

            <i class="fas fa-2x fa-hourglass-start text-warning mx-2"></i>

        @elseif($order->status_id == 2)

            <i class="fas fa-2x fa-money-check text-warning mx-2"></i>

        @elseif($order->status_id == 3)

            <i class="fas fa-2x fa-recycle text-success mx-2"></i>

        @else

            <i class="fas fa-2x fa-check text-success mx-2"></i>

        @endif


        وضعیت سفارش:
        {{$order->status->name}}

        <hr>
    </div>
    <div class="col-md-4 col-sm-6 my-2">
        <i class="fas fa-language"></i>
        زبان:
        {{$order->operation->name}}
    </div>
    <div class="col-md-4 col-sm-6 my-2">
        <i class="fas fa-clipboard-list"></i>
        زمینه کلی:
        {{$order->category->name}}
    </div>
    <div class="col-md-4 col-sm-6 my-2">
        <a download="فایل مبدا {{$order->id}}"
           href="{{asset($order->translation_file)}}"
           class="btn  btn-outline-primary"><i
                class="fas fa-download mx-2"></i>دانلود فایل مبدا</a>
    </div>
    <div class="col-md-4 col-sm-6 my-2">
        <i class="fas fa-poll"></i>
        کیفیت ترجمه:
        {{$order->quality->name}}
    </div>
    <div class="col-md-4 col-sm-6 my-2">
        <i class="fas fa-book-reader"></i>
        حق دسترسی:
        {{$order->is_secret == 0 ? 'آزاد' : 'محرمانه'}}
    </div>
    <div class="col-md-4 col-sm-6 my-2">
        تعداد کلمات:

        @if($order->words )
            <span class="persian-num">{{$order->words}} </span>

        @else
            در حال شمارش
        @endif


    </div>
    <div class="col-md-4 col-sm-6 my-2">
        <i class="fas fa-calendar-check"></i>
        زمان ثبت سفارش:
        <span class="translate">
                            {{$order->created_at->diffForHumans()}}
                            </span>
    </div>
    <div class="col-md-4 col-sm-6 my-2">
        <i class="fas fa-hourglass-start"></i>
        مهلت:
        <span class="persian-num">
                            {{$order->remaining_days}}
                            </span>
        روز
    </div>
    <div class="col-md-4 col-sm-6 my-2">


        @if($order->status_id == 4)


            <a download="فایل ترجمه شده" href="{{asset($order->translated_file)}}"
               class="btn btn-success">
                <i class="fas fa-download mx-2"></i>
                دانلود فایل ترجمه شده</a>

        @endif

    </div>
</div>

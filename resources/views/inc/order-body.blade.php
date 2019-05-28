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
        {{--        <i class="fas fa-2x fa-language mx-2"></i>--}}
        زبان:
        {{$order->operation->name}}
    </div>
    <div class="col-md-4 col-sm-6 my-2">
        زمینه کلی:
        {{$order->category->name}}
    </div>
    <div class="col-md-4 col-sm-6 my-2">
        فایل مبدا: <a download="فایل مبدا {{$order->id}}"
                      href="{{Storage::url($order->translation_file)}}"
                      class="btn  btn-outline-primary"><i
                class="fas fa-download mx-2"></i>دانلود</a>
    </div>
    <div class="col-md-4 col-sm-6 my-2">
        کیفیت ترجمه:
        {{$order->quality->name}}
    </div>
    <div class="col-md-4 col-sm-6 my-2">
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
        زمان ثبت سفارش:
        <span class="translate">
                            {{$order->created_at->diffForHumans()}}
                            </span>
    </div>
    <div class="col-md-4 col-sm-6 my-2">
        مهلت:
        <span class="persian-num">
                            {{$order->remaining_days}}
                            </span>
        روز
    </div>
</div>

<div dir="rtl" class="row">
    <div class="col-md-4 my-2 text-center">

        @if($order->status_id == 1)



            <img src="{{asset('images/gifs/waiting-for-translator.gif')}}" alt="">
            <br>

            <h6 class="font-weight-bold text-muted text-center">
                <i class="fas fa-hourglass-start mx-2"></i>
                وضعیت:
                در جستجوی مترجم

            </h6>
        @elseif($order->status_id == 2)
            <img src="{{asset('images/gifs/waiting-for-pay.gif')}}" alt="">
            <br>

            <h6 class="font-weight-bold text-info text-center">
                <i class="fas fa-money-check mx-2"></i>
                وضعیت:
                در انتظار پرداخت

            </h6>

        @elseif($order->status_id == 3)

            <img src="{{asset('images/gifs/translating.gif')}}" alt="">
            <br>

            <h6 class="font-weight-bold text-success text-center mt-2">
                <i class="fas fa-recycle mx-2"></i>
                وضعیت:
                در حال ترجمه

            </h6>

        @else


            <h6 class="font-weight-bold text-muted text-center">
                <i class="fas fa-2x fa-check text-success mx-2"></i>
                وضعیت:
                تحویل داده شده

            </h6>

        @endif


    </div>

    <div class="col-md-4 col-sm-6 my-2">


        <i class="fas fa-2x fa-clipboard-list"></i>
        جزئیات سفارش:
        <hr>

        <div class="mr-3 text-muted">


            <i class="fas fa-user"></i>
            کاربر:
            {{$order->user->name}}
            <br>

            <i class="fas fa-poll"></i>
            کیفیت ترجمه:
            {{$order->quality->name}}
            <br>

            <i class="fas fa-calendar-check"></i>
            زمان ثبت:
            <span class="translate">
                            {{$order->created_at->diffForHumans()}}
                            </span>

            <br>
            <i class="fas fa-hourglass-start"></i>
            مهلت:
            <span class="persian-num">
                            {{$order->remaining_days}}
                            </span>
            روز


        </div>


    </div>


    <div class="col-md-4 col-sm-6 my-2">

        <i class="fas fa-2x fa-file-signature"></i>

        جزئیات فایل:
        <hr>


        <div class="mr-3 text-muted">

            <i class="fas fa-language"></i>
            زبان:
            {{$order->operation->name}}
            <br>
            <i class="fas fa-clipboard-list"></i>
            زمینه کلی:
            {{$order->category->name}}
            <br>
            <i class="fas fa-book-reader"></i>
            حق دسترسی:
            {{$order->is_secret == 0 ? 'آزاد' : 'محرمانه'}}

            <br>

            <i class="fas fa-sort-numeric-up"></i>
            تعداد کلمات:

            @if($order->words )
                <span class="persian-num">{{$order->words}} </span>

            @else
                در حال شمارش
            @endif


        </div>
    </div>

    <hr class="d-block w-100">


    <div class="col-md-4 col-sm-6 my-2">

        @if($order->translation_file)
            <a download="فایل مبدا {{$order->id}}"
               href="{{asset($order->translation_file)}}"
               class="btn  btn-outline-primary"><i
                    class="fas fa-download mx-2"></i>فایل مبدا</a>
        @else
            <a target="_blank"
               href="{{$order->translation_url}}"
               class="btn  btn-outline-primary"><i
                    class="fas fa-download mx-2"></i>
                لینک فایل مبدا</a>

        @endif


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

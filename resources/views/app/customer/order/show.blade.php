@extends('layouts.app')

@section('content')
    <div class="container">

        <h4 class="text-muted font-weight-bolder text-center"><i class="fas fa-book-reader fa-2x mx-2"></i>پیگیری وضعیت
            سفارش</h4>

        @include('inc.order.customer-order')


        @if($order->status_id ==1)
            <div class="card">

                <div class="card-header bg-danger text-white">
                    توجه
                </div>

                <div class="card-body">
                    <p dir="rtl">لطفا منتظر بمانید ... درحال حاضر در حال شمارش کلمات و انتخاب مترجم
                        مناسب برای
                        متن شما هستیم.</p>

                    <p dir="rtl" class="blockquote-footer mt-2">حداکثر تا <span
                            class="text-danger"> ۱۵ دقیقه آینده </span>
                        سفارش شما قیمت گذاری و آماده ترجمه خواهد شد. بعد از گذشت ۱۵ دقیقه میتوانید از صفحه ترجمه های من وضعیت سفارش خود را پیگیری کنید.</p>
                </div>


            </div>

        @endif

    </div>
@endsection


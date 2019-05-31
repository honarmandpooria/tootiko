@component('mail::message')
    سفارش شما با موفقیت ثبت شد!


    به زودی تعداد کلمات شمارش میشوند.
    می توانید از طریق لینک زیر سفارش خود را پیگیری کنید، یا منتظر ایمیل باشید.

    @component('mail::button', ['url' => route('customer-orders.show',$order_id)])
        صفحه نمایش سفارش
    @endcomponent

    با تشکر,<br>
    {{ config('app.name') }}
@endcomponent

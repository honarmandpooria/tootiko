@component('mail::message')
تبریک! ترجمه شما تکمیل شد!

به لینک زیر مراجعه کرده و فایل ترجمه را دانلود کنید.

@component('mail::button', ['url' => route('customer-orders.show',$order->id)])
لینک سفارش شما
@endcomponent

با تشکر,<br>
{{ config('app.name') }}
@endcomponent

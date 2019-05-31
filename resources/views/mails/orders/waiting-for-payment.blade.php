@component('mail::message')
تبریک! یک مترجم برای انجام پروژه شما انتخاب شد.

لطفا به لینک زیر مراجعه کنید و وضعیت سفارش خود را بررسی کنید.

@component('mail::button', ['url' => route('customer-orders.show',$order->id)])
لینک سفارش شما
@endcomponent

با تشکر,<br>
{{ config('app.name') }}
@endcomponent

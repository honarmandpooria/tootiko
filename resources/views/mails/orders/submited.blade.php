@component('mail::message')
پروژه ی شما ثبت شد.

از لینک زیر می توانید وضعیت سفارش خود را بررسی کنید.

@component('mail::button', ['url' => route('customer-orders.show',$order->id)])
لینک بررسی وضعیت سفارش
@endcomponent

با تشکر,<br>
{{ config('app.name') }}
@endcomponent

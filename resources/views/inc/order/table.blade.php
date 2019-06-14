<hr>

<h4 class="mt-5 pb-0" dir="rtl"><i class="fas fa-list mx-3"></i>لیست ترجمه های من</h4>

<div class="mx-md-5">
    <table dir="rtl" class="table table-hover mt-3">
        <thead>
        <tr>
            <th scope="col">کد سفارش</th>
            <th scope="col">وضعیت</th>
            <th scope="col">مشاهده</th>

        </tr>
        </thead>
        <tbody>
        @if(count(Auth::user()->orders) > 0)
            @foreach($orders as $order)

                <tr class="{{$order->status_id == 1 ? 'table-primary' : ($order->status_id == 2 ? 'table-warning' : ($order->status_id == 3 ? 'table-success' : 'table-light'))}}">
                    <th scope="row">{{$order->code}}</th>
                    <td class="translate">{{$order->status->name}}</td>
                    <td>
                        <a href="{{route('customer-orders.show',$order->id)}}"
                           class="btn btn-info rounded-circle shadow"><i class="fas fa-eye text-white"></i></a>
                    </td>

                </tr>

            @endforeach

        @else
            <tr>
                <td>هنوز ترجمه ای توسط شما ثبت نشده است.</td>
            </tr>
        @endif

        </tbody>
    </table>
</div>

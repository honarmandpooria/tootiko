<div class="bg-white rounded shadow py-4 mt-3">


    <div class="mx-md-5">


        @if(count(Auth::user()->orders) > 0)

            <h4 class="mt-3 pb-0" dir="rtl"><i class="fas fa-list mx-3"></i>لیست ترجمه های من</h4>

            <table dir="rtl" class="table table-hover mt-3">
                <thead>
                <tr>
                    <th scope="col">زمان ثبت</th>
                    <th scope="col">وضعیت</th>
                    <th scope="col">مشاهده</th>

                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)

                    <tr class="{{$order->status_id == 1 ? 'table-danger' : ($order->status_id == 2 ? 'table-warning' : ($order->status_id == 3 ? 'table-success' : 'table-light'))}}">
                        <td>{{$order->created_at->diffForHumans()}}</td>
                        <td class="translate">{{$order->status->name}}</td>
                        <td>
                            <a href="{{route('customer-orders.show',$order->id)}}"
                               class="btn btn-info rounded-circle shadow"><i class="fas fa-eye text-white"></i></a>
                        </td>

                    </tr>
                </tbody>
            </table>
            @endforeach

        @else



            <div class="text-center">
                <p dir="rtl" class="text-center">هنوز ترجمه ای توسط شما ثبت نشده است. روی <a class="text-success"
                                                                                             href="{{route('customer-orders.create')}}">این
                        لینک</a> کنید تا یک ترجمه
                    ثبت کنید. شمارش کلمات و برآورد قیمت برای شما رایگان است!</p>
                <img class="img-fluid" src="{{asset('images/tootiko/park.png')}}" alt="">


            </div>



        @endif


    </div>

</div>

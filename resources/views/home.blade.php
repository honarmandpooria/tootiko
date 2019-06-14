@extends('layouts.app')

@section('content')
    <div class="container">

        <a href="{{route('customer-orders.create')}}" class="btn btn-success btn-block shadow"><i
                class="fas mx-2 fa-plus"></i>ثبت
            سفارش ترجمه</a>


        <div dir="rtl" class="row mt-3">


            @if(count($orders->where('status_id',2)))
                <div class="col-md-3 mb-2">

                    <div class="card bg-warning border-warning shadow">

                        <div class="card-body">
                            <i class="fas fa-money-check fa-2x ml-2"></i>
                            در انتظار پرداخت:
                            <span class="persian-num font-weight-bolder mx-3" style="font-size: 1.5rem;">
                            {{count($orders->where('status_id',2))}}
                        </span>
                        </div>

                       {{-- <div class="card-body bg-light rounded-bottom text-center">

                            <a href="{{route('get-order-with-status',2)}}" class="text-info">
                                <i class="fas fa-eye"></i>
                                مشاهده
                            </a>


                        </div>--}}
                    </div>


                </div>
            @endif


            @if(count($orders->where('status_id',1)))
                <div class="col-md-3 mb-2">

                    <div class="card border-primary bg-primary shadow">

                        <div class="card-body text-white">
                            <i class="fas fa-recycle fa-2x ml-2"></i>
                            درحال بررسی:
                            <span class="persian-num font-weight-bolder mx-3" style="font-size: 1.5rem;">
                            {{count($orders->where('status_id',1))}}
                        </span>
                        </div>

                   {{--     <div class="card-body bg-light rounded-bottom text-center">

                            <a href="{{route('get-order-with-status',1)}}">
                                <i class="fas fa-eye"></i>
                                مشاهده
                            </a>


                        </div>--}}
                    </div>


                </div>
            @endif



            @if(count($orders->where('status_id',3)))
                <div class="col-md-3 mb-2">

                    <div class="card border-success bg-success shadow">

                        <div class="card-body text-white">
                            <i class="fas fa-pen-alt fa-2x ml-2"></i>
                            درحال ترجمه:
                            <span class="persian-num font-weight-bolder mx-3" style="font-size: 1.5rem;">
                            {{count($orders->where('status_id',3))}}
                        </span>
                        </div>

                      {{--  <div class="card-body bg-light rounded-bottom text-center">

                            <a href="{{route('get-order-with-status',3)}}" class="text-success">
                                <i class="fas fa-eye"></i>
                                مشاهده
                            </a>


                        </div>--}}
                    </div>


                </div>
            @endif


            @if(count($orders->where('status_id',4)))
                <div class="col-md-3 mb-2">

                    <div class="card bg-light shadow">

                        <div class="card-body ">
                            <i class="fas fa-check fa-2x ml-2 text-success"></i>
                            ترجمه شده:
                            <span class="persian-num font-weight-bolder mx-3 " style="font-size: 1.5rem;">
                            {{count($orders->where('status_id',4))}}
                        </span>
                        </div>
{{--
                        <div class="card-body bg-white rounded-bottom text-center">

                            <a href="{{route('get-order-with-status',4)}}" class="text-dark">
                                <i class="fas fa-eye"></i>
                                مشاهده
                            </a>


                        </div>--}}
                    </div>


                </div>
            @endif


        </div>


        @if(Auth::user()->orders())

            <hr>

            <h4 class="mt-5 pb-0" dir="rtl"><i class="fas fa-list mx-3"></i>لیست ترجمه های من</h4>

            <div class="mx-md-5">
                <table dir="rtl" class="table table-hover mt-3">
                    <thead>
                    <tr>
                        <th scope="col">سفارش</th>
                        <th scope="col">وضعیت</th>
                        <th scope="col">مشاهده</th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($orders as $order)

                        <tr class="{{$order->status_id == 1 ? 'table-primary' : ($order->status_id == 2 ? 'table-warning' : ($order->status_id == 3 ? 'table-success' : 'table-light'))}}">
                            <th scope="row">{{$order->id}}</th>
                            <td class="translate">{{$order->status->name}}</td>
                            <td>
                                <a href="{{route('customer-orders.show',$order->id)}}"
                                   class="btn btn-info rounded-circle shadow"><i class="fas fa-eye text-white"></i></a>
                            </td>

                        </tr>

                    @endforeach


                    </tbody>
                </table>
            </div>
        @endif

    </div>

@endsection

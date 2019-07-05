@extends('layouts.app')

@section('content')
    <div class="container">

        <a href="{{route('customer-orders.create')}}" class="btn btn-success btn-block shadow"><i
                class="fas mx-2 fa-plus"></i>ثبت
            سفارش ترجمه</a>


        <div dir="rtl" class="row mt-3">


            @if(count($orders->where('status_id',2)))
                <div class="col-md-3 mb-2">

                    <a class="text-dark" href="{{route('customer-orders.show',$orders->where('status_id',2)->first()->id)}}" style="text-decoration: none;">
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
                    </a>


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


        @include('inc.order.table')

    </div>

@endsection

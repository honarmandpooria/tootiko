@extends('layouts.admin')

@section('content')
    <div class="container p-4">


        <div dir="rtl" class="row text-center">


            <div class="col-md-12 mb-3">
                <a href="{{route('admin-orders.index')}}" class="btn btn-success btn-block"><i
                        class="fas mx-2 fa-eye"></i>سفارش ها</a>
            </div>


            <div class="col-md-4">
                تعداد سفارشات در حال انتظار:
                {{count($orders->where('status_id',1))}}
            </div>


            <div class="col-md-4">
                تعداد سفارشات منتظر پرداخت:
                {{count($orders->where('status_id',2))}}
            </div>

            <div class="col-md-4">
                تعداد سفارشات جاری:
                {{count($orders->where('status_id',3))}}
            </div>


        </div>

    </div>
@endsection

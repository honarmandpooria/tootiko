@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="mx-md-5">
            <a href="{{route('trashed-orders')}}"
               class="btn btn-info shadow"><i class="fas fa-eye mx-2"></i> نمایش سفارش های حذف شده </a>
            <table dir="rtl" class="table table-hover mt-3">
                <thead>
                <tr>
                    <th scope="col">سفارش</th>
                    <th scope="col">زمان ثبت</th>
                    <th scope="col">وضعیت</th>
                    <th scope="col">مشاهده</th>

                </tr>
                </thead>
                <tbody>

                @foreach($orders as $order)

                    <tr class="{{$order->status_id == 1 ? 'table-primary' : ($order->status_id == 2 ? 'table-warning' : ($order->status_id == 3 ? 'table-success' : 'table-light'))}}">
                        <th scope="row">{{$order->code}}</th>
                        <td>{{$order->created_at->diffForHumans()}}</td>
                        <td class="translate">{{$order->status->name}}</td>
                        <td>
                            <a href="{{route('admin-orders.edit',$order->id)}}"
                               class="btn btn-warning rounded-circle shadow"><i class="fas fa-eye"></i></a>
                        </td>

                    </tr>

                @endforeach


                </tbody>
            </table>
        </div>

    </div>
@endsection



@extends('layouts.app')





@section('content')
    <div class="container">


        @if(count($orders))
            <table dir="rtl" class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">سفارش</th>
                    <th scope="col">زمان</th>
                    <th scope="col">مشاهده</th>

                </tr>
                </thead>
                <tbody>

                @foreach($orders as $order)

                    <tr>
                        <th scope="row">{{$order->id}}</th>
                        <td class="translate">{{$order->created_at->diffForHumans()}}</td>
                        <td>
                            <a href="{{route('customer-orders.show',$order->id)}}" class="btn btn-info rounded-circle shadow"><i class="fas fa-eye text-white"></i></a>
                        </td>

                    </tr>

                @endforeach



                </tbody>
            </table>

        @else
{{--            <p class="text-center" dir="rtl">هیچ سفارش ترجمه ای ثبت نشده است.</p>--}}
            <a href="{{route('customer-orders.create')}}" class="btn btn-success btn-block shadow"><i
                    class="fas mx-2 fa-plus"></i>ثبت
                سفارش ترجمه</a>
        @endif


    </div>
@endsection


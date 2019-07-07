@extends('layouts.app')



@section('content')


    <div class="container bg-white shadow-sm rounded p-3 my-3">


        <div class="row">
            <div class="col-md-6 text-center">

                <img style="max-width: 275px;" class="img-fluid rounded shadow-sm"
                     src="{{asset('images/tootiko/contact.jpg')}}" alt="">


            </div>
            <div dir="rtl" class="col-md-6">
                <h6 class="text-muted my-3"><i class="fas fa-headphones-alt text-success mx-3 fa-2x"></i>درخواست
                    پشتیبانی در رابطه با سفارش با کد
                    <span>{{$ticket->order->code}}</span>:</h6>

                <p><i class="fas fa-user text-success mx-3"></i>نام: <span>{{$ticket->order->user->name}}</span></p>
                <p><i class="fas fa-link text-success mx-3"></i>لینک سفارش: <a target="_blank"
                                                                               href="{{route('customer-orders.show',$ticket->order->id)}}">باز
                        کردن در پنجره جدید</a></p>

            </div>

        </div>


        @include('global.ticket.form')


        {{--        MESSAGES--}}

        @include('global.ticket.messages')

    </div>



@endsection

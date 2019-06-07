@extends('layouts.app')




@section('styles')

    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">

@endsection


@section('content')
    <div class="container">


        @if(count($orders))
            @foreach($orders as $order)

                @include('inc.order.customer-order')

            @endforeach

        @else
            <p class="text-center" dir="rtl">هیچ سفارش ترجمه ای ثبت نشده است.</p>
            <a href="{{route('customer-orders.create')}}" class="btn btn-success btn-block shadow"><i
                    class="fas mx-2 fa-plus"></i>ثبت
                سفارش ترجمه</a>
        @endif


    </div>
@endsection


@section('scripts')


    <script>


        function doAnimation(id, animName, duration, delay) {
            var el = document.getElementById(id);
            var timer;

            function addClass() {
                el.classList.add(animName);
            }

            function removeClass() {
                el.classList.remove(animName);
            }

            setInterval(function () {
                clearTimeout(timer);
                addClass();
                timer = setTimeout(removeClass, duration);
            }, duration + delay);
        }

        doAnimation('payment', 'flash', 1000, 3000);


        $('#payment').hover(function () {
            $(this).toggleClass('animated');
        })


    </script>



@endsection

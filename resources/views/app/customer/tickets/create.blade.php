@extends('layouts.app')



@section('content')

    <div class="text-center">
        <img class="img-fluid" src="{{asset('images/tootiko/contact.jpg')}}" alt="">
    </div>


    <div class="container">
        <h3>درخواست پشتیبانی در رابطه با سفارش با کد <span></span>:</h3>
        <div class="row">
            <div class="col-md-6">

            </div>
            <div class="col-md-6">
                <form method="post" action="{{route('tickets.store')}}">
                    @csrf
                    @method('post')
                    <textarea name="message" id="message" rows="10">

                </textarea>
                </form>
            </div>
        </div>
    </div>



@endsection

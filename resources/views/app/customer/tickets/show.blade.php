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


        <form class="mt-3" dir="rtl" method="post" action="{{route('messages.store')}}">
            @csrf
            @method('post')
            <input name="code" type="hidden" value="{{$ticket->order->code}}">
            <div class="form-group">
                <label class="mr-4" for="message">پیام:</label>
                <textarea placeholder="لطفا پیام خود را اینجا وارد کنید..." name="message" id="message" rows="3"
                          class="form-control" style="width: 100%;"></textarea>
            </div>
            <button class="btn btn-success" type="submit">ارسال</button>
        </form>


        {{--        MESSAGES--}}

        <hr class="border-success">

        @foreach($messages as $message)

            <div dir="rtl" class="card mb-2 rounded-0 {{Auth::user()->id === 1 ? 'mr-5' : 'ml-5'}}">
                <div class="card-header text-white rounded-0 {{Auth::user()->id === 1 ? 'bg-success' : 'bg-light'}}">

                    @if(Auth::user()->id === 1)
                      <span><i class="fas fa-headphones-alt ml-2"></i>پشتیبانی طوطیکو</span>
                    @else
                        {{$ticket->user->name}}
                    @endif

                    <span dir="rtl" class="float-left">{{$message->created_at->diffForHumans()}}</span>
                </div>
                <div class="card-body rounded-0">{{$message->message}}</div>
            </div>

        @endforeach
    </div>



@endsection

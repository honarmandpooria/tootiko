@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="mx-md-5">
            <a href="#"
               class="btn btn-info shadow"><i class="fas fa-trash mx-2"></i> زباله دان </a>


            <table dir="rtl" class="table table-hover mt-3">
                <thead>
                <tr>
                    <th scope="col">تیکت</th>
                    <th scope="col">کاربر</th>
                    <th scope="col">آپدیت</th>
                    <th scope="col">آخرین پیام</th>
                    <th scope="col">مشاهده</th>

                </tr>
                </thead>
                <tbody>

                @foreach($tickets as $ticket)

                    <tr class="{{$ticket->order->status_id == 1 ? 'table-primary' : ($ticket->order->status_id == 2 ? 'table-warning' : ($ticket->order->status_id == 3 ? 'table-success' : 'table-light'))}}">
                        <th scope="row">{{$ticket->order->code}}</th>
                        <th scope="row">{{$ticket->user->name}}</th>
                        <td class="translate">{{$ticket->messages()->get()->last() ? $ticket->messages()->get()->last()->created_at->diffForHumans() : 'بدون پیام'}}</td>
                        <td class="translate">{{$ticket->messages()->get()->last() ? $ticket->messages()->get()->last()->user->name : 'بدون پیام'}}</td>
                        <td>
                            <a href="{{route('admin-tickets.show',$ticket->id)}}"
                               class="btn btn-warning rounded-circle shadow"><i class="fas fa-eye"></i></a>
                        </td>

                    </tr>

                @endforeach


                </tbody>
            </table>
        </div>

    </div>
@endsection



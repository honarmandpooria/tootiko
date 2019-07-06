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
                    <th scope="col">زمان ثبت</th>
                    <th scope="col">وضعیت</th>
                    <th scope="col">مشاهده</th>

                </tr>
                </thead>
                <tbody>

                @foreach($tickets as $ticket)

                    <tr class="{{$ticket->order->status_id == 1 ? 'table-primary' : ($ticket->order->status_id == 2 ? 'table-warning' : ($ticket->order->status_id == 3 ? 'table-success' : 'table-light'))}}">
                        <th scope="row">{{$ticket->order->code}}</th>
                        <td>{{$ticket->created_at->diffForHumans()}}</td>
                        <td class="translate">#</td>
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



@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="mx-md-5">
            <table dir="rtl" class="table table-hover mt-3">
                <thead>
                <tr>
                    <th scope="col">سفارش</th>
                    <th scope="col">زمان حذف</th>
                    <th scope="col">بازیابی</th>

                </tr>
                </thead>
                <tbody>

                @foreach($orders as $order)

                    <tr>
                        <th scope="row">{{$order->code}}</th>
                        <td>{{$order->deleted_at->diffForHumans()}}</td>
                        <td>
                            <form method="post" action="{{route('restore-order',$order->id)}}">
                                @csrf
                                @method('put')
                                <button class="btn btn-warning rounded-circle shadow" type="submit"><i
                                        class="fas fa-trash-restore-alt"></i>
                                </button>
                            </form>

                        </td>

                    </tr>

                @endforeach


                </tbody>
            </table>
        </div>

    </div>
@endsection




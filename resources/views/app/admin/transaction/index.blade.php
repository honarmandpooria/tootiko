@extends('layouts.admin')

@section('content')
    <div class="container">
        @foreach($transactions as $transaction)


            <div class="card mb-3 border-dark">

                <div class="card-header">
                    <div dir="rtl" class="row">
                        <div class="col-md-4 order-md-2">
                            کد سفارش:
                            {{$transaction->order->code}}

                        </div>
                        <div class="col-md-4 order-md-2">
                            نام مشتری:
                            {{$transaction->order->user->name}}

                        </div>
                        <div class="col-md-4 order-md-2">

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div dir="rtl" class="row">
                        <div class="col-md-4">
                            وضعیت فاکتور:

                            @if($transaction->isPaid == 0)

                                <span class="text-danger">پرداخت نشده</span> <i
                                    class="fas fa-times text-danger mx-2"></i>

                            @else

                                <span class="text-success">پرداخت شده</span><i
                                    class="fas fa-check text-success mx-2"></i>

                            @endif


                        </div>

                        <div class="col-md-2">
                            عالی:
                            <span class="persian-num">
                                {{$transaction->quality_1_price}}
                                </span>
                        </div>

                        <div class="col-md-2">
                            متوسط:
                            <span class="persian-num">
                                {{$transaction->quality_2_price}}
                                </span>
                        </div>

                        <div class="col-md-2">
                            معمولی:
                            <span class="persian-num">
                                {{$transaction->quality_3_price}}
                            </span>
                        </div>

                    </div>
                </div>

                <div class="card-footer">

                    <button data-toggle="modal" data-target="#{{'text' . $transaction->id}}"
                            class="btn btn-warning float-left"><i class="fas fa-edit"></i></button>


                    <div dir="rtl" class="modal fade" id="{{'text' . $transaction->id}}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="post" action="{{route('transactions.update',$transaction->id)}}">
                                @csrf
                                @method('put')
                                <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">ویرایش صورت حساب</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label for="text{{$transaction->order->code}}"></label>
                                            <div class="form-group">
                                                <label for="custom_price">انتخاب قیمت برای کیفیت های عالی - خوب - معمولی
                                                    به ترتیب </label>
                                                <input style="width: 200px;" id="custom_price" name="quality_1_price"
                                                       type="number"
                                                       class="form-control mb-2"
                                                       value="{{$transaction->quality_1_price}}">

                                                <input style="width: 200px;" id="custom_price" name="quality_2_price"
                                                       type="number"
                                                       class="form-control mb-2"
                                                       value="{{$transaction->quality_2_price}}">

                                                <input style="width: 200px;" id="custom_price" name="quality_3_price"
                                                       type="number"
                                                       class="form-control mb-2"
                                                       value="{{$transaction->quality_3_price}}">


                                            </div>
                                        </div>

                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-warning">ذخیره</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>


        @endforeach
    </div>
@endsection



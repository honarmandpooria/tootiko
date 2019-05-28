@extends('layouts.admin')

@section('content')
    <div class="container">


        @if($order->words && !$order->transaction)
            <div class="card my-3">
                <div class="card-header bg-danger text-white">
                    <h4>ایجاد صورت حساب</h4>
                </div>
                <div dir="rtl" class="card-body">

                    <p class="text-danger">هنوز صورت حسابی برای پرداخت مشتری ایجاد نشده است!</p>

                    <form method="post" action="{{route('transactions.store')}}" enctype="multipart/form-data">
                        @csrf
                        <p>ایجاد صورت حساب با توجه به تعداد کلمات و کیفیت درخواستی

                            <span class="persian-num">
                            {{$order->words * ($order->quality->price_factor) * ($order->operation->price_factor)}}
                            </span>
                            تومان شده است.

                        </p>
                        <input name="order_id" type="hidden" value="{{$order->id}}">

                        <div class="form-group">
                            <label for="custom_price">تغییر قیمت انتخابی</label>
                            <input style="width: 200px;" id="custom_price" name="price" type="number"
                                   class="form-control"
                                   value="{{$order->words * ($order->quality->price_factor) * ($order->operation->price_factor)}}">


                        </div>

                        <button class="btn btn-success my-3" type="submit">ایجاد صورت حساب</button>
                    </form>
                </div>

            </div>



        @endif
        <div class="card mb-4">
            <div class="card-header text-white bg-warning text-dark">
                @include('inc.order.header')
            </div>
            <div class="card-body">

                @include('inc.order.body')


            </div>


            <div dir="rtl" class="card-footer">

                توضیحات مشتری:
                {{$order->description}}

            </div>
        </div>


        <div class="bg-white rounded shadow p-4">
            <h3 class="text-muted">آماده سازی سفارش</h3>
            <hr class="my-5 border-warning">


            <form method="post" action="{{route('admin-orders.update',$order->id)}}" enctype="multipart/form-data">

                @method('put')
                @csrf


                <div dir="rtl" class="row">
                    {{--<div class="col-md-6 ">
                        <div class="form-group">
                            <select class="custom-select" name="status_id" id="status">
                                <option value="1" {{$order->status_id== 1 ? 'selected' : ''}}>در انتظار مترجم</option>
                                <option value="2" {{$order->status_id== 2 ? 'selected' : ''}}>در انتظار پرداخت</option>
                                <option value="3" {{$order->status_id== 3 ? 'selected' : ''}}>در حال ترجمه</option>
                                <option value="4" {{$order->status_id== 4 ? 'selected' : ''}}>تحویل داده شده</option>
                            </select>
                        </div>

                    </div>--}}
                    <div class="col-md-6 ">
                        <div class="form-group">

                            <label class="col-form-label" for="words">تعداد کلمات</label>
                            <input id="words" class="form-control" type="number" name="words"
                                   value="{{old('words',$order->words)}}">

                        </div>
                    </div>


                    @if($order->status_id == 3 or $order->status_id == 4)

                        <div class="col-md-6 ">

                            <p>انتخاب فایل نهایی ترجمه</p>
                            <div class="custom-file form-group">
                                <label class="custom-file-label text-left" for="file-upload">انتخاب فایل</label>
                                <input id="file-upload" name="translated_file" class="custom-file-input" type="file">
                            </div>

                        </div>

                    @endif

                </div>
                <button class="btn btn-warning my-3" type="submit">ثبت تغییرات</button>
            </form>
        </div>


    </div>
@endsection

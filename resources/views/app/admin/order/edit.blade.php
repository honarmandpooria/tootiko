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
                        <p>ایجاد صورت حساب با توجه به تعداد کلمات و کیفیت درخواستی</p>
                        <input name="order_id" type="hidden" value="{{$order->id}}">
                        <button class="btn btn-success my-3" type="submit">ایجاد صورت حساب</button>
                    </form>
                </div>
            </div>



        @endif
        <div class="card mb-4 border border-warning">
            <div class="card-header text-white bg-warning text-dark">
                <div class="card-title">

                    <div dir="rtl" class="row">
                        <div class="col-md-6 order-md-2">
                            <i class="far fa-2x fa-clipboard ml-2"></i>
                            شماره سفارش:
                            {{$order->id}}
                        </div>
                        <div class="col-md-6 order-md-2">
                            کاربر:
                            {{$order->user->name}}
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <div dir="rtl" class="row">
                    <div class="col-md-6 my-2">
                        <i class="fas fa-2x fa-bell text-warning mx-2"></i>
                        وضعیت سفارش:
                        {{$order->status->name}}
                    </div>
                    <div class="col-md-6 my-2">
                        <i class="fas fa-2x fa-language mx-2"></i>
                        زبان:
                        {{$order->operation->name}}
                    </div>
                    <div class="col-md-6 my-2">
                        زمینه کلی:
                        {{$order->category->name}}
                    </div>
                    <div class="col-md-6 my-2">
                        فایل مبدا: <a download="فایل مبدا {{$order->id}}"
                                      href="{{Storage::url($order->translation_file)}}"
                                      class="btn  btn-outline-warning"><i
                                class="fas fa-download mx-2"></i>دانلود</a>
                    </div>
                    <div class="col-md-6 my-2">
                        کیفیت ترجمه:
                        {{$order->quality->name}}
                    </div>
                    <div class="col-md-6 my-2">
                        حق دسترسی:
                        {{$order->is_secret == 0 ? 'آزاد' : 'محرمانه'}}
                    </div>
                    <div class="col-md-6 my-2">
                        زمان ثبت سفارش:
                        {{$order->created_at}}
                    </div>
                    <div class="col-md-6 my-2">
                        مهلت:
                        {{$order->remaining_days}}
                    </div>
                </div>
            </div>
            <div dir="rtl" class="card-footer bg-white">

                <div class="row">
                    @if($order->status_id == 1)

                        <div class="col-md-6 order-md-2">

                            <p class="card-text">منتظر شمارش کلمات</p>

                        </div>

                    @elseif ($order->status_id ==2)

                        <div class="col-md-6 order-md-2">
                            مبلغ پرداختی:
                            <span class="persian-num">
                                {{$order->transaction->price}}
                                </span>
                            تومان

                        </div>





                    @endif

                    <div class="col-md-6 order-md-1">

                        تعداد کلمات:
                        <span class="persian-num">
                        {{$order->words}}
                        </span>

                    </div>
                </div>
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
                    <div class="col-md-6 ">

                        <p>انتخاب فایل نهایی ترجمه</p>
                        <div class="custom-file form-group">
                            <label class="custom-file-label text-left" for="file-upload">انتخاب فایل</label>
                            <input id="file-upload" name="translated_file" class="custom-file-input" type="file">
                        </div>

                    </div>

                </div>
                <button class="btn btn-warning my-3" type="submit">ثبت تغییرات</button>
            </form>
        </div>




    </div>
@endsection

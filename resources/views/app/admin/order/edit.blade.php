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
                        <p>ایجاد صورت حساب با توجه به تعداد کلمات

                            به صورت زیر محاسبه شده است:
                        </p>
                        <input name="order_id" type="hidden" value="{{$order->id}}">

                        <div class="form-group">
                            <label for="custom_price">انتخاب قیمت برای کیفیت های عالی - خوب - معمولی به ترتیب </label>
                            <input style="width: 200px;" id="custom_price" name="quality_1_price" type="number"
                                   class="form-control mb-2"
                                   value="{{$order->words * ($qualities[0]->price_factor) * ($order->operation->price_factor)}}">

                            <input style="width: 200px;" id="custom_price" name="quality_2_price" type="number"
                                   class="form-control mb-2"
                                   value="{{$order->words * ($qualities[1]->price_factor) * ($order->operation->price_factor)}}">

                            <input style="width: 200px;" id="custom_price" name="quality_3_price" type="number"
                                   class="form-control mb-2"
                                   value="{{$order->words * ($qualities[2]->price_factor) * ($order->operation->price_factor)}}">


                        </div>

                        <button class="btn btn-success my-3" type="submit">ایجاد صورت حساب</button>
                    </form>
                </div>

            </div>



        @endif
        <div class="card mb-4">
            <div class="card-header text-white bg-warning text-dark">
                {{--                @include('inc.order.header')--}}
            </div>
            <div class="card-body">


                <p>توضیحات مشتری: {{$order->description}}</p>

                @include('inc.order.body')


            </div>


            <div class="card-footer">

                <button data-toggle="modal" data-target="#{{'text' . $order->id}}"
                        class="btn btn-warning float-left"><i class="fas fa-edit"></i></button>


                <div dir="rtl" class="modal fade" id="{{'text' . $order->id}}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="post" action="{{route('admin.order.detail.update',$order->id)}}">
                            @csrf
                            @method('put')
                            <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">ویرایش سفارش</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">

                                    <div class="form-group">

                                        <select name="operation_id"
                                                class="custom-select {{$errors->has('operation_id') ? 'is-invalid': ($errors->all() ? 'is-valid' : '')}}">
                                            <option value="">نوع ترجمه</option>
                                            <option value="1" {{($order->operation_id == 1 ? "selected":"")}}>انگلیسی به
                                                فارسی
                                            </option>
                                            <option value="2" {{($order->operation_id == 2 ? "selected":"")}}>فارسی به
                                                انگلیسی
                                            </option>
                                        </select>


                                    </div>

                                    <div class="form-group col-md-6 ">
                                        <select name="category_id"
                                                class="custom-select {{$errors->has('category_id') ? 'is-invalid': ($errors->all() ? 'is-valid' : '')}}">
                                            <option value="">انتخاب زمینه</option>
                                            <option value="1" {{$order->category_id == 1 ? "selected":""}}>عمومی
                                            </option>
                                            <option value="2" {{($order->category_id == 2 ? "selected":"")}}>مهندسی
                                            </option>
                                            <option value="3" {{($order->category_id == 3 ? "selected":"")}}>پزشکی
                                            </option>
                                            <option value="3" {{($order->category_id == 4 ? "selected":"")}}>انسانی
                                            </option>
                                        </select>
                                        <div class="invalid-feedback">
                                            @if ($errors->has('category_id'))

                                                {{$errors->first('category_id')}}

                                            @endif

                                        </div>

                                    </div>

                                    <div class="form-group clearfix position-relative">

                                        <label for="remaining_days">مهلت ترجمه (روز):</label>
                                        <input data-toggle="tooltip" data-placement="bottom"
                                               title="چند روز برای انجام ترجمه مهلت دارید؟"
                                               id="remaining_days" type="number" name="remaining_days"
                                               value="{{$order->remaining_days}}"
                                               class="form-control {{$errors->has('remaining_days') ? 'is-invalid': ($errors->all() ? 'is-valid' : '')}}"
                                               style="max-width: 100px">


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


        <button class="btn btn-danger float-left my-3" data-toggle="modal" data-target="#delete"><i
                class="fas fa-times mx-2"></i>حذف سفارش
        </button>


    </div>

    <div class="modal" id="delete" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div dir="rtl" class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="exampleModalLongTitle">آیا از حذف این سفارش مطمئن هستید؟</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('admin-orders.destroy', $order->id)}}">
                        @method('delete')
                        <button dir="rtl" class="btn btn-warning my-3" type="submit">بله مطمئن هستم، سفارش را حذف کن.
                        </button>

                        @csrf
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection

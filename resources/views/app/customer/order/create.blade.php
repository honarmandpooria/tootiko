@extends('layouts.app')

@section('content')


    <div class="container">


        <div class="row">

            <div class=" col-md-8 offset-md-2">


                <div class="bg-white shadow rounded p-4">

                    @if($errors -> all())

                        <div dir="rtl" class="alert alert-danger" role="alert">
                            لطفا مواردی که با رنگ قرمز مشخص شده اند را تصحیح کنید.
                        </div>

                    @endif

                    <form novalidate method="POST" enctype="multipart/form-data"
                          action="{{route('customer-orders.store')}}">
                        @csrf

                        {{--language and category--}}

                        <h4 dir="rtl" class="text-right mb-4 text-muted"><span
                                class="font-weight-bold text-primary">۱)</span>
                            انتخاب زبان و زمینه ترجمه</h4>
                        <div dir="rtl" class="row">

                            <div class="form-group col-md-6">
                                <select name="operation_id"
                                        class="custom-select {{$errors->has('operation_id') ? 'is-invalid': ($errors->all() ? 'is-valid' : '')}}">
                                    <option value="">انتخاب زبان</option>
                                    <option value="1" selected {{(old("operation_id") == 1 ? "selected":"")}}>انگلیسی به فارسی
                                    </option>
                                    <option value="2" {{(old("operation_id") == 2 ? "selected":"")}}>فارسی به انگلیسی
                                    </option>
                                </select>
                                <div class="invalid-feedback">
                                    @if ($errors->has('operation_id'))

                                        {{$errors->first('operation_id')}}

                                    @endif

                                </div>

                            </div>


                            <div class="form-group col-md-6 ">
                                <select name="category_id"
                                        class="custom-select {{$errors->has('category_id') ? 'is-invalid': ($errors->all() ? 'is-valid' : '')}}">
                                    <option value="">انتخاب زمینه</option>
                                    <option value="1" selected {{(old("category_id") == 1 ? "selected":"")}}>عمومی
                                    </option>
                                    <option value="2" {{(old("category_id") == 2 ? "selected":"")}}>مهندسی</option>
                                    <option value="3" {{(old("category_id") == 3 ? "selected":"")}}>پزشکی</option>
                                    <option value="3" {{(old("category_id") == 4 ? "selected":"")}}>انسانی</option>
                                </select>
                                <div class="invalid-feedback">
                                    @if ($errors->has('category_id'))

                                        {{$errors->first('category_id')}}

                                    @endif

                                </div>

                            </div>


                        </div>

                        <hr class=" border-primary my-5">


                        {{--upload file--}}


                        <h4 dir="rtl" class=" text-right mb-4 text-muted"><span
                                class="font-weight-bold text-primary">۲)</span>
                            انتخاب فایل ترجمه</h4>


                        <div dir="rtl" class="custom-file">
                            <input required id="file-upload" name="translation_file" type="file"
                                   class="custom-file-input {{$errors->has('translation_file') ? 'is-invalid': ($errors->all() ? 'is-invalid' : '')}}"
                                   style="cursor:pointer">
                            <label for="file-upload" class="custom-file-label text-left">فایل ترجمه</label>
                            <div class="invalid-feedback">


                                @if ($errors->has('translation_file'))

                                    {{$errors->first('translation_file')}}

                                @else
                                    فایل موردنظر را دوباره انتخاب کنید.

                                @endif

                            </div>
                        </div>
                        <p dir="rtl" class="blockquote-footer mt-2">در صورتی که <span class="text-danger"> بیش از یک فایل</span>
                            برای ترجمه دارید، آنها را به صورت زیپ در بیاورید و سپس فایل زیپ را آپلود کنید.</p>


                        <hr class=" border-primary my-5">

                        {{--quality radio--}}


                        <h4 dir="rtl" class=" text-right mb-4 text-muted"><span
                                class="font-weight-bold text-primary">۳)</span>
                            انتخاب کیفیت نهایی</h4>
                        <div dir="rtl" class="text-center">
                            <div class="custom-control form-control-lg custom-radio custom-control-inline">
                                <input type="radio" name="quality_id" value="1" id="radio1"
                                       class="custom-control-input {{$errors->all() ? 'is-valid' : ''}}">
                                <label for="radio1" class="custom-control-label">کیفیت معمولی</label>
                            </div>

                            <div class="custom-control form-control-lg custom-radio custom-control-inline">
                                <input type="radio" name="quality_id" value="2" id="radio2"
                                       class="custom-control-input {{$errors->all() ? 'is-valid' : ''}}" checked>
                                <label for="radio2" class="custom-control-label">کیفیت خوب</label>
                            </div>

                            <div class="custom-control form-control-lg custom-radio custom-control-inline">
                                <input type="radio" name="quality_id" value="3" id="radio3"
                                       class="custom-control-input {{$errors->all() ? 'is-valid' : ''}}">
                                <label for="radio3" class="custom-control-label">کیفیت عالی</label>
                            </div>

                        </div>


                        <hr class=" border-primary my-5">


                        {{--Access Rights--}}


                        <h4 dir="rtl" class=" text-right mb-4 text-muted"><span
                                class="font-weight-bold text-primary">۴)</span>
                            انتخاب حق دسترسی</h4>

                        <div dir="rtl" class="text-center">
                            <div class="custom-control custom-radio form-control-lg custom-control-inline">
                                <input type="radio" name="is_secret" value="0" id="radio4"
                                       class="custom-control-input {{$errors->has('is_secret') ? 'is-invalid': ($errors->all() ? 'is-valid' : '')}}"
                                       checked>
                                <label for="radio4" class="custom-control-label">آزاد</label>
                            </div>

                            <div class="custom-control custom-radio form-control-lg custom-control-inline">
                                <input type="radio" name="is_secret" value="1" id="radio5"
                                       class="custom-control-input {{$errors->has('is_secret') ? 'is-invalid': ($errors->all() ? 'is-valid' : '')}}">
                                <label for="radio5" class="custom-control-label">محرمانه</label>
                            </div>


                        </div>

                        <p dir="rtl" class="blockquote-footer mt-2 mb-0">این بخش مربوط به کسانی است که میخواهند متن
                            ترجمه آن ها فاش نشود. </p>
                        <p dir="rtl" class="blockquote-footer">این نوع ترجمه فقط توسط <span class="text-success">مترجمین مورد اعتماد طوطیکو</span>
                            انجام خواهد شد.</p>
                        <hr class=" border-primary my-5">


                        {{--Time--}}


                        <h4 dir="rtl" class=" text-right mb-4 text-muted"><span
                                class="font-weight-bold text-primary">۵)</span>
                            مهلت ترجمه</h4>
                        <div dir="rtl" class="clearfix">
                            <div class="form-group">

                                <input type="number" name="remaining_days"
                                       value="{{old('remaining_days') ? old('remaining_days') : 7}}"
                                       class="form-control float-right {{$errors->has('remaining_days') ? 'is-invalid': ($errors->all() ? 'is-valid' : '')}}"
                                       style="max-width: 100px">
                                <span class="float-right mr-3 py-1">روز</span>
                                <br>

                                <div class="invalid-feedback">


                                    @if ($errors->has('remaining_days'))

                                        {{$errors->first('remaining_days')}}

                                    @endif

                                </div>
                            </div>


                        </div>
                        <hr class="border-primary my-5">


                        {{--Description--}}


                        <h4 dir="rtl" class=" text-right mb-4 text-muted mb-0"><span
                                class="font-weight-bold text-primary">۶)</span>
                            توضیحات
                            <span class="small">(اختیاری)</span>

                        </h4>


                        <div dir="rtl" class="form-group mb-0">
                            <textarea name="description" id="description" class="form-control "
                                      placeholder="هر توضیحاتی که فکر میکنید لازم است در این قسمت وارد کنید."
                                      rows="3"></textarea>
                            <label for="description"></label>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mt-4">ثبت سفارش</button>
                        </div>


                    </form>
                </div>


            </div>
        </div>


    </div>


@endsection



@section('scripts')

    <script>
        $('#file-upload').on('change', function () {
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html('<span class="text-success d-xm-block d-sm-none">انتخاب شد!</span><span class="text-success d-none d-sm-block">فایل شما با موفقیت انتخاب شد!</span>');
        })
    </script>


@endsection

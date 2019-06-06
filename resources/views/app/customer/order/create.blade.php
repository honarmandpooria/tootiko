@extends('layouts.app')


@section('styles')

    <style>
        .files input {
            outline: 2px dashed #92b0b3;
            outline-offset: -10px;
            -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
            transition: outline-offset .15s ease-in-out, background-color .15s linear;
            padding: 120px 0px 85px 35%;
            text-align: center !important;
            margin: 0;
            width: 100% !important;
        }

        .files input:focus {
            outline: 2px dashed #92b0b3;
            outline-offset: -10px;
            -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
            transition: outline-offset .15s ease-in-out, background-color .15s linear;
            border: 1px solid #92b0b3;
        }

        .files {
            position: relative
        }

        .files:after {
            pointer-events: none;
            position: absolute;
            top: 110px;
            left: 0;
            width: 50px;
            right: 0;
            height: 56px;
            content: "";
            background-image: url(https://image.flaticon.com/icons/png/128/109/109612.png);
            display: block;
            margin: 0 auto;
            background-size: 100%;
            background-repeat: no-repeat;
        }

        .color input {
            background-color: #f1f1f1;
        }

        .files:before {
            position: absolute;
            bottom: 80px;
            left: 0;
            pointer-events: none;
            width: 100%;
            right: 0;
            height: 57px;
            content: "فایل خود را داخل کادر رها کنید، یا از دکمه بالا استفاده کنید و فایل را انتخاب کنید.";
            display: block;
            margin: 0 auto;
            color: gray;
            font-weight: 300;
            text-transform: capitalize;
            text-align: center;
        }
    </style>




@endsection


@section('content')


    <div class="container">


        <div class="row">

            <div class=" col-md-8 offset-md-2">


                <div class="bg-white shadow rounded p-4">

                    @if($errors -> all())

                        <div dir="rtl" class="alert alert-danger" role="alert">
                            لطفا مواردی که با رنگ قرمز مشخص شده اند را تصحیح کنید.
                        </div>


                        {{--                    USE THIS FOR DEBUG--}}
                        {{--   <div dir="rtl" class="alert alert-danger" role="alert">
                               @foreach($errors-> all() as $error)
                                   {{$error}}
                                   <br>
                               @endforeach
                           </div>
   --}}
                    @endif

                    <form class="needs-validation" novalidate method="POST"
                          action="{{route('customer-orders.store')}}">
                        @csrf

                        {{--language and category--}}

                        <h4 dir="rtl" class="text-right mb-4 text-muted"><span
                                class="font-weight-bold text-primary">۱)</span>
                            انتخاب زبان و زمینه ترجمه</h4>
                        <div dir="rtl" class="row">

                            <div class="form-group col-md-6">
                                <select name="operation_id" required
                                        class="custom-select {{$errors->has('operation_id') ? 'is-invalid': ($errors->all() ? 'is-valid' : '')}}">
                                    <option value="">انتخاب زبان</option>
                                    <option value="1" {{(old("operation_id") == 1 ? "selected":"")}}>انگلیسی به فارسی
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
                                <select name="category_id" required
                                        class="custom-select {{$errors->has('category_id') ? 'is-invalid': ($errors->all() ? 'is-valid' : '')}}">
                                    <option value="">انتخاب زمینه</option>
                                    <option value="1" {{(old("category_id") == 1 ? "selected":"")}}>عمومی
                                    </option>
                                    <option value="2" {{(old("category_id") == 2 ? "selected":"")}}>مهندسی</option>
                                    <option value="3" {{(old("category_id") == 3 ? "selected":"")}}>پزشکی</option>
                                    <option value="3" {{(old("category_id") == 4 ? "selected":"")}}>انسانی</option>
                                </select>
                                <div class="invalid-feedback">
                                    @if ($errors->has('category_id'))

                                        {{$errors->fir3st('category_id')}}

                                    @endif

                                </div>

                            </div>


                        </div>

                        <hr class=" border-primary my-5">


                        {{--upload file--}}


                        <h4 dir="rtl" class=" text-right mb-4 text-muted"><span
                                class="font-weight-bold text-primary">۲)</span>
                            انتخاب فایل ترجمه</h4>

                        <div dir="rtl" class="progress d-none my-2">
                            <div class="progress-bar bg-success" role="progressbar" style="" aria-valuenow="25"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                        <p id="file-uploaded-text" dir="rtl" class="text-success text-center my-2"></p>


                        <div dir="rtl" class="custom-file files" style="height: 200px; border: 3px dashed #ccc;">
                            <label for="file-upload"
                                   class="custom-file-label text-left border-top-0 border-right-0 border-left-0 border-bottom">انتخاب فایل</label>
                            <input required id="file-upload" name="translation_file" type="file"
                                   class="custom-file-input {{$errors->has('translation_file') ? 'is-invalid': ($errors->all() ? 'is-invalid' : '')}}"
                                   style="cursor:pointer">

                            <div class="invalid-feedback">


                                @if ($errors->has('translation_file'))

                                    {{$errors->first('translation_file')}}

                                @else
                                    فایلی که میخواهید ترجمه شود را انتخاب کنید.

                                @endif

                            </div>


                            <p id="file-tip" dir="rtl" class="blockquote-footer mt-2">در صورتی که <span
                                    class="text-danger"> بیش از یک فایل</span>
                                برای ترجمه دارید، آنها را به صورت زیپ در بیاورید و سپس فایل زیپ را آپلود کنید.</p>


                        </div>

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
                            <button id="submit" type="submit" class="btn btn-primary mt-4">ثبت سفارش</button>
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
            $(this).next('.custom-file-label').html('<span class="text-muted">fileName</span>');
        })
    </script>



    {{--    Upload File With Ajax--}}


    <script>

        $(document).ready(function () {


            $('#file-upload').on('change', function () {
                $('.custom-file').hide();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                var data = new FormData();
                data.append('translation_file', $('input[type=file]')[0].files[0]);
                data.append('_token', "{{ csrf_token() }}");


                $.ajax({

                    xhr: function () {
                        var xhr = new window.XMLHttpRequest();

                        xhr.upload.addEventListener('progress', function (e) {

                            if (e.lengthComputable) {

                                var percent = Math.round(e.loaded / e.total * 100);

                                $('.progress').removeAttr('class', 'd-none');
                                $('.progress-bar').attr('aria-valuenow', percent).css('width', percent + '%').text(percent + '%');
                            }

                        });

                        return xhr;
                    },
                    url: '{{route('translate-file')}}',
                    type: 'POST',
                    data: data,
                    enctype: 'multipart/form-data',
                    contentType: false,
                    processData: false,

                    success: function () {
                        $('#file-uploaded-text').text('فایل شما با موفقیت آپلود شد.');
                    }
                    ,
                    error: function () {

                    }


                })


            })

        })

    </script>




    {{--

        <script>
            $("#file-upload").change(function (e) {
                var data = new FormData();
                data.append('translation_file', $('input[type=file]')[0].files[0]);
                data.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: '{{route('translate-file')}}',
                    type: 'POST',
                    data: data,
                    enctype: 'multipart/form-data',
                    contentType: false,
                    processData: false,
                    success: function (data) {

                    },
                    error: function () {

                    }
                });
            });
        </script>


    --}}


    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();


        $(document).ready(function () {

            $('.needs-validation').on('submit', function (e) {
                window.setTimeout(function () {
                    var errors = $('.was-validated :invalid');
                    if (errors.length) {
                        $('html, body').animate({scrollTop: errors.offset().top - 100}, 500);
                    }
                }, 0);
            });
        });

    </script>



    {{--    dropzone--}}

    <script>


    </script>

@endsection

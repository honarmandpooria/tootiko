@push('styles')
    <link rel="stylesheet" href="{{asset('css/form-custom-styles.css')}}">

    <style>
        .tooltip-inner {
            max-width: 300px;
            padding: 0.25rem 0.5rem;
            color: #fff;
            text-align: center;
            background-color: #38c172;
            border-radius: 22px;
        }
    </style>
@endpush


<form id="order-form" class="needs-validation" novalidate method="POST"
      @guest action="{{route('before-register.setOrderSession')}}"
      @else action="{{route('customer-orders.store')}}" @endguest>


    @csrf

    {{--language and category--}}

    <h4 dir="rtl" class="text-right mb-4 text-muted"><span
            class="font-weight-bold text-primary">۱)</span>
        انتخاب زبان و زمینه</h4>
    <div dir="rtl" class="row">

        <div class="form-group col-md-6">
            <select name="operation_id" required
                    class="custom-select {{$errors->has('operation_id') ? 'is-invalid': ($errors->all() ? 'is-valid' : '')}}">
                <option value="">نوع ترجمه</option>
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

                    {{$errors->first('category_id')}}

                @endif

            </div>

        </div>

        <div class="form-group col-md-6 ">
            <div dir="rtl" class="clearfix mr-3">

                <div class="form-group clearfix position-relative">

                    <label for="remaining_days">مهلت ترجمه (روز):</label>
                    <input data-toggle="tooltip" data-placement="bottom" title="چند روز برای انجام ترجمه مهلت دارید؟"
                           id="remaining_days" type="number" name="remaining_days"
                           value="{{old('remaining_days') ? old('remaining_days') : 7}}"
                           class="form-control {{$errors->has('remaining_days') ? 'is-invalid': ($errors->all() ? 'is-valid' : '')}}"
                           style="max-width: 100px">


                    <div class="invalid-feedback">


                        @if ($errors->has('remaining_days'))

                            {{$errors->first('remaining_days')}}

                        @endif

                    </div>
                </div>


            </div>

        </div>


    </div>
    <hr class=" border-primary my-5">


    {{--upload file or url--}}


    @include('order.file')


    <hr class=" border-primary my-5">

    {{--quality radio--}}

    {{--

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
    --}}


    {{--Access Rights--}}
    {{--


        <h4 dir="rtl" class=" text-right mb-4 text-muted"><span
                class="font-weight-bold text-primary">۳)</span>
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
        <p dir="rtl" class="blockquote-footer">این نوع ترجمه فقط توسط <span
                class="text-success">مترجمین مورد اعتماد طوطیکو</span>
            انجام خواهد شد.</p>
        <hr class=" border-primary my-5">
    --}}


    {{--Description--}}


    <h4 dir="rtl" class=" text-right mb-4 text-muted mb-0"><span
            class="font-weight-bold text-primary">۳)</span>
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
        <button id="submit" type="submit" class="btn btn-success mt-4 btn-block" onclick="submitForm(this);">ثبت و
            برآورد قیمت رایگان
        </button>
    </div>


</form>


{{--    file upload error modal--}}

<div id="file-upload-error" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div dir="rtl" class="modal-header bg-danger text-white">
                <h5 class="modal-title">خطا</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p dir="rtl">در آپلود فایل با خطا رو برو شدیم، لطفا از نوع فایل و محتویات آن اطمینان حاصل کنید و سپس
                    دوباره
                    تلاش کنید یا با پشتیبانی تماس بگیرید.</p>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
            </div>
        </div>
    </div>
</div>




@push('scripts')


    {{--        jquery validation--}}

    <script src="{{asset('js/jquery.validate.js')}}"></script>
    <script src="{{asset('js/additional-methods.js')}}"></script>
    {{--    <script src="{{asset('js/form-custom-js.js')}}"></script>--}}


    {{--            ارسال درخواست ایجکس برای ذخیره فایل --}}


    <script>

        $(document).ready(function () {


            $('#file-upload').on('change', function () {


                if ($("#file-upload").valid() == true) {
                    var fileName = $(this).get(0).files.item(0).name;
                    $('#file_name').text(fileName);


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

                                    $('#file-progress').removeAttr('class', 'd-none').addClass('progressing');
                                    $('.progress-bar').attr('aria-valuenow', percent).css('width', percent - 1 + '%').text(percent - 1 + '%');
                                }

                            });

                            return xhr;
                        },
                        url: '{{route('file-upload')}}',
                        type: 'POST',
                        data: data,
                        enctype: 'multipart/form-data',
                        contentType: false,
                        processData: false,

                        success: function () {
                            $('#file-uploaded-text').text('فایل شما با موفقیت آپلود شد.');
                            $('#file-uploaded-text').addClass('file-exist');
                            $('.progress-bar').css('width', '100%').text('100%');
                            $('#file-tip').hide();
                            $('#file-upload-invalid').hide();
                        },
                        error: function () {
                            $('#file-upload-error').modal('show');
                        }

                    })

                }


            })

        });


        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });


    </script>






    <script>
        /* تنظیم پیشفرض های ولیدیتور جی کوری*/

        jQuery.validator.setDefaults({
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-tooltip');
                element.closest('.form-group').append(error);
                element.closest('.custom-file').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid').addClass('is-valid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid').addClass('is-valid');
            }
        });


        //اضافه کردن محاسبه سایز فایل به جیکوئری ولیدیشن

        jQuery.validator.addMethod("filesize_max", function (value, element, param) {
            var isOptional = this.optional(element),
                file;

            if (isOptional) {
                return isOptional;
            }

            if ($(element).attr("type") === "file") {

                if (element.files && element.files.length) {

                    file = element.files[0];
                    return (file.size <= param);
                }
            }
            return false;
        }, "سایز فایل انتخابی تقریبا بیشتر از 50 مگابایت است. لطفا از یک سایت آپلود فایل مانند uploadboy.com استفاده کرده و سپس لینک آن را در بخش ارسال لینک وارد کنید.");

        //ولیدیت کردن فرم از کلاینت ساید

        $(function () {
            $('.needs-validation').validate({
                rules: {
                    remaining_days: {
                        required: true,
                        number: true,
                        min: 2,
                    },
                    translation_file: {
                        required: true,
                        extension: "docx|doc|rtf|txt|bmp|jpg|JPG|png|jpeg|pdf|gif|html|htm|zip|rar|ppt|pptx|xls|xlsx|csv|flv|avi|mov|mp4|mpg|wmv|3gp|asf|mp3|wav|aif|mid|amr|act|aiff|aac|ogg|wma|m4a|wow|srt",
                        filesize_max: 53000000
                    },
                    translation_url: {
                        required: true,
                        url: true,
                    }
                },
                messages: {
                    remaining_days: {
                        required: 'لطفا یک تاریخ انتخاب کنید.',
                        min: 'مهلت ترجمه باید بیشتر از ۲ روز باشد.'
                    },
                    translation_file: {
                        required: 'لطفا یک فایل برای ترجمه انتخاب کنید، یا درصورتی که لینک فایل را در اختیار دارید از بخش لینک استفاده کنید.',
                        extension: "فایل موردنظر باید یکی از انواع docx, doc, rtf, txt, bmp, jpg, JPG, png, jpeg, pdf, gif, html, htm, zip, rar, ppt, pptx, xls, xlsx, csv, flv, avi, mov, mp4, mpg, wmv, 3gp, asf, mp3, wav, aif, mid, amr, act, aiff, aac, ogg, wma, m4a, wow, srt باشد.",
                        filesize: "سایز فایل انتخابی نباید بیشتر از ۲۰۰ کیلوبایت باشد.",
                    },
                    translation_url: {
                        required: 'لینک فایل را وارد کنید، یا از بخش آپلود فایل استفاده کنید.',
                        url: 'آدرس فایل باید یک لینک معتبر باشد. به عنوان مثال: http://uploadboy.com/12345',
                    }
                }
            });


            $(this).on('submit', function () {
                var isvalid = $(".needs-validation").valid();
                if (isvalid && $('#file-uploaded-text').hasClass('file-exist')) {
                    $("#submit").attr('disabled', 'disabled').html('<img src="/images/gifs/preloader-dark.gif" alt=""> <span>درحال ارسال</span>');
                }
            });


        });


        $('#file-upload').on('change', function () {

            $('#file-upload').valid();

        });

        function fileUpVal(e) {

            if ($('#file-progress').hasClass('progressing') && $('#file-uploaded-text').hasClass('file-exist')) {
                return true;
            } else {
                e.preventDefault();
                $('#file-upload-invalid').text('لطفا صبر کنید تا فایل به طور کامل آپلود شود.')
            }
        }


        document.getElementById('order-form').addEventListener("submit", fileUpVal);


    </script>


@endpush

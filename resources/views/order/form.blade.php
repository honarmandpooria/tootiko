@push('styles')
    <link rel="stylesheet" href="{{asset('css/form-custom-styles.css')}}">
@endpush


<form class="needs-validation" novalidate method="POST"
@guest action="{{route('before-register.setOrderSession')}}"  @else action="{{route('customer-orders.store')}}"  @endguest>

    @csrf

    {{--language and category--}}

    <h4 dir="rtl" class="text-right mb-4 text-muted"><span
            class="font-weight-bold text-primary">۱)</span>
        انتخاب زبان و زمینه</h4>
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

                    {{$errors->first('category_id')}}

                @endif

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


    {{--Time--}}


    <h4 dir="rtl" class=" text-right mb-4 text-muted"><span
            class="font-weight-bold text-primary">۳)</span>
        مهلت ترجمه</h4>
    <div dir="rtl" class="clearfix">
        <div class="form-group clearfix position-relative">

            <input type="number" name="remaining_days"
                   value="{{old('remaining_days') ? old('remaining_days') : 7}}"
                   class="form-control float-right {{$errors->has('remaining_days') ? 'is-invalid': ($errors->all() ? 'is-valid' : '')}}"
                   style="max-width: 100px">
            <span class="float-right mr-3 ml-5 py-1">روز</span>

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
            class="font-weight-bold text-primary">۴)</span>
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
    <script src="{{asset('js/form-custom-js.js')}}"></script>


{{--            ارسال درخواست ایجکس برای ذخیره فایل --}}


    <script>

        $(document).ready(function () {


            $('#file-upload').on('change', function () {

                if ($("#file-upload").valid() == true) {
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
                        url: '{{route('file-upload')}}',
                        type: 'POST',
                        data: data,
                        enctype: 'multipart/form-data',
                        contentType: false,
                        processData: false,

                        success: function () {
                            $('#file-uploaded-text').text('فایل شما با موفقیت آپلود شد.');
                            $('#file-tip').hide();
                        },
                        error: function () {
                            $('#file-upload-error').modal('show');
                        }

                    })

                }


            })

        })

    </script>





@endpush

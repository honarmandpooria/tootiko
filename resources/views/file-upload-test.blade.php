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
                          action="{{route('upload-file')}}">
                        @csrf

                        {{--upload file--}}


                        <h4 dir="rtl" class=" text-right mb-4 text-muted"><span
                                class="font-weight-bold text-primary"></span>
                            انتخاب فایل ترجمه</h4>


                        <div dir="rtl" class="custom-file">
                            <input required id="file-upload" name="test_file" type="file"
                                   class="custom-file-input {{$errors->has('test_file') ? 'is-invalid': ($errors->all() ? 'is-invalid' : '')}}"
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


                        <div dir="rtl" class="progress d-none my-2">
                            <div class="progress-bar " role="progressbar" style="" aria-valuenow="25"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                        <p id="file-uploaded-text" dir="rtl" class="text-success"></p>


                        <input class="btn btn-success" type="submit" value="آپلود">


                    </form>
                </div>


            </div>
        </div>


    </div>


@endsection



@section('scripts')

    {{--    <script>--}}
    {{--        $('#file-upload').on('change', function () {--}}
    {{--            //get the file name--}}
    {{--            var fileName = $(this).val();--}}
    {{--            //replace the "Choose a file" label--}}
    {{--            $(this).next('.custom-file-label').html('<span class="text-success d-xm-block d-sm-none">انتخاب شد!</span><span class="text-success d-none d-sm-block">فایل شما با موفقیت انتخاب شد!</span>');--}}
    {{--        })--}}
    {{--    </script>--}}


    {{--    TEST UPLOAD PROGRESS BAR--}}


    <script>

        $(document).ready(function () {


            $('#file-upload').on('change', function () {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });



                var data = new FormData();
                data.append('test_file', $('input[type=file]')[0].files[0]);
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


                    url: '{{route('upload-file')}}',
                    type: 'POST',
                    data: data,
                    enctype: 'multipart/form-data',
                    contentType: false,
                    processData: false,
                    success: function () {
                        $('#file-uploaded-text').text('فایل شما با موفقیت آپلود شد.');
                    },
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
            data.append('test_file', $('input[type=file]')[0].files[0]);
            data.append('_token', "{{ csrf_token() }}");
            $.ajax({
                url: '{{route('upload-file')}}',
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




@endsection

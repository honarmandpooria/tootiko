<h4 dir="rtl" class=" text-right mb-4 text-muted"><span
        class="font-weight-bold text-primary">۲)</span>
    انتخاب محتوای ترجمه</h4>


<nav dir="rtl">
    <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active rounded-0" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
           aria-controls="nav-home" aria-selected="true"><i class="fas fa-upload mx-2"></i>آپلود فایل</a>
        <a class="nav-item nav-link rounded-0" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
           aria-controls="nav-profile" aria-selected="false"><i class="fas fa-link mx-2"></i>ارسال لینک</a>

    </div>
</nav>
<div dir="rtl" class="tab-content" id="nav-tabContent">




{{--    upload file--}}
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">


        <div dir="rtl" class="progress d-none mb-2 ">
            <div class="progress-bar bg-success mt-5" role="progressbar" style="" aria-valuenow="25"
                 aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <p id="file-uploaded-text" dir="rtl" class="text-success text-center my-2"></p>

        <p id="file-tip" dir="rtl" class="blockquote-footer mt-5">در صورتی که <span
                class="text-danger"> بیش از یک فایل</span>
            برای ترجمه دارید، آنها را به صورت زیپ در بیاورید و سپس فایل زیپ را آپلود کنید.</p>
        <div dir="rtl" class="custom-file files" style="height: 200px; border: 3px dashed #cccc;">
            <label for="file-upload"
                   class="custom-file-label text-left m-3 mx-auto" style="max-width: 500px;">انتخاب
                فایل</label>
            <input required id="file-upload" name="translation_file" type="file"
                   class="custom-file-input {{$errors->has('translation_file') ? 'is-invalid': ($errors->all() ? 'is-invalid' : '')}}">
            <div class="invalid-feedback">


                @if ($errors->has('translation_file'))

                    {{$errors->first('translation_file')}}

                @else
                    فایلی که میخواهید ترجمه شود را انتخاب کنید.

                @endif

            </div>


        </div>





    </div>












{{--    link--}}




    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">


        <p class="blockquote-footer mt-5">می توانید از طریق سایت های اشتراک گذاری فایل مانند <a target="_blank" href="https://uploadboy.com" class="text-info">این لینک</a> فایل خود را آپلود کنید.</p>
        <div class="form-group position-relative clearfix">
            <label class="" for="file-url">لینکی که حاوی متن یا فایل مورد نظر برای ترجمه است را وارد کنید:</label>
            <input id="file-url" dir="ltr" type="text" class="form-control" name="translation_url">

        </div>





    </div>

</div>


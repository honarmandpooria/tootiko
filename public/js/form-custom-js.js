
//تنظیم پیشفرض های ولیدیتور جی کوری

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
            },
            translation_url: {
                required: 'لینک فایل را وارد کنید، یا از بخش آپلود فایل استفاده کنید.',
                url: 'آدرس فایل باید یک لینک معتبر باشد. به عنوان مثال: http://uploadboy.com/12345',
            }
        }
    })
});


$('#file-upload').on('change', function () {

    $('#file-upload').valid();

});

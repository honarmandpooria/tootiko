
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


//اضافه کردن محاسبه سایز فایل به جیکوئری ولیدیشن

jQuery.validator.addMethod("filesize_max", function(value, element, param) {
    var isOptional = this.optional(element),
        file;

    if(isOptional) {
        return isOptional;
    }

    if ($(element).attr("type") === "file") {

        if (element.files && element.files.length) {

            file = element.files[0];
            return ( file.size <= param );
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
                filesize:"سایز فایل انتخابی نباید بیشتر از ۲۰۰ کیلوبایت باشد.",
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

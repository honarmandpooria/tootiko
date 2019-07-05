<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TranslateFileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'translation_file' => 'required|mimes:docx,image,doc,rtf,txt,bmp,jpg,png,jpeg,pdf,gif,html,htm,zip,rar,ppt,pptx,xls,xlsx,csv,flv,avi,mov,mp4,mpg,wmv,3gp,asf,mpga,mp3,wav,aif,mid,amr,act,aiff,aac,ogg,wma,m4a,wow,srt|max:52000',
        ];
    }


    public function messages()
    {
        return [
            'translation_file.required' => 'انتخاب فایل برای انجام عملیات ترجمه ضروری است.',
            'translation_file.mimes' => 'فایل باید یکی از انواع pdf,doc,docx,zip,rar,jpg,png,jpeg,mp4,mp3,txt باشد.',
            'translation_file.max' => 'حداکثر سایز فایل ارسالی ۵۰ مگابایت است.',
        ];
    }
}

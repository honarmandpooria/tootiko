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
            'translation_file' => 'required|mimes:pdf,doc,docx,zip,rar,jpg,png,jpeg,mp4,mp3,txt|max:40000',
        ];
    }


    public function messages()
    {
        return [
            'translation_file.required' => 'انتخاب فایل برای انجام عملیات ترجمه ضروری است.',
            'translation_file.mimes' => 'فایل باید یکی از انواع pdf,doc,docx,zip,rar,jpg,png,jpeg,mp4,mp3,txt باشد.',
            'translation_file.max' => 'حداکثر سایز فایل ارسالی ۴۰ مگابایت است.',
        ];
    }
}

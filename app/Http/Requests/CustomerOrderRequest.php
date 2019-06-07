<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerOrderRequest extends FormRequest
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
//            'translation_file' => 'required|mimes:pak,pdf,doc,docx,zip,rar,jpg,png,jpeg,mp4,mp3,txt|max:40000',
            'operation_id' => 'required|exists:operations,id',
            'translation_url' => 'url',
            'category_id' => 'required|exists:categories,id',
            'quality_id' => 'required|exists:qualities,id',
            'is_secret' => 'required|in:0,1',
            'remaining_days' => 'required|integer|min:2|max:150',
        ];


    }

    public function messages()
    {
        return [
            'translation_file.required' => 'انتخاب فایل برای انجام عملیات ترجمه ضروری است.',
            'translation_file.mimes' => 'فایل باید یکی از انواع pdf,doc,docx,zip,rar,jpg,png,jpeg,mp4,mp3,txt باشد.',
            'translation_file.max' => 'حداکثر سایز فایل ارسالی ۴۰ مگابایت است.',


            'operation_id.required' => 'زبان ترجمه نمیتواند خالی باشد.',
            'operation_id.exists' => 'معتبر نیست.',


            'category_id.required' => 'زمینه ترجمه نمیتواند خالی باشد.',
            'category_id.exists' => 'معتبر نیست.',


            'quality_id.required' => 'کیفیت ترجمه نمیتواند خالی باشد.',
            'quality_id.exists' => 'معتبر نیست.',

            'remaining_days.min' => 'این مورد باید ۲ روز یا بیشتر باشد.',
            'remaining_days.max' => 'این مورد نمیتواند بیشتر از ۱۵۰ روز باشد.',
            'remaining_days.integer' => 'این مقدار معتبر نیست.',
            'remaining_days.required' => 'مهلت ترجمه نمیتواند خالی باشد.',
        ];
    }
}

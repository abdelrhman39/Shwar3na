<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
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
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'phone' => 'required|min:7',
            'address' => 'required',
            'facbook' => 'required',
            'instgram' => 'required',
            'whatsApp' => 'required',
            'about_data' => 'required',

        ];
    }

    public function messages(){
        return [
            'phone.required' => 'من فضك ادخل رقم الهاتف' ,
            'phone.min' =>   'رقم الهاتف يجب ان لا يقل عن 7 ارقام' ,
            'email.required' =>  'من فضلك ادخل البريد الالكتروني'  ,
            'email.regex'=>  'من فضلك ادخل بريد الكتروني صالح' ,
            'address.required' => 'العنوان مطلوب',
            'facbook.required' => 'لينك الفيسبوك مطلوب',
            'instgram.required' => 'لينك الانستجرام مطلوب',
            'whatsApp.required' => 'رقم الواتساب مطلوب',
            'about_data.required' => 'نبذه عننا مطلوبة',

        ];
    }
}

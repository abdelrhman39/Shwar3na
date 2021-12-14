<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceRequest extends FormRequest
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
            "user_id" => 'required',
            'logo' => 'required',
            'description' => 'required',
            'phone' => 'required|min:7',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'address' => 'required',
            'price_range' => 'required',
            'location_id' => 'required',
            'Category_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            "user_id.required" => "أختار صاحب المحل",
            'logo.required' => 'اللوجو مطلوب',
            'description.required' => 'وصف المحل مطلوب',
            'phone.required' => 'من فضك ادخل رقم الهاتف' ,
            'phone.min' =>   'رقم الهاتف يجب ان لا يقل عن 7 ارقام' ,
            'email.required' =>  'من فضلك ادخل البريد الالكتروني'  ,
            'email.regex'=>  'من فضلك ادخل بريد الكتروني صالح' ,
            'address.required' => 'العنوان مطلوب',
            'price_range.required' => 'من فضلك ادخل اسعار المحل تتراوح بين كام لى كام',
            'location_id.required' => 'من فضلك أختر عنوان المحل',
            'Category_id.required' => 'من فضلك أختر  أقسام المحل',

        ];
    }
}

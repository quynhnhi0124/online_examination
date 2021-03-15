<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'firstname' => 'required|max:32',
            'lastname' => 'required|max:100',
            'mobile' => 'required|max:13',
            
        ];
    }

    public function messages()
    {
        return [
            'firstname.required'=>'Không được bỏ trống',
            'lastname.required'=>'Không được bỏ trống',
            'mobile.required'=>'Không được bỏ trống',
            'firstname.max'=>"Giới hạn 32 kí tự",
            'lastname.max'=>"Giới hạn 100 kí tự",
            'mobile.max'=>"Số điện thoại không quá 13 kí tự",
        ];
    }
}

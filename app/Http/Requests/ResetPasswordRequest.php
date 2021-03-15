<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'password'=>'required|min:6',
            'password_confirm'=>'required_with:password|same:password',
        ];
    }

    public function messages()
    {
        return [
            'password.required'=>'Nhập vào mật khẩu của bạn',
            'password.min'=>"Độ dài mật khẩu ít nhất là 6 kí tự",
            'password_confirm.same'=>"Mật khẩu nhập lại không khớp",
        ];
    }
}

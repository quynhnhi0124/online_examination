<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'firstname' => 'required|string|max: 32',
            'lastname' => 'required|string|max: 100',
            'username' => 'required|string|max:32',
            'email' => 'required|string|email:rfc,dns|max:100|unique:users',
            'password' => 'required|string|min:6|',
            'password_confirm'=>'required_with:password|string|same:password',
            'mobile' => 'required|string|max:13',
            
        ];
    }

    public function messages()
    {
        return [
            'firstname.max'=>"Giới hạn 32 kí tự",
            'lastname.max'=>"Giới hạn 100 kí tự",
            'username.max'=>"Giới hạn 32 kí tự",
            'email.max'=>"Giới hạn số kí tự",
            'email.unique'=>"Email đã tồn tại",
            'password.min'=>"Mật khẩu của bạn phải có ít nhất 6 kí tự",
            'mobile.max'=>"Số điện thoại không quá 13 kí tự",
        ];
    }
}

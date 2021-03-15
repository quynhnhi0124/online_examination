<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSubjectRequest extends FormRequest
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
            'subject' => 'required|unique:subjects',
        ];
    }
    public function messages()
    {
        return [
            'subject.required' => 'Bạn chưa nhập vào tên môn học',
            'subject.unique' => 'Tên môn học là duy nhất',

        ];
    }
}

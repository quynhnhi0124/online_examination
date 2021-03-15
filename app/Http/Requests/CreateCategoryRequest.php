<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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
            'subject_category'=> 'required|unique:subject_category',
        ];
    }

    public function messages()
    {
        return [
            'subject_category.unique' => 'Tên mỗi chủ đề không được trùng nhau',
            'subject_category.required' => 'Bạn chưa nhập tên chủ đề'
        ];
    }
}

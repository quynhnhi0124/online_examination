<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateExamRequest extends FormRequest
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
            'exam_name'=> 'required|string|unique:exams',
            'time' => 'required|int',
        ];
    }

    public function messages()
    {
        return [
            'exam.required' => 'Bạn chưa nhập tên bài thi',
            'exam_name.unique' => 'Tên bài thi không được trùng nhau'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateQuestionRequest extends FormRequest
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
            'question'=> 'required|unique:questions',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'answer' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'question.required' => 'Bạn chưa nhập câu hỏi',
            'question.unique' => 'Câu hỏi đã tồn tại trong hệ thống',
            'option_a.required' => 'Bạn chưa nhập đáp án',
            'option_b.required' => 'Bạn chưa nhập đáp án',
            'option_c.required' => 'Bạn chưa nhập đáp án',
            'option_d.required' => 'Bạn chưa nhập đáp án',
            'answer.required' => 'Bạn chưa nhập câu trả lời',

        ];
    }
}

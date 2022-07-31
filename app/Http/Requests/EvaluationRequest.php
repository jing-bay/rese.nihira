<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EvaluationRequest extends FormRequest
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
            'booking_id' => 'required',
            'evaluation' => 'required|integer|min:1|max:5',
            'comment' => 'required|max:300',
        ];
    }

    public function messages()
    {
        return [
            'evaluation.required' => '評価が未入力です',
            'comment.required' => 'コメントが未入力です',
            'comment.max' => '300字以内で記入してください',
        ];
    }
}

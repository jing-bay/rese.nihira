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
            'name' => 'required|string|max:255',
            'email' => 'required|email|string|max:255|unique:App\Models\User,email',
            'password' => 'required|alpha_num|min:8|max:255',
        ];
    }
    
    public function messages()
    {
        return [
            'name.required' => 'お名前を入力してください',
            'name.max' => '255字以内で入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスの形式で入力してください',
            'email.max' => '255字以内で入力してください',
            'email.unique' => 'そのメールアドレスは既に登録されています',
            'password.required' => 'パスワードを入力してください',
            'password.alpha_num' => '英数字で入力してください',
            'password.min' => '８文字以上で入力してください',
            'password.max' => '255文字以上で入力してください'
        ];
    }
}

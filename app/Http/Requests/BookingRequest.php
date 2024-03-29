<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            'booking_date' => 'required|date_format:Y-m-d|after:today',
            'booking_time' => 'required|date_format:H:i',
            'number' => 'required|integer|max:6',
        ];
    }

    public function messages()
    {
        return [
            'booking_date.after' => '明日以降の日付を入力してください',
        ];
    }
}

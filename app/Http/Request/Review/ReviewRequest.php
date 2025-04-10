<?php
namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'rating' => 'required',
            'content' => 'required',
            'GasStationId' => 'required',
            'UserId' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'rating.required' => 'Sao không được để trống',
            'content.required' => 'Nội dung không được để trống',
        ];
    }
}

<?php

namespace App\Http\Request\FuelType;

use Illuminate\Foundation\Http\FormRequest;

class AddFuelTypeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên loại nhiên liệu không được để trống',
            'name.string' => 'Tên loại nhiên liệu phải là chuỗi',
            'name.max' => 'Tên loại nhiên liệu không được vượt quá 255 ký tự',
        ];
    }
}

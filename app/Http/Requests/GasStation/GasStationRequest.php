<?php

namespace App\Http\Requests\GasStation;

use Illuminate\Foundation\Http\FormRequest;

class GasStationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [    
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
            'radius' => 'nullable|numeric|min:0',
            'fuel_type' => 'nullable|integer',
            'operating_hours' => 'nullable|string|date_format:H:i',
        ];
    }

    /**
     * Custom error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'longitude.required' => 'Vui lòng nhập thông tin kinh độ.',
            'longitude.numeric' => 'Kinh độ phải là một số hợp lệ.',
            'latitude.required' => 'Vui lòng nhập thông tin vĩ độ.',
            'latitude.numeric' => 'Vĩ độ phải là một số hợp lệ.',
            'radius.numeric' => 'Bán kính phải là một số.',
            'radius.min' => 'Bán kính không được nhỏ hơn 0.',
            'fuel_type.integer' => 'Loại nhiên liệu phải là một số nguyên hợp lệ.',
            'operating_hours.date_format' => 'Thời gian hoạt động phải có định dạng HH:MM.',
        ];
    }
}

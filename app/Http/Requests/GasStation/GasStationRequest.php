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
            
            'longitude' => 'required',
            'latitude' => 'required',
           
        ];
    }

    public function messages()
    {
        return [
            'longitude.required'=> 'Vui long nhap thong tin ......',
            'latitude.required'=> 'Vui long nhap thong tin ......',
        ];
    }
}

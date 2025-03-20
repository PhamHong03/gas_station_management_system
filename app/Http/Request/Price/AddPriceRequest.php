<?php
namespace App\Http\Request\Price;

use Illuminate\Foundation\Http\FormRequest;

class AddPriceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'FuelTypeId' => 'required|exists:fuel_types,id',
            'price' => 'required|numeric|min:0',
            'CompanyId' => 'required|exists:companies,id',
            'start_date' => 'required|date_format:Y-m-d',
        ];
    }

    public function messages()
    {
        return [
            'FuelTypeId.required' => 'Loại nhiên liệu không được để trống',
            'FuelTypeId.exists' => 'Loại nhiên liệu không tồn tại',
            'price.required' => 'Giá nhiên liệu không được để trống',
            'price.numeric' => 'Giá nhiên liệu phải là số',
            'price.min' => 'Giá nhiên liệu phải lớn hơn hoặc bằng 0',
            'CompanyId.required' => 'Công ty không được để trống',
            'CompanyId.exists' => 'Công ty không tồn tại',
            'start_date.required' => 'Ngày không được để trống',
            'start_date.date_format' => 'Ngày không đúng định dạng Y-m-d',
        ];
    }
}

<?php
namespace App\Http\Request\GasStation;

use Illuminate\Foundation\Http\FormRequest;

class AddGasStationRequest extends FormRequest
{
    public function authorize(){
        return true;
    }
    public function rules(){
        return [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
            'operation_time' => 'required|string',
            'CompanyId' => 'required|integer',
            'WardId' => 'required|integer',
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Vui lòng nhập tên',
            'name.string' => 'Tên phải là chuỗi',
            'name.max' => 'Tên không quá 255 ký tự',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'address.string' => 'Địa chỉ phải là chuỗi',
            'address.max' => 'Địa chỉ không quá 255 ký tự',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.string' => 'Số điện thoại phải là chuỗi',
            'phone.max' => 'Số điện thoại không quá 20 ký tự',
            'longitude.required' => 'Vui lòng nhập kinh độ',
            'longitude.numeric' => 'Kinh độ phải là số',
            'latitude.required' => 'Vui lòng nhập vĩ độ',
            'latitude.numeric' => 'Vĩ độ phải là số',
            'operation_time' => 'Vui lòng nhập giờ hoạt động',
            'operation_time.string' => 'Giờ hoạt động phải là chuỗi',
            'CompanyId' => 'Vui lòng chọn công ty',
            'CompanyId.integer' => 'Công ty phải là số',
            'WardId' => 'Vui lòng chọn phường',
            'WardId.integer' => 'Phường phải là số',
        ];
    }
}

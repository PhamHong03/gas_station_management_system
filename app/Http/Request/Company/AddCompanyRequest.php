<?php

namespace App\Http\Request\Company;

use App\Models\Company;
use App\Models\CompanyUser;
use Illuminate\Foundation\Http\FormRequest;

class AddCompanyRequest extends FormRequest {
    public function authorize()
    {
        return true;
    }
    public function rules(){
        return [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
            'WardId' => 'required|integer',
            'UserId' => 'required|integer'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên công ty không được để trống',
            'name.string' => 'Tên công ty phải là chuỗi',
            'name.max' => 'Tên công ty không được quá 255 ký tự',
            'address.required' => 'Địa chỉ không được để trống',
            'address.string' => 'Địa chỉ phải là chuỗi',
            'address.max' => 'Địa chỉ không được quá 255 ký tự',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.string' => 'Số điện thoại phải là chuỗi',
            'phone.max' => 'Số điện thoại không được quá 255 ký tự',
            'longitude.required' => 'Kinh độ không được để trống',
            'longitude.numeric' => 'Kinh độ phải là số',
            'latitude.required' => 'Vĩ độ không được để trống',
            'latitude.numeric' => 'Vĩ độ phải là số',
            'WardId.required' => 'Phường không được để trống',
            'WardId.integer' => 'Phường phải là số nguy',
            'UserId.required' => 'Người dùng không được để trống',
            'UserId.integer' => 'Người dùng phải là số nguyên'
        ];
    }
}

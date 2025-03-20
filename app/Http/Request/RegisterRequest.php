<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:8',
            'CCCD' => 'required|string|max:12',
            'password_confirmation' => 'required|min:8|same:password',
            'role' => 'required|integer',
            'active' => 'required|integer'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'email.required' => 'Email không được để trống',
            'password.required' => 'Password không được để trống',
            'CCCD.required' => 'CCCD không được để trống',
            'password_confirmation.required' => 'Confirm Password không được để trống',
        ];
    }
}

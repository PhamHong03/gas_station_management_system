<?php
namespace App\Http\Request\User;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'role.required' => 'Role không được để trống',
            'active.required' => 'Active không được để trống',
        ];
    }
}

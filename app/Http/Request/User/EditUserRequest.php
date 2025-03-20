<?php
namespace App\Http\Request\User;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'string|max:255',
            'email' => 'string|email|max:255|unique:users',
            'password' => 'min:8',
            'CCCD' => 'string|max:12',
            'role' => 'integer',
            'active' => 'integer'
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

<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Request\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Request\RegisterRequest;

class AuthController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }
    public function auth(LoginRequest $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password ])) {
            if (Auth::user()->role == 1) {
                return redirect()->route('admin');
            } else {
                return redirect()->route('index');
            }
        }
        return redirect()->back()->with('error', 'Thất bại! Vui lòng kiểm tra lại email hoặc password , Có thể bạn không phải khách hàng của chúng tôi!');
    }

    public function register()
    {
        return view('auth.register');
    }
    public function registerStore(RegisterRequest $request)
    {
        $request->merge(['password' => Hash::make($request->password)]);
        $userCheck = User::where('email', $request->email)->first();
        if($userCheck) {
            return redirect()->back()->with('error', 'Email đã tồn tại');
        }
        $userCheck = User::where('CCCD', $request->CCCD)->first();
        if($userCheck) {
            return redirect()->back()->with('error', 'CCCD đã tồn tại');
        }
        if(User::create($request->all())) {
            return redirect()->route('login')->with('success', 'Đăng ký thành công');
        }
        return redirect()->back()->with('error', 'Đăng ký thất bại! Vui lòng kiểm tra lại thông tin');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}

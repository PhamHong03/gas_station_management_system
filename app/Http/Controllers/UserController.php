<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Request\User\AddUserRequest;
use App\Http\Request\User\EditUserRequest;
use App\Http\Services\User\AdminUserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(AdminUserService $userService)
    {
        $this->userService = $userService;
    }

    public function list()
    {
        $users = User::all();
        return view('admin.users.list', compact('users'));
    }
    public function create()
    {
        return view('admin.users.create');
    }
    public function store(AddUserRequest $request)
    {
        $user_check = User::where('email', $request->email)->first();
        if ($user_check) {
            return redirect()->back()->with('error', 'Email đã tồn tại');
        }
        $user_cccd_check = User::where('CCCD', $request->CCCD)->first();
        if ($user_cccd_check) {
            return redirect()->back()->with('error', 'CCCD đã tồn tại');
        }
        $this->userService->createUser($request);
        return redirect()->route('admin.users.list')->with('success', 'Thêm mới thành công');
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }
    public function update(EditUserRequest $request, $id)
    {
        $this->userService->updateUser($request, $id);
        return redirect()->route('admin.users.list')->with('success', 'Cập nhật thành công');
    }
    public function delete($id)
    {
        $this->userService->deleteUser($id);
        return redirect()->route('admin.users.list')->with('success', 'Xóa thành công');
    }
}

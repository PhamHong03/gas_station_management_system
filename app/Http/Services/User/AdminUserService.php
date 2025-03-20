<?php

namespace App\Http\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Request\User\AddUserRequest;
use App\Http\Request\User\EditUserRequest;

class AdminUserService
{
    public function createUser(AddUserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->CCCD = $request->CCCD;
        $user->role = $request->role;
        $user->active = $request->active;
        if ($user->save()) {
            return true;
        }
        return redirect()->back()->with('error', 'Thêm mới thất bại');
    }
    public function updateUser(EditUserRequest $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        if($user->email != $request->email){
            $user->email = $request->email;
        }
        if(Hash::make($request->password) != $user->password){
            $user->password = Hash::make($request->password);
        }
        if($user->CCCD != $request->CCCD){
            $user->CCCD = $request->CCCD;
        }
        $user->role = $request->role;
        $user->active = $request->active;
        $user->save();
        if ($user->save()) {
            return true;
        }
        return redirect()->back()->with('error', 'Sửa mới thất bại');
    }
    public function deleteUser($id)
    {
        $user = User::find($id);
        if ($user->delete()) {
            return true;
        }
        return redirect()->back()->with('error', 'Xóa thất bại');
    }
}

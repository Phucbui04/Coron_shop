<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAdminController extends Controller
{
    public function users()
    {
        $users = User::orderBy('id', 'desc')->get();

        return view('admin.users', compact('users'));
    }
    public function addUser(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);
        $data = $validateData;
        $user = User::create($data);
        return redirect()->route('users')->with('success', 'Thêm người dùng thành công');
    }
    public function delUser($id)
    {
        $deleteUser = User::find($id);
        if ($deleteUser->orders->count() > 0) {
            return redirect()->route('users')->with('error', 'Không thể xóa');
        } else {
            $deleteUser->delete();
            return redirect()->route('users')->with('success', 'Xóa thành công');
        }
    }
    public function updateUserForm($id)
    {
        $user = User::findOrFail($id);
        return view('admin.updateUser', compact('user'));
    }
    public function updateUser(Request $request, $id)
    {
        $validatorData = $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);
        $user = User::find($id);
        $user->update([
            'username' => $validatorData['username'],
            'email' => $validatorData['email'],
            'password' => $validatorData['password'],
            'role' => $validatorData['role'],
        ]);
        return redirect()->route('users')->with('success', 'Sửa người dùng thành công.');
    }
}

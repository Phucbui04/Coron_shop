<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function updateUser(Request $request){
        $user = Auth::user();
        $user->username = $request->username;
        $user->email = $request->email;
        if($request->has('password')){
            $user->password = Hash::make($request->password);
        }

        $user->save();
        return redirect()->route('myaccount')->with('success','Thông tin tài khoản đã được lưu.');
    }    
}

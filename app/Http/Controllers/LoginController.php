<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use PhpParser\Node\Stmt\TryCatch;

use function Laravel\Prompts\password;

class LoginController extends Controller
{
    public function loginForm(){

        return view('login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'], // Remove Hash::make() here
        ]);
        // dd($credentials);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('admin');
        }
    
        return back()->withErrors([
            'password' => 'Thông tin đăng nhập không chính xác',
        ]);
    }

    public function register(Request $request){
        // Xác thực dữ liệu đầu vào
        $validatedData = $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|same:password_confirm',
            'password_confirm' => 'required|string|same:password',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        unset($validatedData['password_confirm']);
        try {
            User::create($validatedData);
            $request->session()->put('success', 'Đăng ký tài khoản thành công');
        } catch (\Throwable $e) {
            report($e);
            $request->session()->put('error', 'Có lỗi xảy ra khi đăng ký tài khoản. Vui lòng thử lại.');
        }
        return redirect()->route('loginForm');
    }
    
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
    
}

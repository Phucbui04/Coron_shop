<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
class ForgotPasswordController extends Controller
{
    public function forgetPasswordForm(){
        return view('forgetpassword');
    }

    public function forgetPassword(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now(),
        ]);
        Mail::send('mail.mailforgotpassword', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });
        return back()->with('message', 'Chúng tôi đã gửi email liên kết đặt lại mật khẩu của bạn!!');
    }

    public function resetPasswordForm($token){
        return view('resetpassword',['token'=>$token]);
    }

    public function resetPassword(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|same:password_confirm',
            'password_confirm' => 'required|same:password',
        ]);
        $updatePassword = DB::table('password_resets')
                    ->where([
                        'email' => $request->email,
                        'token' => $request->token,
                    ])->first();
            if(!$updatePassword){
                return back()->withInput()->with('error','Mã không hợp lệ');
            }
        $user = User::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);
        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return redirect()->route('loginForm')->with('message', 'Mật khẩu của bạn đã được thay đổi');
    }
}

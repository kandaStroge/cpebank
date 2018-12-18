<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthenLoginController extends Controller
{
    public function index()
    {
        return view('customer.login');
    }

    public function authen(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user != null) {

            if (Hash::check($request->password, $user->password)) {

                $token = str_random(60);
                $user->token = $token;
                $request->session()->put('login-token', $token);
                $request->session()->put('login-user-fname', $user->fname);
                $request->session()->put('login-user-id', $user->id);
                $user->save();

                return redirect('/')->with('report-message', [
                    'code' => 1,
                    'message' => 'ลงชื่อเข้าใช้สำเร็จ'
                ]);
            }
        }
        return redirect('/login')->with('report-message', [
            'code' => 0,
            'message' => 'ลองใหม่อีกครั้ง'
        ]);

    }

    public function logout(Request $request)
    {
        if ($request->session()->has('login-token')) {
            $user = User::where('token')->first();
            if ($user) {
                $user->token = null;
                $user->save();
            }
            $request->session()->flush();
            $request->session()->forget('login-token');
            if ($request->session()->has('officer_id')) {
                $request->session()->forget('officer_id');
            }
            if ($request->session()->has('customer_id')) {
                $request->session()->forget('customer_id');
            }
            if ($request->session()->has('login-user-fname')) {
                $request->session()->forget('login-user-fname');
            }
            if ($request->session()->has('login-user-id')) {
                $request->session()->forget('login-user-id');
            }
            if ($request->session()->has('token')) {
                $request->session()->forget('token');
            }
        }
        return redirect('/')->with('report-message', [
            'code' => 1,
            'message' => 'ไม่รู้ว่าทำสำเร็จไหม แต่ถ้าออกมาได้ก็สำเร็จแหละ'
        ]);


    }

    public function reset(Request $request)
    {

        if ($request->isMethod('get')) {

            return view('auth.reset', [
                'title' => 'รีเซตรหัสผ่าน',
                'content_header' => 'รีเซตรหัสผ่าน',

            ]);
        } elseif ($request->isMethod('post')) {
            $request->validate([
                'email' => 'email|required',
            ]);
            $user = User::where('email', $request->email)->first();
            if ($user) {
                $token = str_random(30);
                $user->token = $token;
                $user->save();
                return redirect('/reset/email')->with('reset-token', $token);
            }


        } else {
            return redirect('admin/user/show')->with('report-message', [
                'code' => 0,
                'message' => 'Error unknow method'
            ]);
        }
    }

    public function reset_email(Request $request)
    {
        $token = $request->session()->get('reset-token');
        return view('auth.email')->with('token', $token);
    }

    public function reset_auth($token, Request $request)
    {
        $user = User::where('token', $token)->first();
        if (strlen($token) == 30 && $user != null) {
            $new_token = str_random(45);
            $user->token = $new_token;
            $user->save();
            return redirect('/reset/auth')->with('auth-reset', [
                    'user' => $user->id,
                    'token' => $new_token]
            );
        }
        return redirect('/login')->with('report-message', [
            'code' => 0,
            'message' => 'รหัสตรวจสอบไม่ถูกต้อง'
        ]);
    }

    public function reset_auth_form(Request $request)
    {

        if ($request->isMethod('get')) {
            return view('auth.reset_password', [
                'title' => 'รีเซตรหัสผ่าน',
                'content_header' => 'รีเซตรหัสผ่าน',

            ]);
        } elseif ($request->isMethod('post')) {
            $request->validate([
                'id' => 'required',
                'password' => 'required',
                'reset-token' => 'required',
            ]);
            $id = $request->id;
            $user = User::where('id',$id)->first();
            if ($user) {
                $hash = Hash::make($request->password);
                $user->token = null;
                $user->password = $hash;
                if ($user->save()){
                    return redirect('/login')->with('report-message', [
                        'code' => 1,
                        'message' => 'รหัสผ่านถูกรีเซตแล้ว กรุณาเข้าสู่ระบบใหม่อีกครั้ง'
                    ]);
                }else{
                    return redirect('/login')->with('report-message', [
                        'code' => 0,
                        'message' => 'รหัสผ่านถูกรีเซตแล้ว กรุณาเข้าสู่ระบบใหม่อีกครั้ง'
                    ]);
                }

            }return redirect('/reset')->with('report-message', [
                'code' => 1,
                'message' => 'ผิดพลาดอะไรสักอย่าง'
            ]);


        } else {
            return redirect('admin/user/show')->with('report-message', [
                'code' => 0,
                'message' => 'Error unknow method'
            ]);
        }
    }
}

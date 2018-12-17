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

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = str_random(60);
                $user->token = $token;
                $request->session()->push('token', $token);
                $user->save();
                return redirect('/')->with('report-message', [
                    'code' => 1,
                    'message' => 'ลงชื่อเข้าใช้สำเร็จ'
                ]);
            }
        }
        return redirect('/ogin')->with('report-message', [
            'code' => 0,
            'message' => 'ลองใหม่อีกครั้ง'
        ]);

    }

    public function logout(Request $request)
    {
        if ($request->session()->has('token')) {
            $user = User::where('token')->first();
            if ($user) {
                $user->token = null;
                $user->save();
            }
            $request->session()->forget('token');
            if ($request->session()->has('officer_id')) {
                $request->session()->forget('officer_id');
            }
            if($request->session()->has('customer_id')){
                $request->session()->forget('customer_id');
            }
        }
        return redirect('/')->with('report-message', [
            'code' => 1,
            'message' => 'ไม่รู้ว่าทำสำเร็จไหม แต่ถ้าออกมาได้ก็สำเร็จแหละ'
        ]);


    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AdminUserController extends Controller
{
    public function index()
    {
        $content_menus = [
            [
                'title' => 'เพิ่มผู้ใช้',
                'link' => 'user/add',
                'color' => ''
            ],
            [
                'title' => 'แสดงรายการผู้ใช้',
                'link' => 'user/show',
                'color' => ''
            ],

        ];
        return view('admin.user.index', [
            'title' => ' ระบบจัดการผู้ใช้',
            'content_header' => 'ระบบจัดการผู้ใช้',
            'content_menus' => $content_menus,

        ]);
    }

    public function printpwd(){
        return view('admin.user.printpwd', [
            'title' => 'Confirm Email',
            'content_header' => 'Confirm Email'
        ]);
    }

    public function show()
    {
        $users = User::all();

        return view('admin.user.show', [
            'title' => 'ดูข้อมูลผู้ใช้',
            'content_header' => 'ดูข้อมูลผู้ใช้',
            'users' => $users

        ]);
    }

    public function add(Request $request)
    {
        if ($request->isMethod('get')) {
            $users = User::all();
            return view('admin.user.add', [
                'title' => 'เพิ่มผู้ใช้',
                'content_header' => 'เพิ่มผู้ใช้',
                'users' => $users

            ]);
        } elseif ($request->isMethod('post')) {
            $request->validate([
                'fname' => 'required',
                'lname' => 'required',
                'gender' => 'required',
                'email' => 'email|required',
                'type' => 'required'
            ]);
            $pwd = str_random(6);
            $hashhed = Hash::make($pwd);
            $user = new User();
            $user->fname = $request->fname;
            $user->lname = $request->lname;
            $user->dob = $request->dob;
            $user->gender = $request->gender;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->password = $hashhed;
            $user->save();
            if ($user) {
                $id = $user->id;
                if ($this->inserMember($id,$request->type)){
                    return redirect('admin/user/pwd-print')->with('pwd', $pwd);
                }else{
                    return redirect('admin/user/add')->with('report-message', [
                        'code' => 0,
                        'message' => 'ผิดพลาดในขั้นตอน บันทึกลงฐานข้อมูลลูกค้า'
                    ]);
                }


            } else {
                return redirect('admin/user/add')->with('report-message', [
                    'code' => 0,
                    'message' => 'ผิดพลาด ไม่สามารถเข้าถึง ฐานข้อมูลผู้ใช้ได้'
                ]);
            }


        } else {
            return redirect('admin/hq/show')->with('report-message', [
                'code' => 0,
                'message' => 'Error unknow method'
            ]);
        }

    }
    private function insert2Member($str_table, $id){
        return DB::table($str_table)->insert([
            'user_id' => $id
        ]);
    }

    private function inserMember($id, $type){
        $t = ($type === "officer")?'officer':'customer';
        return $this->insert2Member($t,$id);

    }


}
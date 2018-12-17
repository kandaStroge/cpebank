<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Officer;
use App\User;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


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

    public function printpwd()
    {
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
            $user->work_addr = $request->work_addr;
            $user->home_addr = $request->home_addr;
            $user->password = $hashhed;

            $user->save();

            if ($user) {
                $id = $user->id;
                $message = "";
                $num_all_key = 0;
                $success_key = 0;
                // Add User into Customer
                if ($request->has('isCustomer')) {
                    $num_all_key += 1;
                    if ($this->insert2Member('customer', $id)) {
                        $success_key += 1;
                        $message .= "เพิ่ม Customer สำเร็จ <br />";
                    } else {
                        $message .= "เพิ่ม Customer ไม่สำเร็จ <br />";
                    }
                }
                // Add user into Officer
                if ($request->has('isOfficer')) {
                    $num_all_key += 1;
                    if ($this->insert2Member('officer', $id)) {
                        $success_key += 1;
                        $message .= "เพิ่ม Officer  สำเร็จ <br />";
                    } else {
                        $message .= "เพิ่ม Officer ไม่สำเร็จ <br />";
                    }
                }

                // Return Respond
                if ($num_all_key == $success_key) {
                    return redirect('admin/user/pwd-print')->with('pwd', $pwd);
                } else {
                    return redirect('admin/user/add')->with('report-message', [
                        'code' => 0,
                        'message' => 'บันทึกลงบางฐานข้อมูลไม่สำเร็จ กรุณาตรวจสอบ <br />' . $message .
                            'แต่บัชชีของคุณถูกสร้างไว้แล้วด้วยรหัสผ่าน' . $pwd
                    ]);
                }


            } else {
                return redirect('admin/user/add')->with('report-message', [
                    'code' => 0,
                    'message' => 'ผิดพลาด ไม่สามารถเข้าถึง ฐานข้อมูลผู้ใช้ได้'
                ]);
            }


        } else {
            return redirect('admin/user/show')->with('report-message', [
                'code' => 0,
                'message' => 'Error unknow method'
            ]);
        }

    }

    private function insert2Member($str_table, $id)
    {
        return DB::table($str_table)->insert([
            'user_id' => $id
        ]);
    }


    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'numeric|required',
        ]);

        if (Officer::where('user_id', $request->id)->exists()) {
            return redirect('admin/user/show')->with('report-message', [
                'code' => 0,
                'message' => 'Error Cannot Deleted Officer'
            ]);

        } else {
            $user = User::findOrFail($request->id)->delete();
            if ($user)
                return redirect('admin/user/show')->with('report-message', [
                    'code' => 1,
                    'message' => 'Deleted successful'
                ]);
            else
                return redirect('admin/user/show')->with('report-message', [
                    'code' => 0,
                    'message' => 'Error Cannot Deleted'
                ]);
        }


    }

    public function edit(Request $request)

    {
        $request->validate([
            'id' => 'numeric|required',
        ]);
        if ($request->isMethod('get')) {
            return redirect('admin/user/show')->with('report-message', [
                'code' => 0,
                'message' => 'Connot direct edit'
            ]);
        } elseif ($request->isMethod('post')) {
            $user = User::findOrFail($request->id);


            return view('admin.user.edit', [
                'title' => 'แก้ไขข้อมูลผู้ใช้',
                'content_header' => 'แก้ไขข้อมูลผู้ใช้',
                'user' => $user,

            ]);

        } else {
            return redirect('admin/user/show')->with('report-message', [
                'code' => 0,
                'message' => 'Error unknow method'
            ]);
        }


    }

    public function edit_send(Request $request)

    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'gender' => 'required',
            'email' => 'email|required',
        ]);

        if ($request->isMethod('get')) {
            return redirect('admin/user/show')->with('report-message', [
                'code' => 0,
                'message' => 'Connot direct edit'
            ]);
        } elseif ($request->isMethod('post')) {
            $user = User::find($request->id);
            $user->fname = $request->fname;
            $user->lname = $request->lname;
            $user->dob = $request->dob;
            $user->gender = $request->gender;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->work_addr = $request->work_addr;
            $user->home_addr = $request->home_addr;
            $user->save();
            if ($user) {

                return redirect('admin/user/show')->with('report-message', [
                    'code' => 1,
                    'message' => 'แก้ไขผู้ใช้ #' . $user->id . ' คุณ' . $user->fname . ' ' . $user->lname . ' เรียบร้อยแล้ว'
                ]);


            } else {
                return redirect('admin/user/show')->with('report-message', [
                    'code' => 0,
                    'message' => 'ผิดพลาด ไม่สามารถเข้าถึง ฐานข้อมูลผู้ใช้ได้'
                ]);
            }

        } else {
            return redirect('admin/user/show')->with('report-message', [
                'code' => 0,
                'message' => 'Error unknow method'
            ]);
        }


    }

    public function reset_pwd(Request $request)

    {
        $request->validate([
            'id' => 'numeric|required',
        ]);

        if ($request->isMethod('get')) {
            return redirect('admin/hq/show')->with('report-message', [
                'code' => 0,
                'message' => 'Connot direct edit'
            ]);
        } elseif ($request->isMethod('post')) {
            $user = User::findOrFail($request->id);
            $pwd = str_random(6);
            $hashhed = Hash::make($pwd);
            $user->password = $hashhed;



            if ($user->save()) {
                return redirect('admin/user/pwd-print')->with('pwd', $pwd);
            } else {
                return redirect('admin/user/show')->with('report-message', [
                    'code' => 0,
                    'message' => 'ผิดพลาดบางประการ ทำให้ไม่สามารถเขียนรหัสผ่านใหม่ได้'
                ]);
            }

        } else {
            return redirect('admin/user/show')->with('report-message', [
                'code' => 0,
                'message' => 'Error unknow method'
            ]);
        }


    }


}

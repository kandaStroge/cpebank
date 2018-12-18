<?php

namespace App\Http\Controllers;

use App\Officer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminOfficerController extends Controller
{
    public function index(){
        return  redirect('/admin/user/officer/show');
    }

    public function show(){
        $users = DB::table("user")->whereNotIn('id',function($query) {
            $query->select('user_id')->from('officer');
        })->get();
        $officers = Officer::all();

        return view('admin.user.officer.add', [
            'title' => 'จัดการพนักงาน',
            'content_header' => 'จัดการพนักงาน',
            'users' => $users,
            'officers' => $officers
        ]);
    }

    public function add(Request $request){
        $request->validate([
            'uid'=>'required'
        ]);

        $officer = new Officer();
        $officer->user_id = $request->uid;
        if ($officer->save()){
            return redirect('admin/user/officer')->with('report-message', [
                'code' => 1,
                'message' => 'เพิ่มพนักงานใหม่เรียบร้อย'
            ]) ;
        }else{
            return redirect('admin/user/officer')->with('report-message', [
                'code' => 0,
                'message' => 'มีบางอย่างผิดพลาด'
            ]) ;
        }


    }

    public function delete(Request $request){
        $request->validate([
            'fid'=>'required'
        ]);


        $officer = Officer::findOrFail($request->fid)->first();

        if ($officer->delete()){
            return redirect('admin/user/officer')->with('report-message', [
                'code' => 1,
                'message' => 'ลบพนักงานไปแล้ว'
            ]) ;
        }else{
            return redirect('admin/user/officer')->with('report-message', [
                'code' => 0,
                'message' => 'มีบางอย่างผิดพลาด'
            ]) ;
        }


    }


}

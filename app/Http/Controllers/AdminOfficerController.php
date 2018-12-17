<?php

namespace App\Http\Controllers;

use App\Officer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminOfficerController extends Controller
{
    public function index(){
        return 'เพิ่มเข้าเป็นพนักงาน';
    }

    public function show(){
        $users = DB::table("user")->whereNotIn('id',function($query) {
            $query->select('user_id')->from('officer');
        })->get();
        $officers = Officer::all();

        return view('admin.user.officer.add', [
            'title' => 'Confirm Email',
            'content_header' => 'Confirm Email',
            'users' => $users,
            'officers' => $officers
        ]);
    }

    public function add(Request $request){
        $request->validate([
            'id'=>'required'
        ]);

    }


}

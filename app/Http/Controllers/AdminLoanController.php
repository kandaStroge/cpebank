<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminIndexController extends Controller
{
    public function index(){

        return view('admin.home.index',[
            'title' => 'Admin Dashboard',
            'content_header'=> 'Admin Dashboard',
            'banks' => 'CPEBank',
            'name' => 'OK',

        ]);
    }

    public function __invoke(){
        return 'aaa';
    }
    public function test4(){

        return view('admin.home.4',[
            'title' => '4',
            'content_header'=> '4',
            'banks' => 'CPEBank',
            'name' => 'OK',

        ]);
    }
    public function test5(){

        return view('admin.home.5',[
            'title' => 'Admin 5',
            'content_header'=> '5',
            'banks' => 'CPEBank',
            'name' => 'OK',

        ]);
    }
    public function test6(){

        return view('admin.home.6',[
            'title' => '6',
            'content_header'=> '6',
            'banks' => 'CPEBank',
            'name' => 'OK',

        ]);

    }
    public function test7(){

        return view('admin.home.7',[
            'title' => '7',
            'content_header'=> '7',
            'banks' => 'CPEBank',
            'name' => 'OK',

        ]);
    }
}

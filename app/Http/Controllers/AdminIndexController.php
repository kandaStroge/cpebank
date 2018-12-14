<?php

namespace App\Http\Controllers;
use App\Models\Promotion;
use Illuminate\Support\Facades\DB;

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

    public function promotion(){
        $promotion = Promotion::all();

        return view('admin.home.5',[
            'title' => 'Promotion',
            'content_header'=> 'โปรโมชั่น/แนะนำบริการ',
            'banks' => 'CPEBank',
            'name' => 'OK',
            'promotion' => $promotion,

        ]);
    }

    public function promotion_del(Request $request){
        $pid = $request->get('id');
        $promotion = Promotion::find($pid);
        
        $promotion->delete();

        return response()->json([
            'status' => true,
        ]);
    }

    
    public function promotion_add(Request $request){
        $title = $request->get('title');
        $description = $request->get('description');
        $promotion = new Promotion;
        $promotion->promotion_name = $title;
        $promotion->description = $description;
        $promotion->save();

        return response()->json([
            'status' => true,
        ]);
    }

    public function promotion_edit(Request $request){
        $promotion = Promotion::find($request->get('id')); 
        $title = $request->get('title');
        $description = $request->get('description');

        $promotion->promotion_name = $title;
        $promotion->description = $description;
        $promotion->save();

        return response()->json([
            'status' => true,
        ]);
    }
}

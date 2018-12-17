<?php

namespace App\Http\Controllers;
use Illuminate\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Todolist;

class AdminTodolistController extends Controller
{

    public function todolist(){
        $todolist = Todolist::all();

        return view('admin.home.6',[
            'title' => 'Todolist',
        'content_header'=> 'Todolist',
        'banks' => 'CPEBank',
        'name' => 'OK',
        'todolist' => $todolist,

    ]);
}

    public function todolist_del(Request $request){
        $todolist->delete();

        return response()->json([
            'status' => true,
        ]);
    }


    public function todolist_add(Request $request){
        $description = $request->get('description');
        $todolist = new todolist;
        $todolist->description = $description;
        $todolist->save();

        return response()->json([
            'status' => true,
        ]);
    }

    public function todolist_edit(Request $request){
        $description = $request->get('description');

        $todolist->description = $description;
        $todolist->save();

        return response()->json([
            'status' => true,
        ]);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tracker;

class AdminTrackerController extends Controller
{
    public function tracker(){
        $tracker = Tracker::all();
        return view('admin.home.tracker',[
            'title' => 'Tracker',
            'content_header'=> 'Tracker',
            'banks' => 'CPEBank',
            'name' => 'OK',
            'tracker' => $tracker,

        ]);
    }


    public function add(Request $request){
        $amount = $request->get('amount');
        $interest_rate = $request->get('interest_rate');
        $tracker = new Tracker;
        $tracker->amount = $amount;
        $tracker->interest_rate = $interest_rate;
        $tracker->time = $time;
        $tracker->payback = $payback;
        $tracker->user_id = $user_id;
        $tracker->asset_id = $asset_id;
        $tracker->save();

        return response()->json([
            'status' => true,
        ]);
    }

    public function del(Request $request){
        $pid = $request->get('id');
        $tracker = Tracker::find($pid);

        $tracker->delete();

        return response()->json([
            'status' => true,
        ]);
    }



    public function edit(Request $request){
        $tracker = Tracker::find($request->get('id'));
        $amount = $request->get('amount');
        $interest_rate = $request->get('interest_rate');

        $tracker->amount = $amount;
        $tracker->interest_rate = $interest_rate;
        $tracker->time = $time;
        $tracker->payback = $payback;
        $tracker->user_id = $user_id;
        $tracker->asset_id = $asset_id;
        $tracker->save();

        return response()->json([
            'status' => true,
        ]);
    }
}

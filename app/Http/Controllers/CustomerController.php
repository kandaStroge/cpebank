<?php

namespace App\Http\Controllers;
use App\Models\Promotion;
use App\Models\Customer;
use App\Models\User;
use App\Models\Issue;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CustomerController extends Controller
{


    public function saveIssue(Request $request){

        $token = $request->session()->get('login-token');
        $user = User::where('token', $token)->first();
        $issue = new Issue;
        $issue->title = $request->get('title');
        $issue->description = $request->get('description');
        $issue->user_id = $user->id;
        $issue->save();


        return response()->json([
            'status' => true,
        ]);
    }

    public function sendIssue(Request $request){

        $token = $request->session()->get('token');
        $user = User::where('token', $token)->first();

        return view('customer.issue',[
            'title' => 'Send Issue',
            'user' => $user,

      
        ]);
    }


    public function viewPromotion(Request $requests){
        $promotion = Promotion::all();
        return view('customer.promotion',[
            'title' => 'Promotion',
            'promotion' => $promotion,
        ]);
    }

}

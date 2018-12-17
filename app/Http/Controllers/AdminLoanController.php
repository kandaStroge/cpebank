<?php

namespace App\Http\Controllers;
use Illuminate\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Loan;

class AdminLoanController extends Controller
{

    public function loan(){
        $loan = Loan::all();
        return view('admin.home.loan',[
            'title' => 'Loan',
            'content_header'=> 'Edit',
            'banks' => 'CPEBank',
            'name' => 'OK',
            'loan' => $loan,

        ]);
    }


    public function add(Request $request){
        $amount = $request->get('amount');
        $interest_rate = $request->get('interest_rate');
        $loan = new Loan;
        $loan->amount = $amount;
        $loan->interest_rate = $interest_rate;
        $loan->time = $time;
        $loan->payback = $payback;
        $loan->user_id = $user_id;
        $loan->asset_id = $asset_id;
        $loan->save();

        return response()->json([
            'status' => true,
        ]);
    }

    public function del(Request $request){
        $pid = $request->get('id');
        $loan = Loan::find($pid);

        $loan->delete();

        return response()->json([
            'status' => true,
        ]);
    }



    public function edit(Request $request){
        $loan = Loan::find($request->get('id'));
        $amount = $request->get('amount');
        $interest_rate = $request->get('interest_rate');

        $loan->amount = $amount;
        $loan->interest_rate = $interest_rate;
        $loan->time = $time;
        $loan->payback = $payback;
        $loan->user_id = $user_id;
        $loan->asset_id = $asset_id;
        $loan->save();

        return response()->json([
            'status' => true,
        ]);
    }

}

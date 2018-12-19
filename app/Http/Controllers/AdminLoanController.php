<?php

namespace App\Http\Controllers;
use App\Models\Loan;
use App\Models\Asset;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AdminLoanController extends Controller
{
    public function index(){
        return view('admin.home.index',[
            'title' => 'Admin Dashboard',
            'content_header'=> 'Admin Dashboard',
            'banks' => 'CPEBank',
            'name' => 'OK',
        ]);

    }

    public function loan(){
        $loan = Loan::all();

        return view('admin.home.loan',[
            'title' => 'loan',
              'content_header'=> 'เพิ่ม',
            'banks' => 'CPEBank',
            'name' => 'OK',
            'loan' => $loan,

        ]);
    }
    public function showloan(){
        $loan = Loan::all();
        return view('admin.home.loanshow',[
            'title' => 'loan',
            'content_header'=> 'แก้ไข',
            'banks' => 'CPEBank',
            'name' => 'OK',
            'loan' => $loan,

        ]);
    }
    public function loan_edit(Request $request){
      $loan = Loan::all();
      $loan->id = Loan::find($request->get('id'));
      if($loan->id == null){
        return redirect('/admin/asset')->withErrors("asset_id don't find!!!");
      }
      return view('admin.home.loanEdit',[
          'title' => 'loan',
          'content_header'=> 'แก้ไข',
          'banks' => 'CPEBank',
          'name' => 'OK',
          'loan' => $loan,

      ]);
    }



    public function loan_del(Request $request){
        $pid = $request->get('id');
        $loan = Loan::find($pid);
        $loan->delete();
        return
        redirect('/admin/loanshow');
    }


    public function loan_add(Request $request){
        $aid = Asset::all();
      $aid->id = Asset::find($request->get('asset_id'));
 if($aid->id == null){
   return redirect('/admin/asset')->withErrors("asset_id don't find!!!");
 }

 $uid = User::all();
 $uid->id = User::find($request->get('user_id'));
if($uid->id == null){
return redirect('/admin/user')->withErrors("user_id don't find!!!");
}
   //$aid->fails() $aid == null

   $loan = Loan::all();
      $amount = $request->get('amount');
      $interest_rate = $request->get('interest_rate');
      $time = $request->get('time');
      $payback = $request->get('payback');
      $user_id = $request->get('user_id');
      $asset_id = $request->get('asset_id');
      $loan = new Loan;
      //$loan = Loan::all();
      $loan->amount = $amount;
      $loan->interest_rate = $interest_rate;
	  	$loan->time = $time;
	    $loan->payback = $payback;
    	$loan->user_id = $user_id;
	    $loan->asset_id =  $asset_id;
      $loan->save();

        return
      redirect('/admin/loanshow');
    }


    public function loan_edit_send(Request $request){
      $loan = Loan::find($request->get('id'));
      $amount = $request->get('amount');
      $interest_rate = $request->get('interest_rate');
      $time = $request->get('time');
      $payback = $request->get('payback');
      $user_id = $request->get('user_id');
      $asset_id = $request->get('asset_id');

      $loan->amount = $amount;
      $loan->interest_rate = $interest_rate;
      $loan->time = $time;
      $loan->payback = $payback;
      $loan->user_id = $user_id;
      $loan->asset_id = $asset_id;
        $loan->save();

        return redirect('/admin/loanshow');
    }

}

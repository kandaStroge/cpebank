<?php

namespace App\Http\Controllers;

use App\Loan;
use Illuminate\Http\Request;

class CustomerLoanController extends Controller
{
    public function index(){
//        dd(session());
        if (session()->has('login-user-id')){
            $loan = Loan::where('user_id',session()->get('login-user-id'))->get();
            return view('customer.loan.loan', [
                'title' => 'กู้ยืม',
                'content_header' => 'กู้ยืม',
                'loan' => $loan,

            ]);
        }else{
            return redirect('/login');
        }


    }
}

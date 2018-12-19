<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerIndexController extends Controller
{
    public function index(){
//        dd(session());

        if (session()->has('customer_id')){
            return redirect('/customer/balance');
        }
        if (session()->has('officer_id')){
            return redirect('/admin');
        }

        return view('welcome');
    }
}

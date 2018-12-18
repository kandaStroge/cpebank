<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerIndexController extends Controller
{
    public function index(){
        if (session()->has('officer_id')){
            return 'admin';
        }

        if (session()->has('customer_id')){
            return 'cus';
        }
        return view('welcome');
    }
}

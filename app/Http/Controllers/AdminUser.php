<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

class AdminUser extends Controller
{
    public function index(){
        return User::all();
    }
    public function showOfficer($id){
        return User::find($id)->officers;
    }
}

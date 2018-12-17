<?php

namespace App\Http\Middleware;

use App\Officer;
use App\User;
use Closure;

class CheckOfficerRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if ($request->session()->has('token')) {
            $user = User::where('token', $request->session()->get('token'))->first();
            if ($role === "officer") {
                $officer = Officer::where('user_id', $user->id);
                if ($officer->first()) {
                    $request->session()->push('officer_id', $officer->first()->id);
                    return $next($request);
                }
            }
            if($role === "customer"){
                $customer = Customer::where('user_id',$user->id)->first();
                if($customer){
                    $request->session()->push('customer_id', $customer->id);
                    return $next($request);
                }
            }



        } return redirect('/login');
    }
}

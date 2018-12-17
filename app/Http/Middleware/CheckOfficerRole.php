<?php

namespace App\Http\Middleware;

use App\Customer;
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
//    dd($request->session()->has('login-token'));
        if ($request->session()->has('login-token')) {
            $user = User::where('token', $request->session()->get('login-token'))
                ->first();

            if ($user != null) {
                $request->session()->put('login-user-fname', $user->fname);
                if ($role === "officer") {
                    $officer = Officer::where('user_id', $user->id)->first();
                    if ($officer != null) {
                        $request->session()->put('officer_id', $officer->id);
                        return $next($request);
                    }else{
                        return redirect('/logout/');
                    }
                }
                if ($role === "customer") {
                    $customer = Customer::where('user_id', $user->id)->first();
                    if ($customer != null) {
                        $request->session()->put('customer_id', $customer->id);
                        return $next($request);
                    }else{
                        return redirect('/logout/');
                    }
                }
            }else{
                return redirect('/logout/');
            }

        }
        $lastest = $request->path();
        return redirect('/login/')->with('lastest-url', $lastest);
    }
}

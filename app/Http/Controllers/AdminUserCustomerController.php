<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminUserCustomerController extends Controller
{
    public function index(){
        return  redirect('/admin/user/customer/show');
    }

    public function show(){
        $users = DB::table("user")->whereNotIn('id',function($query) {
            $query->select('user_id')->from('customer');
        })->get();
        $customers = Customer::all();
        return view('admin.user.customer.add', [
            'title' => 'จัดการลูกค้า',
            'content_header' => 'จัดการลูกค้า',
            'users' => $users,
            'customers' => $customers
        ]);
    }

    public function add(Request $request){
        $request->validate([
            'uid'=>'required'
        ]);

        $customer = new Customer();
        $customer->user_id = $request->uid;
        if ($customer->save()){
            return redirect('admin/user/customer')->with('report-message', [
                'code' => 1,
                'message' => 'เพิ่มลูกค้าใหม่เรียบร้อย'
            ]) ;
        }else{
            return redirect('admin/user/customer')->with('report-message', [
                'code' => 0,
                'message' => 'มีบางอย่างผิดพลาด'
            ]) ;
        }


    }

    public function delete(Request $request){

        $request->validate([
            'cid'=>'required'
        ]);


        $customer = Customer::findOrFail($request->cid)->first();

        if ($customer->delete()){
            return redirect('admin/user/customer')->with('report-message', [
                'code' => 1,
                'message' => 'ลบลูกค้าไปแล้ว'
            ]) ;
        }else{
            return redirect('admin/user/customer')->with('report-message', [
                'code' => 0,
                'message' => 'มีบางอย่างผิดพลาด'
            ]) ;
        }


    }
}

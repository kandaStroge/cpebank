<?php

namespace App\Http\Controllers;

use App\Customer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function PHPSTORM_META\type;

class AdminTransactionController extends Controller
{
    public function index()
    {
        $content_menus = [
            [
                'title' => 'ฝากเงิน',
                'link' => 'transaction/deposit',
                'color' => ''
            ],
            [
                'title' => 'ถอนเงิน',
                'link' => 'transaction/draw',
                'color' => ''
            ],
            [
                'title' => 'โอนเงิน',
                'link' => 'transaction/transfer',
                'color' => ''
            ],


        ];
        return view('admin.user.index', [
            'title' => ' ระบบจัดการผู้ใช้',
            'content_header' => 'ระบบจัดการผู้ใช้',
            'content_menus' => $content_menus,

        ]);
    }

    public function check(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);
        $customer = Customer::findOrFail($request->id);
        $user_id = $customer->user_id;
        $user = User::findOrFail($user_id);
        if ($user) {
            return response()->json([
                'isOk' => true,
                'user' => $user->fname . ' ' . $user->lname,
                'result' => $customer->balance
            ]);
        } else {
            return response()->json([
                'isOk' => false,
            ]);
        }

    }

    public function deposit(Request $request)
    {

        if ($request->isMethod('get')) {
            return view('admin.transaction.deposit', [
                'title' => 'ฝากเงิน',
                'content_header' => 'ฝากเงิน',


            ]);
        } elseif ($request->isMethod('post')) {
            $request->validate([
                'cid' => 'required',
                'balance' => 'required',

            ]);
            $balance = floatval($request->balance);

            if ($balance >= 0) {
                DB::beginTransaction();
                $customer = Customer::findOrFail($request->cid);
                $customer->balance += $balance;
                $customer->save();
                DB::commit();
                return redirect('admin/transaction')->with('report-message', [
                    'code' => 1,
                    'message' => 'ฝากเงินเข้าบัญชี #' . $request->cid . ' เป็นจำนวน ' . $request->balance . ' บาท เรียบร้อยแล้ว'
                ]);

            } else {
                return redirect('admin/transaction')->with('report-message', [
                    'code' => 0,
                    'message' => 'ผิดพลาด กรอกค่าเงินไม่ถูกต้อง (ต้องเป็น ค่าบวก เท่านั้น) '
                ]);
            }


        } else {
            return redirect('admin/transaction')->with('report-message', [
                'code' => 0,
                'message' => 'Error unknow method'
            ]);
        }

    }


    public function draw(Request $request)
    {

        if ($request->isMethod('get')) {
            return view('admin.transaction.draw', [
                'title' => 'ถอนเงิน',
                'content_header' => 'ถอนเงิน',


            ]);
        } elseif ($request->isMethod('post')) {
            $request->validate([
                'cid' => 'required',
                'balance' => 'required',

            ]);
            $balance = floatval($request->balance);

            if ($balance >= 0) {
                DB::beginTransaction();
                $customer = Customer::findOrFail($request->cid);
                $maximum_draw = $customer->balance - $balance;
                if ($maximum_draw < 0) {
                    DB::rollBack();
                    return redirect('admin/transaction')->with('report-message', [
                        'code' => 0,
                        'message' => 'ผิดพลาด ถอนเงินได้ไม่เงิน ' . $customer->balance . ' บาท'
                    ]);
                } else {
                    $customer->balance -= $balance;
                    $customer->save();
                    DB::commit();
                    return redirect('admin/transaction')->with('report-message', [
                        'code' => 1,
                        'message' => 'ถอนเงินออกจากบัญชี #' . $request->cid . ' เป็นจำนวน ' . $request->balance . ' บาท เรียบร้อยแล้ว'
                    ]);
                }

            } else {
                return redirect('admin/transaction')->with('report-message', [
                    'code' => 0,
                    'message' => 'ผิดพลาด กรอกค่าเงินไม่ถูกต้อง (ต้องเป็น ค่าบวก เท่านั้น) '
                ]);
            }


        } else {
            return redirect('admin/transaction')->with('report-message', [
                'code' => 0,
                'message' => 'Error unknow method'
            ]);
        }

    }

    public function transfer(Request $request)
    {

        if ($request->isMethod('get')) {
            return view('admin.transaction.tranfer', [
                'title' => 'โอนเงิน',
                'content_header' => 'โอนเงิน',


            ]);
        } elseif ($request->isMethod('post')) {
            $request->validate([
                'scid' => 'required',
                'dcid' => 'required',
                'balance' => 'required',

            ]);
            $balance = floatval($request->balance);

            if ($balance >= 0) {
                DB::beginTransaction();
                $source_customer = Customer::findOrFail($request->scid);
                $source_customer->balance -= $balance;
                $source_customer->save();
                $dest_customer = Customer::findOrFail($request->dcid);
                $dest_customer->balance += $balance;
                $dest_customer->save();
                DB::commit();
                return redirect('admin/transaction')->with('report-message', [
                    'code' => 1,
                    'message' => 'ฝากเงินเข้าบัญชี #' . $request->scid . 'ไปยัง '.$request->dcid.' เป็นจำนวน ' . $request->balance . ' บาท เรียบร้อยแล้ว'
                ]);

            } else {
                return redirect('admin/transaction')->with('report-message', [
                    'code' => 0,
                    'message' => 'ผิดพลาด กรอกค่าเงินไม่ถูกต้อง (ต้องเป็น ค่าบวก เท่านั้น) '
                ]);
            }


        } else {
            return redirect('admin/transaction')->with('report-message', [
                'code' => 0,
                'message' => 'Error unknow method'
            ]);
        }

    }

}

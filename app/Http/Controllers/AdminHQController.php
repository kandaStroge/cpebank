<?php

namespace App\Http\Controllers;

use App\Headquarter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminHQController extends Controller
{
    public function index()
    {
        $content_menus = [
            [
                'title' => 'Add Headquarter',
                'link' => 'hq/add',
                'color' => ''
            ],
            [
                'title' => 'Show Headquarter',
                'link' => 'hq/show',
                'color' => ''
            ],

        ];
        return view('admin.hq.index', [
            'title' => 'Headquarter Manager',
            'content_header' => 'Headquarter Manager',
            'content_menus' => $content_menus,

        ]);
    }

    public function add_show()
    {
        $provs = DB::table('provinces')
            ->orderBy('name_en', 'ASC')
            ->select('id', 'name_th', 'name_en')
            ->get();


        return view('admin.hq.add', [
            'title' => 'Add new headquarter',
            'content_header' => 'Add new headquarter',
            'provs' => $provs,
        ]);
    }

    public function hq_show()
    {
        $hq = DB::table('bank_headquarter')
            ->join('provinces', 'bank_headquarter.provincesId', '=', 'provinces.id')
            ->select('bank_headquarter.*', 'provinces.*')
            ->get();

        return view('admin.hq.show', [
            'title' => 'Headquarter Manager',
            'content_header' => 'Headquarter Manager',
            'hqs' => $hq,

        ]);

    }

    public function add(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'prov' => 'required',
        ]);
        $hq = new Headquarter();
        $hq->hqName = $request['title'];
        $hq->provincesId = $request['prov'];
        $hq->save();

        return redirect('admin/hq/')->with('report-message', [
            'code' => 1,
            'message' => 'Headquarter Saved!'
        ]);

    }

    public function delete(Request $request)
    {
        $hq = Headquarter::where('hqId', $request->hqId)->delete();

        if ($hq)
            return redirect('admin/hq/show')->with('report-message', [
                'code' => 1,
                'message' => 'Deleted successful'
            ]);
        else
            return redirect('admin/hq/show')->with('report-message', [
                'code' => 0,
                'message' => 'Error Cannot Deleted'
            ]);
    }

    public function edit(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect('admin/hq/show')->with('report-message', [
                'code' => 0,
                'message' => 'Connot direct edit'
            ]);
        } elseif ($request->isMethod('post')) {
            $hq = DB::table('bank_headquarter')
                ->where('hqId', $request['hqId'])
                ->select('hqName')
                ->get();

            $provs = DB::table('provinces')
                ->orderBy('name_en', 'ASC')
                ->select('id', 'name_th', 'name_en')
                ->get();

            $vid = $request['prov'];

            return view('admin.hq.edit', [
                'title' => 'Headquarter Manager',
                'content_header' => 'Headquarter Manager',
                'hqName' => $hq,
                'provs' => $provs,
                'vid' => $vid,
                'hqId' => $request['hqId']

            ]);

        } else {
            return redirect('admin/hq/show')->with('report-message', [
                'code' => 0,
                'message' => 'Error unknow method'
            ]);
        }


    }

    public function edit_send(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect('admin/hq/show')->with('report-message', [
                'code' => 0,
                'message' => 'Connot direct editw'
            ]);
        } elseif ($request->isMethod('post')) {
            $hq = DB::table('bank_headquarter')
                ->where('hqId', $request->hqId)
                ->update(['hqName' => $request['title'], 'provincesId' => $request['prov']]);
            if ($hq) {
                return redirect('admin/hq/show')->with('report-message', [
                    'code' => 1,
                    'message' => 'Edit ' . $request->title . ' Sucessfully'
                ]);
            } else {
                return redirect('admin/hq/show')->with('report-message', [
                    'code' => 0,
                    'message' => 'Error Cannot Update'
                ]);
            }


        } else {
            return redirect('admin/hq/show')->with('report-message', [
                'code' => 0,
                'message' => 'Error unknow method'
            ]);
        }
    }


}

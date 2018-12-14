<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Headquarter;
use Illuminate\Http\Request;

class AdminBranchController extends Controller
{
    public function index()
    {
        $content_menus = [
            [
                'title' => 'Add Branch',
                'link' => 'branch/add',
                'color' => ''
            ],
            [
                'title' => 'Show Branch',
                'link' => 'branch/show',
                'color' => ''
            ],

        ];
        return view('admin.branch.index', [
            'title' => 'Branch Manager',
            'content_header' => 'Branch Manager',
            'content_menus' => $content_menus,

        ]);
    }

    public function show()
    {
        $branchs = Branch::all()->join('');

        return view('admin.branch.show', [
            'title' => 'Branch Manager',
            'content_header' => 'Branch Manager',
            'branchs' => $branchs

        ]);
    }

    public function add(Request $request)
    {
        if ($request->isMethod('get')) {
            $hqs = Headquarter::all();
            return view('admin.branch.add', [
                'title' => 'Branch Manager',
                'content_header' => 'Branch Manager',
                'hqs' => $hqs

            ]);
        } elseif ($request->isMethod('post')) {
            $request->validate([
                'bbName' => 'required',
                'bbBranchName' => 'required',
                'hq' => 'required'
            ]);
            $bb = new Branch();
            $bb->bbName = $request->bbName;
            $bb->bbBranchName = $request->bbBranchName;
            $bb->hqId = $request->hq;
            $bb->save();
            if ($bb) {
                return redirect('admin/branch/show')->with('report-message', [
                    'code' => 1,
                    'message' => 'Edit ' . $request->bbName . ' Sucessfully'
                ]);
            } else {
                return redirect('admin/branch/show')->with('report-message', [
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

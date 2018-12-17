<?php

namespace App\Http\Controllers;
use App\Models\Report;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AdminReportController extends Controller
{
    public function index(){
        return view('admin.home.index',[
            'title' => 'Admin Dashboard',
            'content_header'=> 'Admin Dashboard',
            'banks' => 'CPEBank',
            'name' => 'OK',
        ]);

    }

    public function report(){
        $report = Report::all();

        return view('admin.home.report',[
            'title' => 'report',
            'content_header'=> 'ปัญหา',
            'banks' => 'CPEBank',
            'name' => 'OK',
            'report' => $report,

        ]);
    }
    public function showreport(){
        $report = Report::all();

        return view('admin.home.showreport',[
            'title' => 'report',
            'content_header'=> 'ปัญหา',
            'banks' => 'CPEBank',
            'name' => 'OK',
            'report' => $report,

        ]);
    }

    public function report_del(Request $request){
        $pid = $request->get('id');
        $report = Report::find($pid);

        $report->delete();

        return response()->json([
            'status' => true,
        ]);
    }


    public function report_add(Request $request){
        $title = $request->get('title');
        $description = $request->get('description');
        $report = new report;
        $report->report_name = $title;
        $report->description = $description;
        $report->save();

        return response()->json([
            'status' => true,
        ]);
    }

    public function report_edit(Request $request){
        $report = report::find($request->get('id'));
        $title = $request->get('title');
        $description = $request->get('description');

        $report->report_name = $title;
        $report->description = $description;
        $report->save();

        return response()->json([
            'status' => true,
        ]);
    }
}

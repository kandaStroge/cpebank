<?php

namespace App\Http\Controllers;
use App\Models\Asset;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AdminAssetController extends Controller
{


    public function asset(){
        $asset = Asset::all();

        return view('admin.home.asset',[
            'title' => 'asset',
            'content_header'=> 'ปัญหา',
            'banks' => 'CPEBank',
            'name' => 'OK',
            'asset' => $asset,

        ]);
    }


    public function asset_del(Request $request){
        $pid = $request->get('id');
        $asset = Asset::find($pid);

        $asset->delete();

        return redirect('/admin/asset');

    }


    public function asset_add(Request $request){
        $name = $request->get('name');
        $value = $request->get('value');
        $asset = new Asset;
        $asset->name = $name;
        $asset->value = $value;
        $asset->save();

        return redirect('/admin/asset');
    }

    public function asset_edit(Request $request){
        $asset = Asset::find($request->get('id'));
        $name = $request->get('name');
        $value = $request->get('value');

        $asset->name = $name;
        $asset->value = $value;
        $asset->save();

        return redirect('/admin/asset');

    }
}

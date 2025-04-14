<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RightInfo;

class RightInfoController extends Controller
{
    //
    public function detail(){
        $data = RightInfo::first();
        return view('Admin.services.right_info.detail',compact('data'));
    }

    public function update(Request $request){
       
        if($request->img!=null)
        $request->merge(['img' => $this->MoveImage($request->img,'uploads/customer/video-info')]);

        $info = RightInfo::first();
        $info->update($request->except(['file','_token','_method']));
        return redirect()->back();

    }

}

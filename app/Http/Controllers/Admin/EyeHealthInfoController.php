<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EyeHealthInfo;
use App\Traits\fileTrait;


class EyeHealthInfoController extends Controller
{
    //
    use fileTrait;

    public function detail(){
        $data = EyeHealthInfo::first();
        return view('Admin.services.eye_health_info.detail',compact('data'));
    }

    public function update(Request $request){
       
        if($request->file!=null)
        $request->merge(['img' => $this->MoveImage($request->file,'uploads/eye-info')]);

        $healthInfo = EyeHealthInfo::first();
        $healthInfo->update($request->except(['file','_token','_method']));
        return redirect()->back();

    }
}

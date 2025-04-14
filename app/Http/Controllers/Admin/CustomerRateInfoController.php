<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerRateInfo;

class CustomerRateInfoController extends Controller
{
    //

    public function detail(){
        $data = CustomerRateInfo::first();
        return view('Admin.services.customer_rate_info.detail',compact('data'));
    }

    public function update(Request $request){
       
        if($request->img!=null)
        $request->merge(['img' => $this->MoveImage($request->img,'uploads/customer/video-info')]);

        $info = CustomerRateInfo::first();
        $info->update($request->except(['file','_token','_method']));
        return redirect()->back();

    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InsurancePartnerInfo;

class InsurancePartnerInfoController extends Controller
{
    //

    public function detail(){
        $data = InsurancePartnerInfo::first();
        return view('Admin.services.partner_info.detail',compact('data'));
    }

    public function update(Request $request){
       
        if($request->file!=null)
        $request->merge(['img' => $this->MoveImage($request->file,'uploads/partners')]);

        $healthInfo = InsurancePartnerInfo::first();
        $healthInfo->update($request->except(['file','_token','_method']));
        return redirect()->back();

    }

}

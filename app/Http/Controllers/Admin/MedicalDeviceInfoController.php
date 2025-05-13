<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MedicalDeviceInfo;
use App\Traits\fileTrait;

class MedicalDeviceInfoController extends Controller
{

    use fileTrait;
    public function detail()
    {
        $data = MedicalDeviceInfo::first();
        return view('Admin.services.medical_device_info.detail',compact('data'));
    }

    public function update(Request $request)
    {
        $info = MedicalDeviceInfo::first();
        if($request->file!=null)
            $request->merge(['img' => $this->MoveImage($request->file,'uploads/medical-devices')]);

        $info->update($request->except(['file', '_token','_method']));
        return redirect()->back();

    }
}

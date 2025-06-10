<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Traits\fileTrait;
use App\Models\MedicalAcademyInfo;

class MedicalAcademyInfoController extends Controller
{
    use fileTrait;

    public function detail()
    {
        $data = MedicalAcademyInfo::first();
        return view('Admin.services.medical_academy_info.detail',compact('data'));
    }

    public function update(Request $request)
    {
        $info = MedicalAcademyInfo::first();

        if($request->file!=null)
            $request->merge(['img' => $this->MoveImage($request->file,'uploads/medical-academies')]);

        $info->update($request->except(['file', '_token','_method']));
        return redirect()->back();
    }
}

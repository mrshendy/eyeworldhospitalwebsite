<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MedicalTourismInfo;
use App\Traits\fileTrait;
use Illuminate\Http\Request;

class MedicalTourismInfoController extends Controller
{
    use fileTrait;

    public function detail()
    {
        $data = MedicalTourismInfo::first();

        return view('Admin.services.medical_tourism_info.detail', compact('data'));
    }

    public function update(Request $request)
    {
        $info = MedicalTourismInfo::first();
        if ($request->file != null) {
            $request->merge(['img' => $this->MoveImage($request->file, 'uploads/medical-tourisms')]);
        }

        $info->update($request->except(['file', '_token', '_method']));

        return redirect()->back();

    }
}

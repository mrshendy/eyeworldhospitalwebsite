<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ConferenceInfo;
use App\Traits\fileTrait;


class ConferenceInfoController extends Controller
{
    use fileTrait;

    public function detail()
    {
        $data = ConferenceInfo::first();
        return view('Admin.services.conferences.detail',compact('data'));
    }

    public function update(Request $request)
    {
        $info = ConferenceInfo::first();
        if($request->file!=null)
            $request->merge(['img' => $this->MoveImage($request->file,'uploads/conferences')]);

        $info->update($request->except(['file', '_token','_method']));
        return redirect()->back();

    }
}

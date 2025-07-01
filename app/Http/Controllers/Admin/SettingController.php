<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\fileTrait;
use App\Models\Setting;

class SettingController extends Controller
{

    use fileTrait;

    public function index()
    {
        $data = Setting::first();
        return view('Admin.services.settings.index',compact('data'));
    }

    public function update(Request $request)
    {
        $info = Setting::first();
        if($request->file!=null)
            $request->merge(['logo' => $this->MoveImage($request->file,'uploads/settings')]);

        $info->update($request->except(['file', '_token','_method']));
        return redirect()->back();

    }
}

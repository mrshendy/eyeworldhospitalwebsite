<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Traits\fileTrait;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use fileTrait;

    public function index()
    {
        $data = Setting::first();

        return view('Admin.services.settings.index', compact('data'));
    }

    public function update(Request $request)
    {
        $info = Setting::first();
        if ($request->file != null) {
            $request->merge(['logo' => $this->MoveImage($request->file, 'uploads/settings')]);
        }

        $info->update($request->except(['file', '_token', '_method']));

        return redirect()->back();

    }
}

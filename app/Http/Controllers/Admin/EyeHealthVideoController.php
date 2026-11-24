<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EyeHealthVideo;
use Illuminate\Http\Request;

class EyeHealthVideoController extends Controller
{
    //

    public function detail()
    {
        $data = EyeHealthVideo::first();

        return view('Admin.services.eye_health_video.detail', compact('data'));
    }

    public function update(Request $request)
    {

        if ($request->img != null) {
            $request->merge(['img' => $this->MoveImage($request->img, 'uploads/eye-info')]);
        }

        $healthVideo = EyeHealthVideo::first();
        $healthVideo->update($request->except(['file', '_token', '_method']));

        return redirect()->back();

    }
}

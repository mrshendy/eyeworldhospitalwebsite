<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomerVideoInfo;
use Illuminate\Http\Request;

class CustomerVideoController extends Controller
{
    //

    public function detail()
    {
        $data = CustomerVideoInfo::first();

        return view('Admin.services.customer_video.detail', compact('data'));
    }

    public function update(Request $request)
    {

        if ($request->img != null) {
            $request->merge(['img' => $this->MoveImage($request->img, 'uploads/customer/video-info')]);
        }

        $healthVideo = CustomerVideoInfo::first();
        $healthVideo->update($request->except(['file', '_token', '_method']));

        return redirect()->back();

    }
}

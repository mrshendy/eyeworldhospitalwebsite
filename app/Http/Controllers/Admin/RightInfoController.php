<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RightInfo;

class RightInfoController extends Controller
{
    //
    public function detail(){
        $data = RightInfo::first();
        return view('Admin.services.right_info.detail',compact('data'));
    }

    public function update(Request $request){

        $info = RightInfo::first();

        $request->validate([
            'file' => 'nullable|mimes:pdf,doc,docx',
        ]);

        $updateData = $request->except(['file', '_token', '_method']);

        if ($request->hasFile('file')) {
            if ($info->file && file_exists(public_path('uploads/files/right_infos/' . basename($info->file)))) {
                unlink(public_path('uploads/files/right_infos/' . basename($info->file)));
            }
            $updateData['file'] = $this->uploadFile($request->file('file'), 'uploads/files/right_infos');
        }

        $info->update($updateData);

        return redirect()->back();

    }

    private function uploadFile($file, $path)
    {
        if (!file_exists(public_path($path))) {
            mkdir(public_path($path), 0777, true);
        }

        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($path), $filename);

        return $path . '/' . $filename;
    }


}

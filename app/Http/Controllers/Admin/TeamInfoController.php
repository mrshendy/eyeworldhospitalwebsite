<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeamInfo;

class TeamInfoController extends Controller
{
    //
      public function detail(){
        $data = TeamInfo::first();
        return view('Admin.team_info.detail',compact('data'));
    }

    public function update(Request $request){
       
        if($request->img!=null)
        $request->merge(['img' => $this->MoveImage($request->img,'uploads/customer/video-info')]);

        $info = TeamInfo::first();
        $info->update($request->except(['file','_token','_method']));
        return redirect()->back();

    }
}

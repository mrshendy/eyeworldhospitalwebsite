<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{About,Quetion};

use DataTables;
use Yajra\DataTables\Html\Builder;
use Carbon\Carbon;

class AboutController extends Controller
{
    //
    public function edit(Request $request,$id){
       $data = About::find($id);
       return view('Admin.about.edit',compact('data'));
    }

    public function Update(Request $request,$id){
        $data = About::first();
        $data->update($request->all());
        return redirect()->back();
    }
}

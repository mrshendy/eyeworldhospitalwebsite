<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{EyeHealthInfo,Article};

class EyeHealthInfoController extends Controller
{
    //
    public function index(){
        $data = EyeHealthInfo::first();
        $articles = Article::orderby('id','desc')->get()->take(8);
        return view('Site.service.eye_info.index',compact('data','articles'));
    }
}

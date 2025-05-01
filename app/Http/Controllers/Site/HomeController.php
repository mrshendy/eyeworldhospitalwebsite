<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{About,Quetion,ContactUs};
use App;
use Alert;

class HomeController extends Controller
{
    //
    public function index(){
        $about    = About::first();
        $quetions = Quetion::get();
        return view('Site.home.index',compact('about','quetions'));
    }

    public function contactUs(Request $request){
    
        ContactUs::create($request->all());
        Alert::success(__('Success'), __('your request sent seccessfuly'));
        return redirect()->back();
    }
}

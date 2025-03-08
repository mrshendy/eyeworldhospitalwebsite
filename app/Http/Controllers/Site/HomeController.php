<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{About,Quetion,ContactUs};
use App;

class HomeController extends Controller
{
    //
    public function index(){
        App::setLocale('ar');
        $about    = About::first();
        $quetions = Quetion::get();
        return view('Site.home.index',compact('about','quetions'));
    }

    public function contactUs(Request $request){
       

        ContactUs::create($request->all());
        return redirect()->back();
    }
}

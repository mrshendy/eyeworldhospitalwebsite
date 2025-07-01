<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{About,Quetion,ContactUs, Conference, InsurancePartner, Specialtie, Slider};
use Alert;

class HomeController extends Controller
{
    //
    public function index()
    {
        $about    = About::first();
        $quetions = Quetion::orderBy('created_at', 'desc')->take(6)->get();
        $conferences = Conference::orderBy('created_at', 'desc')->take(4)->get();
        $insurance_partners = InsurancePartner::orderBy('created_At', 'desc')->take(4)->get();
        $specialities = Specialtie::orderBy('created_At', 'desc')->take(3)->get();
        $sliders = Slider::get();
        return view('Site.home.index',compact('about','quetions', 'conferences', 'insurance_partners', 'specialities', 'sliders'));
    }

    public function contactUs(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ], [], [
            'name' => 'الاسم',
            'email' => 'البريد الإلكتروني',
            'message' => 'الرسالة',
        ]);
        ContactUs::create($data);
        // Alert::success(__('Success'), __('your request sent seccessfuly'));
        return response()->json([
            'status' => 'success',
            'message' => __('your request sent seccessfuly')
        ]);
    }

}

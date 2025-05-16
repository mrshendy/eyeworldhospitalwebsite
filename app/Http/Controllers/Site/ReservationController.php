<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Doctor,Country,Reservation};

class ReservationController extends Controller
{
    //

    public function index($doctor_id){
        $doctor     = Doctor::find($doctor_id);
        $country  = Country::first();
        return view('Site.reservations.index',compact('doctor','country'));
    }


    public function store(Request $request){      
        Reservation::create([
             'doctor_id'     => $request->doctor_id,
             'specialtie_id' => $request->specialtie_id,
             'urgent'        => $request->urgent,
             'patient_name'   => $request->name,
             'country_id'    => $request->country_id
        ]);
        return redirect()->back();
    }
}

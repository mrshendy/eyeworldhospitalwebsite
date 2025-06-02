<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Doctor,Country,Reservation,Day,DoctorAppointment,DoctorPrice};
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use DateTime;

class ReservationController extends Controller
{
    //

    public function index($doctor_id,$reservationType){
        $doctor     = Doctor::find($doctor_id);
        $country    = Country::first();
        $price      = DoctorPrice::where('doctor_id',$doctor_id)->first();
        $dayName  = Carbon::now()->format('l');
        $day =Day::where('name',$dayName)->first();
        $appointments = DoctorAppointment::where('day_id',$day->id)->where(['doctor_id'=>$doctor_id ,'day_id'=>$day->id])->get();
       
        return view('Site.reservations.index',compact('doctor','country','appointments','price','reservationType'));
    }


    public function store(Request $request){    
    
        Reservation::create([
             'doctor_id'     => $request->doctor_id,
             'specialtie_id' => $request->specialtie_id,
             'urgent'        => $request->urgent,
             'patient_name'  => $request->name,
             'phone'         => $request->phone,
             'country_id'    => $request->country_id,
             'type'          => $request->type,
             'time_from'     => $request->time_from,
             'date'          => $formattedDate = DateTime::createFromFormat('d-m-Y', $request->date)->format('Y-m-d'),
             'price'         => ($request->urgent == 0) ? $request->price : $request->urgent_price
        ]);
     
      Alert::success(__('Success'),__('booking Successefuly'));
      return redirect()->back(); 
      
      return redirect()->route('Site.reservation.index',[$request->doctor_id,$request->type])
                     ->with('success', 'Reservation submitted successfully!');
    }


    public function doctorAppointment($doctor_id,$date){
       
            $dayName = Carbon::parse($date)->format('l');
            $day =Day::where('name',$dayName)->first();
            $appointments = DoctorAppointMent::where('day_id',$day->id)->where(['doctor_id'=>$doctor_id ,'day_id'=>$day->id])->get();
         return view('Site.componants.appointments',compact('appointments'));
        }
}

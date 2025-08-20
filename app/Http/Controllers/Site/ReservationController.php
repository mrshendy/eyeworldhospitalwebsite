<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Doctor,Country,Reservation, ExpatVisitDetailsReservation,Day,DoctorAppointment,DoctorPrice};
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use DateTime;
use Illuminate\Support\Facades\Auth;

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

        $reservation = Reservation::create([
            'user_id' => Auth::id(),
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

        // Check if the reservation is Expat
        if($request->type == 'Expat_visit'){
            ExpatVisitDetailsReservation::create([
                'reservation_id'            => $reservation->id,
                'complaint'                 => $request->complaint,
                'medical_history'           => $request->medical_history,
                'attachment'                => $request->attachment,
                'treating_doctor'           => $request->treating_doctor,
                'treating_doctor_speciality'=> $request->treating_doctor_speciality,
                'treating_doctor_phone'     => $request->treating_doctor_phone,
            ]);
        }

      Alert::success(__('Success'),__('booking Successefuly'));
      return redirect()->back();

      return redirect()->route('Site.reservation.index',[$request->doctor_id,$request->type])
                     ->with('success', 'Reservation submitted successfully!');
    }


    public function doctorAppointment($doctor_id,$date)
    {
        $dayName = Carbon::parse($date)->format('l');
        $day =Day::where('name',$dayName)->first();
        $appointments = DoctorAppointMent::where('day_id',$day->id)->where(['doctor_id'=>$doctor_id ,'day_id'=>$day->id])->get();
        return view('Site.componants.appointments',compact('appointments'));
    }


    public function user_reservations()
    {
        $reservations = Reservation::where('user_id', Auth::id())->latest()->get();

        return view('Site.reservations.user_reservations', compact('reservations'));
    }

    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);

        if ($reservation->user_id !== Auth::id()) {
            return redirect()->route('Site.user_reservations')->with('error', __('You do not have permission to view this reservation.'));
        }

        return view('Site.reservations.show', compact('reservation'));
    }


    public function cancel($id)
    {
        $reservation = Reservation::where('id', $id)->where('user_id', Auth::id())->first();

        if (!$reservation) {
            Alert::error(__('Error'), __('Reservation not found or you do not have permission to cancel it.'));
            return redirect()->route('Site.user_reservations');
        }

        $reservation->update(['status' => 'cancelled']);

        Alert::success(__('Success'), __('Reservation cancelled successfully'));
        return redirect()->route('Site.user_reservations');
    }
}

<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Doctor,Specialtie,TeamInfo};


class TeamController extends Controller
{
    //
    public function index($id){
        $info = TeamInfo::first();
        $Specialties = Specialtie::get();
        $Specialtie = Specialtie::find($id);
        $doctors = Doctor::whereHas('specialtie',function($q)use($id){
            $q->where('specialtie_id',$id);
        })->get();
        return view('Site.teams.index',compact('info','Specialties','Specialtie','doctors','id'));
    }

    public function profile($doctor_id, $specialtie_id){
        $Specialtie = Specialtie::find($specialtie_id);
        $doctor = Doctor::with(['info','partners','subspecialties','partners','serviceinfo'])->find($doctor_id);
        return view('Site.teams.profile',compact('doctor','Specialtie'));
    }
}

<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Doctor,Specialtie,TeamInfo};


class TeamController extends Controller
{
    //
    public function index($specialty_slug){
        $info = TeamInfo::first();
        $Specialties = Specialtie::get();
        $Specialtie = Specialtie::where('slug', $specialty_slug)->firstOrFail();
        $doctors = Doctor::whereHas('specialtie',function($q)use($Specialtie){
            $q->where('specialtie_id',$Specialtie->id);
        })->get();
        return view('Site.teams.index',compact('info','Specialties','Specialtie','doctors','specialty_slug'));
    }

    public function profile($doctor_slug, $specialty_slug = null){
        $doctor = Doctor::where('slug', $doctor_slug)->with(['info','partners','subspecialties','partners','serviceinfo'])->firstOrFail();

        $Specialtie = null;
        if ($specialty_slug) {
            $Specialtie = Specialtie::where('slug', $specialty_slug)->first();
        } elseif ($doctor->specialtie) {
            $Specialtie = Specialtie::find($doctor->specialtie->specialtie_id);
        }

        return view('Site.teams.profile',compact('doctor','Specialtie'));
    }
}

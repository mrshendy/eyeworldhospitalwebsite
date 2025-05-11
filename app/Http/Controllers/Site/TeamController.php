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
        return view('Site.teams.index',compact('info','Specialties','Specialtie','doctors'));
    }
}

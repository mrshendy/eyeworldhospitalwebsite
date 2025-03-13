<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Specialtie,SubSpecialtie,SubSpecialtieType};


class SpecialtieController extends Controller
{
    //
    public function index($id){
        $specialtie    = Specialtie::find($id);
        $SubSpecialties = SubSpecialtie::where('specialtie_id',$id)->get();
        return view('Site.specialtie.index',compact('SubSpecialties','specialtie'));
    }

    public function subSpecialtieDetail($id){
        $SubSpecialtie    = SubSpecialtie::find($id);
        $specialtie       = Specialtie::find($SubSpecialtie->specialtie_id);
        $SubSpecialtieTypes = SubSpecialtieType::where('sub_specialtie_id',$id)->get();
        return view('Site.specialtie.sub-specialtie-detail',compact('SubSpecialtie','SubSpecialtieTypes','specialtie'));   
    }
}

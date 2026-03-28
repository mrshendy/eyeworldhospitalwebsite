<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Specialtie,SubSpecialtie,SubSpecialtieType};


class SpecialtieController extends Controller
{
    //
    public function index($slug){
        $specialtie    = Specialtie::where('slug', $slug)->firstOrFail();
        $SubSpecialties = SubSpecialtie::where('specialtie_id', $specialtie->id)->get();
        return view('Site.specialtie.index', compact('SubSpecialties', 'specialtie'));
    }

    public function subSpecialtieDetail($slug){
        $SubSpecialtie    = SubSpecialtie::where('slug', $slug)->firstOrFail();
        $specialtie       = Specialtie::find($SubSpecialtie->specialtie_id);
        $SubSpecialtieTypes = SubSpecialtieType::where('sub_specialtie_id', $SubSpecialtie->id)->get();
        return view('Site.specialtie.sub-specialtie-detail', compact('SubSpecialtie', 'SubSpecialtieTypes', 'specialtie'));
    }
}

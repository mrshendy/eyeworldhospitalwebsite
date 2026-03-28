<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MedicalAcademyInfo;
use App\Models\MedicalAcademy;

class MedicalAcademyController extends Controller
{
    public function index()
    {
        $data['medical_academy_info'] = MedicalAcademyInfo::first();
        $data['medical_academies'] = MedicalAcademy::get();
        return view('Site.medical-academies.index')->with($data);
    }

    public function show($slug)
    {
        $data['medical_academy'] = MedicalAcademy::where('slug', $slug)->with('videos')->firstOrFail();
        return view('Site.medical-academies.show')->with($data);
    }

}

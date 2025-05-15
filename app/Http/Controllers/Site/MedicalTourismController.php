<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MedicalTourismInfo;
use App\Models\MedicalTourismService;

class MedicalTourismController extends Controller
{
    public function index()
    {
        $data['medical_tourism_info'] = MedicalTourismInfo::first();
        $data['medical_tourism_services'] = MedicalTourismService::get();
        return view('Site.medical-tourism.index')->with($data);
    }
}

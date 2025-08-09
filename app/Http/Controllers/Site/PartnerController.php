<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{InsurancePartner,InsurancePartnerInfo};

class PartnerController extends Controller
{
    //
    public function index(){
        $info = InsurancePartnerInfo::first();
        $partners = InsurancePartner::with('doctors.specialtie')->get();
        return view('Site.partners.index',compact('partners','info'));
    }
}

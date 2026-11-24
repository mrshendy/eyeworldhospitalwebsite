<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\InsurancePartner;
use App\Models\InsurancePartnerInfo;

class PartnerController extends Controller
{
    //
    public function index()
    {
        $info = InsurancePartnerInfo::first();
        $partners = InsurancePartner::with('doctors.specialtie')->get();

        return view('Site.partners.index', compact('partners', 'info'));
    }
}

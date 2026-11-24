<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\CustomerRateInfo;
use App\Models\Rate;

class RateController extends Controller
{
    //
    public function index()
    {
        $info = CustomerRateInfo::first();
        $rates = Rate::get();

        return view('Site.rates.index', compact('info', 'rates'));
    }
}

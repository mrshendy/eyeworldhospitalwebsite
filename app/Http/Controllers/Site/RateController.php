<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerRateInfo;

class RateController extends Controller
{
    //
    public function index(){
        $info  = CustomerRateInfo::first();
        return view('Site.rates.index',compact('info'));
    }
}

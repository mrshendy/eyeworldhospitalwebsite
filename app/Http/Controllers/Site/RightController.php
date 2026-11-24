<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Right;
use App\Models\RightInfo;

class RightController extends Controller
{
    //
    public function index()
    {
        $info = RightInfo::first();
        $rights = Right::where('type', 'right')->get();
        $duties = Right::where('type', 'dutie')->get();

        return view('Site.rights.index', compact('info', 'rights', 'duties'));
    }
}

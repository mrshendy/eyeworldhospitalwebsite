<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Conference;
use App\Models\ConferenceInfo;
use Carbon\Carbon;

class ConferenceController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        $data['conference_info'] = ConferenceInfo::first();
        $data['upcomingConferences'] = Conference::whereDate('start_date', '>=', $today)
            ->orderBy('start_date', 'asc')
            ->get();

        $data['previousConferences'] = Conference::whereDate('end_date', '<', $today)
            ->orderBy('end_date', 'desc')
            ->get();
        return view('Site.conferences.index')->with($data);
    }

    public function show($id)
    {
        $data['conference'] = Conference::with('advantages')->with('images')->findOrFail($id);
        return view('Site.conferences.show')->with($data);
    }
}

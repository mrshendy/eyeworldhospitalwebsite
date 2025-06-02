<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Conference;
use App\Models\ConferenceInfo;
use Carbon\Carbon;
Use App\Models\Guest;

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
        $data['conference'] = Conference::with('advantages')
                            ->with('images')
                            ->with('charities')
                            ->with('guests')
                            ->findOrFail($id);
        return view('Site.conferences.show')->with($data);
    }

    public function booking_conference($id)
    {
        $conference = Conference::findOrFail($id);
        return view('Site.conferences.booking', compact('conference'));
    }

    public function store_booking(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'country' => 'required|string',
            'age' => 'nullable|integer',
            'employer' => 'nullable|string',
            'doctor_type' => 'nullable|string',
            'participation_type' => 'nullable|string',
            'attendance_details' => 'nullable|string',
        ]);

        $guest = Guest::firstOrCreate(
            ['email' => $request->email],
            $request->only(['name', 'phone', 'country', 'age'])
        );

        $conference = Conference::findOrFail($id);

        $conference->guests()->syncWithoutDetaching([
            $guest->id => [
                'employer' => $request->employer,
                'doctor_type' => $request->doctor_type,
                'participation_type' => $request->participation_type,
                'attendance_details' => $request->attendance_details,
            ]
        ]);

        return redirect()->route('Site.conference.success');
    }

    public function success()
    {
        return view('Site.conferences.success');
    }

}

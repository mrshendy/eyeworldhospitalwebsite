<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Conference;
use App\Models\ConferenceInfo;
use Carbon\Carbon;
Use App\Models\Guest;
use App\Models\ParticipationType;

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

    public function show($slug)
    {
        $data['conference'] = Conference::where('slug', $slug)
                            ->with('advantages')
                            ->with('images')
                            ->with('charities')
                            ->with('guests')
                            ->with('globalDoctors')
                            ->with('localDoctors')
                            ->firstOrFail();

        return view('Site.conferences.show')->with($data);
    }


    public function booking_conference($slug)
    {
        $conference = Conference::where('slug', $slug)->firstOrFail();
        $participationTypes = ParticipationType::all();
        return view('Site.conferences.booking', compact('conference', 'participationTypes'));
    }

    public function store_booking(Request $request, $slug)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'country' => 'required|string',
            'age' => 'nullable|integer',
            'employer' => 'nullable|string',
            'doctor_type' => 'nullable|string',
            'attendance_details' => 'nullable|string',
        ]);

        $guest = Guest::firstOrCreate(
            ['email' => $request->email],
            $request->only(['name', 'phone', 'country', 'age'])
        );

        $conference = Conference::where('slug', $slug)->firstOrFail();

        $conference->guests()->syncWithoutDetaching([
            $guest->id => [
                'employer' => $request->employer,
                'doctor_type' => $request->doctor_type,
                'attendance_details' => $request->attendance_details,
                'participation_type_id' => $request->participation_type_id,
            ]
        ]);
        return redirect()->route('Site.conference.success');
    }

    public function success()
    {
        return view('Site.conferences.success');
    }

}

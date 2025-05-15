<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MedicalDeviceInfo;
use App\Models\MedicalDevice;
use App\Models\Specialtie;


class MedicalDeviceController extends Controller
{

    public function index()
    {
        $data['medical_device_info'] = MedicalDeviceInfo::first();
        $data['medical_devices'] = MedicalDevice::get();
        $data['specialties'] = Specialtie::all();
        return view('Site.medical-devices.index')->with($data);
    }

    public function show($id)
    {

        $data['medical_device'] = MedicalDevice::findOrFail($id);
        $data['medical_devices'] = MedicalDevice::get();
        return view('Site.medical-devices.show')->with($data);
    }

    public function getMedicalDevicesBySpecialty(Request $request)
    {
        $specialty_id = $request->specialty_id;

        $medical_devices = MedicalDevice::whereHas('specialties', function ($query) use ($specialty_id) {
            $query->where('specialties.id', $specialty_id);
        })->get();

        $html = view('partials.device-cards', compact('medical_devices'))->render();

        return response()->json(['html' => $html]);
    }

}

<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Specialtie;
Use Alert;
use App\Enums\AcademicDegrees;

class AuthController extends Controller
{
    //
    public function index(){
        $specialties = Specialtie::all();
        $degrees = AcademicDegrees::options();
        return view('Site.Auth.register', compact('specialties','degrees'));
    }


    public function register(Request $request){

        dd($request->all());

        $validated = $request->validate([
         'name' => 'required|string|max:255',
         'email' => 'required|email|unique:users,email',
         'password' => 'required|min:8|confirmed',
        ]);


        User::create($request->except(['password_confirmation']));

        Alert::success(__('Success'),__('register success'));
        return redirect()->back();
      
    }
}

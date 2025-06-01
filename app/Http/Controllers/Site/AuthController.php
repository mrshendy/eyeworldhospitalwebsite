<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function index(){
       return view('Site.Auth.register');
    }


    public function register(Request $request){

       $validator = Validator::make($request->all(), [
            'name'    => 'required',
            'email'   => 'required',
            'phone'   => 'required',
            'password'     => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        User::create($request->except(['password_confirmation']));
        return redirect()->back();
      
    }
}

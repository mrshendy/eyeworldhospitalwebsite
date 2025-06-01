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

        $validated = $request->validate([
         'name' => 'required|string|max:255',
         'email' => 'required|email|unique:users,email',
         'password' => 'required|min:8|confirmed',
        ]);

      
        
        User::create($request->except(['password_confirmation']));
        return redirect()->back();
      
    }
}

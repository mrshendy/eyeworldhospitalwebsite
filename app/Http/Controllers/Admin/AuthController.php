<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;

class AuthController extends Controller
{
    //
    public function index(){
        return view('Admin.login');
    }

    public function login(Request $request)
    {
        $credentials = request(['email','password']);
      

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('Admin.Quetions.index');
        }
        return redirect()->route('Admin.login.index')->with('error','Login details are not valid');
    }


    public function logout(Request $request){
        Auth::guard('admin')->logout();
        return redirect()->route('Admin.login.index');
    }
}

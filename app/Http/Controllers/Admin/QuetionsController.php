<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quetion;

class QuetionsController extends Controller
{
    //

    public function index(){
            return view('Admin.quetions.index');
    }


    public function store(){
        Quetion::create($request->all());
        return redirect()->back();
    }
}

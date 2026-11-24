<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubSpecialtie;

class AjaxController extends Controller
{
    //
    public function subSpecialties($id)
    {
        return SubSpecialtie::where('specialtie_id', $id)->get();
    }
}

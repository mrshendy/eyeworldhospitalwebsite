<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seo;
use Alert;

class SeoController extends Controller
{
    public function index()
    {
        $seo = Seo::first();
        return view('Admin.seo.index',compact('seo'));
    }

    public function update(Request $request)
    {
        $seo = Seo::first();
        $seo->update($request->only(['meta_title', 'meta_description', 'meta_keywords']));
        Alert::success(__('Success'), __('SEO settings updated successfully'));

        return redirect()->back();

    }
}


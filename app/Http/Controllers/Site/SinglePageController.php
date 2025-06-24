<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Quetion;
class SinglePageController extends Controller
{
    public function faqs()
    {
        $data['questions'] = Quetion::all();
        return view('Site.singlePage.faqs')->with($data);
    }

    public function terms()
    {
        return view('Site.singlePage.terms');
    }

    public function privacy()
    {
        return view('Site.singlePage.privcay');
    }

    public function contact_us()
    {
        return view('Site.singlePage.contact');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{ContactUs};
use Yajra\DataTables\Html\Builder;
use DataTables;
use Carbon\Carbon;


class ContactUsController extends Controller
{
    //
    public function index(Request $request,Builder $builder){

        if (request()->ajax()) {
            return DataTables::of(ContactUs::query())
            ->filter(function ($query) use ($request) {
                if ($request->has('search') && !empty($request->input('search')['value'])) {
                    $search = $request->input('search')['value'];
                    $query->where('name', 'LIKE', "%{$search}%")
                    ->orwhere('email', 'LIKE', "%{$search}%");
                }
            })
            ->editColumn('created_at', function ($row) {
                return Carbon::parse($row->created_at)->format('d-m-Y'); 
            })
            ->toJson();
        }

        $html = $builder->columns([
            ['title' => __('system.id'), 'data' => 'id', 'footer' =>  __('system.id') , 'orderable' => true],
            ['title' => __('name'), 'data' => 'name', 'footer' =>__('name') , 'searchable' => true],
            ['title' => __('email'), 'data' => 'email', 'footer' => __('email') , 'searchable' => true],
            ['title' => __('message') ,'data' => 'message', 'footer' => __('message')],
        ]);



        return view('Admin.contact-us.index',compact('html'));
    }
}

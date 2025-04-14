<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rate;
use DataTables;
use Yajra\DataTables\Html\Builder;
use Carbon\Carbon;

class RateController extends Controller
{
    //

    public function index(Builder $builder,Request $request){

        if (request()->ajax()) {
            return DataTables::of(Rate::query())
            ->filter(function ($query) use ($request) {
                if ($request->has('search') && !empty($request->input('search')['value'])) {
                    // $search = $request->input('search')['value'];
                    // $query->whereHas('translation',function ($q) use ($search) {
                    //     $q->where('quetion', 'LIKE', "%{$search}%");
                    // });
                }
            })
            ->editColumn('created_at', function ($row) {
                return Carbon::parse($row->created_at)->format('d-m-Y'); 
            })
            ->addColumn('actions', function ($row) {
                $data="";
                // <a href="#" class="edit_btn" data-bs-toggle="modal" data-bs-target="#editModal"  data-id="'.$row->id.'" '.$data.'>   <i class="ri-edit-line"></i> </a>

                return '
                    <a href="#" class="delete_btn" data-bs-toggle="modal" data-bs-target="#deleteModal"  data-id="'.$row->id.'">   <i class="ri-delete-bin-6-line"></i></a>

                    ';
            })
            ->rawColumns(['actions'])
            ->toJson();
        }

        $html = $builder->columns([
            ['title' => __('system.id'), 'data' => 'id', 'footer' =>  __('system.id') , 'orderable' => true],
            ['title' => __('name'), 'data' => 'user_name', 'footer' => __('name') , 'searchable' => true],
            ['title' => __('comment'), 'data' => 'comment', 'footer' => 'answer' , 'searchable' => true],
            ['title' => __('rate'), 'data' => 'rate', 'footer' => __('rate') , 'searchable' => true],
            ['title' => __('system.created_at') ,'data' => 'created_at', 'footer' => __('system.created_at')],
            ['title' => __('system.actions'), 'data' => 'actions', 'footer' => __('system.actions'), 'orderable' => false, 'searchable' => false]
        ]);

        return view('Admin.rate.index',compact('html'));
    }

    public function store(Request $request){
        Rate::create($request->all());
        return redirect()->back();
    }

    public function destroy(Request $request,$id){
        $rate =  Rate::find($request->id);
        $rate->delete();
        return redirect()->back();
    }



}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Reservation};

use DataTables;
use Yajra\DataTables\Html\Builder;
use Carbon\Carbon;

class ReservationController extends Controller
{
    //
    public function index(Builder $builder,Request $request){
           if (request()->ajax()) {
            return DataTables::of(Reservation::query())
            ->filter(function ($query) use ($request) {
                if ($request->has('search') && !empty($request->input('search')['value'])) {
                    $search = $request->input('search')['value'];
                    $query->where('patient_name',$search);
                }
            })
            ->editColumn('created_at', function ($row) {
                return Carbon::parse($row->created_at)->format('d-m-Y'); 
            })
            ->addColumn('actions', function ($row) {
                $data="";
             
            
                return '
                    <a href="'.route('Admin.articles.edit',$row->id).'" class="edit_btn">   <i class="ri-edit-line"></i> </a>
                    <a href="#" class="delete_btn" data-bs-toggle="modal" data-bs-target="#deleteModal"  data-id="'.$row->id.'">   <i class="ri-delete-bin-6-line"></i></a>

                    ';
            })
             ->addColumn('doctor', function ($row) {
                return $row->doctor->info?->name; 
            })
            ->rawColumns(['actions'])
            ->toJson();
        }

        $html = $builder->columns([
            ['title' => __('system.id'), 'data' => 'id', 'footer' => __('system.id') , 'orderable' => true],
            ['title' => __('patient name'), 'data' => 'patient_name', 'footer' => __('patient name') , 'searchable' => true],
            ['title' => __('doctor'), 'data' => 'doctor', 'footer' => __('doctor') , 'searchable' => true],
            ['title' => __('system.created_at') ,'data' => 'created_at', 'footer' => __('system.created_at')],
            ['title' => __('system.actions'), 'data' => 'actions', 'footer' => __('system.actions'), 'orderable' => false, 'searchable' => false]
        ]);

        return view('Admin.reservations.index',compact('html'));
    }
}

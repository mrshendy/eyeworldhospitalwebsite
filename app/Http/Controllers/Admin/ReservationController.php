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
            ->editColumn('type', function ($row) {
                return match ($row->type) {
                    'normal' => __('Normal'),   // translation key or plain string
                    'onlin' =>  __('onlin'),
                    default => $row->type,
                };
            })

            ->editColumn('urgent', function ($row) {
                return match ($row->urgent) {
                     0 => __('Normal'),   // translation key or plain string
                     1 =>  __('urgent'),
                    default => $row->urgent,
                };
            })
           ->addColumn('actions', function ($row) {
                $data="";

                return '
                    <a href="'.route("Admin.reservations.show",$row->id).'"> <i class="ri-information-2-line"></i> </a>

                    ';
            })
             ->addColumn('doctor', function ($row) {
                return $row->doctor->info?->name; 
            })
             ->orderColumn('id', function ($query, $order) {
                $query->orderBy('id', $order);
            })
            ->rawColumns(['actions'])
            ->toJson();
        }

        $html = $builder->columns([
            ['title' => __('system.id'), 'data' => 'id', 'footer' => __('system.id') , 'orderable' => true],
            ['title' => __('patient'), 'data' => 'patient_name', 'footer' => __('patient') , 'searchable' => true],
            ['title' => __('doctor'), 'data' => 'doctor', 'footer' => __('doctor') , 'searchable' => true],
            ['title' => __('price'), 'data' => 'price', 'footer' => __('patient name') , 'searchable' => true],
            ['title' => __('date'), 'data' => 'date', 'footer' => __('date') , 'searchable' => true],
            ['title' => __('time from'), 'data' => 'time_from', 'footer' => __('time from') , 'searchable' => true],
            ['title' => __('type'), 'data' => 'type', 'footer' => __('type') , 'searchable' => true],
            ['title' => __('urgent'), 'data' => 'urgent', 'footer' => __('urgent') , 'searchable' => true],
            ['title' => __('system.created_at') ,'data' => 'created_at', 'footer' => __('system.created_at')],
            ['title' => __('system.actions'), 'data' => 'actions', 'footer' => __('system.actions'), 'orderable' => false, 'searchable' => false]
         ])->parameters([
            'order' => [[0, 'desc']],
        ]);

        return view('Admin.reservations.index',compact('html'));
    }


    public function show($id){
       $data = Reservation::find($id);
       return view('Admin.reservations.detail',compact('data'));
    }
}

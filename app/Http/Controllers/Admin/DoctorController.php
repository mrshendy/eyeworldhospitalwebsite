<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Doctor,Specialtie,SubSpecialtie};
use DataTables;
use Yajra\DataTables\Html\Builder;
use Carbon\Carbon;

class DoctorController extends Controller
{
    //
    public function index(Builder $builder,Request $request){



        if (request()->ajax()) {
            return DataTables::of(Doctor::query())
            ->filter(function ($query) use ($request) {
                if ($request->has('search') && !empty($request->input('search')['value'])) {
                    $search = $request->input('search')['value'];
                    $query->where('name', 'LIKE', "%{$search}%");
                }
            })
            ->editColumn('created_at', function ($row) {
                return Carbon::parse($row->created_at)->format('d-m-Y');
            })
            ->addColumn('actions', function ($row) {
                $data="";

                return '
                    <a href="'.route('Admin.doctors.edit',$row->id).'" class="edit_btn">   <i class="ri-edit-line"></i> </a>
                    <a href="#" class="delete_btn" data-bs-toggle="modal" data-bs-target="#deleteModal"  data-id="'.$row->id.'">   <i class="ri-delete-bin-6-line"></i></a>

                    ';
            })
            ->rawColumns(['actions'])
            ->toJson();
        }

        $html = $builder->columns([
            ['title' => __('system.id'), 'data' => 'id', 'footer' => __('system.id') , 'orderable' => true],
            ['title' => __('name'), 'data' => 'name', 'footer' => __('name') , 'searchable' => true],
            ['title' => __('job title'), 'data' => 'job_title', 'footer' => __('job title') , 'searchable' => true],
            ['title' => __('system.created_at') ,'data' => 'created_at', 'footer' => __('system.created_at')],
            ['title' => __('system.actions'), 'data' => 'actions', 'footer' => __('system.actions'), 'orderable' => false, 'searchable' => false]
        ]);

        return view('Admin.doctors.index',compact('html'));


    }


    public function create(){
         $specialties = Specialtie::get();
         $subspecialties = SubSpecialtie::get();
         return view('Admin.doctors.create',compact('specialties','subspecialties'));
    }

    public function store(Request $request){

        Doctor::create($request->name);
        return redirect()->back();

    }

    public function show($id){

    }

    public function update(Request $request,$id){

    }



}

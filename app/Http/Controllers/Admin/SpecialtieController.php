<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Specialtie,SubSpecialtie};
use Yajra\DataTables\Html\Builder;
use DataTables;
use Carbon\Carbon;

class SpecialtieController extends Controller
{
    //
    public function index(Request $request,Builder $builder){
           
        if (request()->ajax()) {
            return DataTables::of(Specialtie::query())
            ->filter(function ($query) use ($request) {
                if ($request->has('search') && !empty($request->input('search')['value'])) {
                    $search = $request->input('search')['value'];
                    $query->whereHas('translation',function ($q) use ($search) {
                        $q->where('title', 'LIKE', "%{$search}%");
                    });
                }
            })
            ->addColumn('actions', function ($row) {
                    $data="";
                    foreach(config('translatable.locales') as $locale){
                        $data.='data-title-'.$locale.' ="'.$row->translate($locale)?->title.'"';
                    }
            
                return '
                    <a href="#" class="edit_btn" data-bs-toggle="modal" data-bs-target="#editModal"  data-id="'.$row->id.'" '.$data.'">   <i class="ri-edit-line"></i> </a>
                    <a href="#" class="delete_btn" data-bs-toggle="modal" data-bs-target="#deleteModal"  data-id="'.$row->id.'">   <i class="ri-delete-bin-6-line"></i></a>
                    <a href="'.route('Admin.sup-specialtie',$row->id).'"><i class="ri-eye-line"></i></a>
                    ';
            })
            ->rawColumns(['actions'])
            ->editColumn('created_at', function ($row) {
                return Carbon::parse($row->created_at)->format('d-m-Y'); 
            })
            ->toJson();
        }

        $html = $builder->columns([
            ['title' => __('system.id'), 'data' => 'id', 'footer' =>  __('system.id') , 'orderable' => true],
            ['title' => __('name'), 'data' => 'title', 'footer' =>__('name') , 'searchable' => true],
            ['title' => __('system.actions'), 'data' => 'actions', 'footer' =>  __('system.actions'), 'orderable' => false, 'searchable' => false]

        ]);

         return view('Admin.specialtie.index',compact('html'));
    }

    public function store(Request $request){
        Specialtie::create($request->all());
        return redirect()->back();
    }

    public function update(Request $request,$id){
        $Specialtie =  Specialtie::find($request->id);
        $Specialtie->update($request->except(['id','_token','_method']));
        return redirect()->back();
    } 


    public function destroy(Request $request,$id){
        $quetion =  Specialtie::find($request->id);
        $quetion->delete();
        return redirect()->back();
    }



    public function supSpecialtie(Request $request,Builder $builder,$id){
        if (request()->ajax()) {
            return DataTables::of(SubSpecialtie::query())
            ->filter(function ($query) use ($request,$id) {
                $query->where('specialtie_id',$id);
                if ($request->has('search') && !empty($request->input('search')['value'])) {
                    $search = $request->input('search')['value'];
                    $query->whereHas('translation',function ($q) use ($search) {
                        $q->where('title', 'LIKE', "%{$search}%");
                    });
                }
            })
            ->addColumn('actions', function ($row) {
               
            
                return '
                    <a href="#" class="edit_btn" data-bs-toggle="modal" data-bs-target="#editModal"  data-id="'.$row->id.'">   <i class="ri-edit-line"></i> </a>
                    <a href="#" class="delete_btn" data-bs-toggle="modal" data-bs-target="#deleteModal"  data-id="'.$row->id.'">   <i class="ri-delete-bin-6-line"></i></a>
                    ';
            })
            ->rawColumns(['actions'])
            ->editColumn('created_at', function ($row) {
                return Carbon::parse($row->created_at)->format('d-m-Y'); 
            })
            ->toJson();
        }

        $html = $builder->columns([
            ['title' => __('system.id'), 'data' => 'id', 'footer' =>  __('system.id') , 'orderable' => true],
            ['title' => __('name'), 'data' => 'title', 'footer' =>__('name') , 'searchable' => true],
            ['title' => __('system.actions'), 'data' => 'actions', 'footer' =>  __('system.actions'), 'orderable' => false, 'searchable' => false]

        ]);


        return view('Admin.specialtie.sub-specialtie.index',compact('html'));

    }


    public function supSpecialtieStore(Request $request){
        SubSpecialtie::create($request->all());
        return redirect()->back();
    }
}

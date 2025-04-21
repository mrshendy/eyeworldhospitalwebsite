<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{Right};
use Yajra\DataTables\Html\Builder;
use DataTables;
use Carbon\Carbon;



class RightController extends Controller
{
    //
    public function index(Builder $builder,Request $request ,$type){


        if (request()->ajax()) {
            $query = Right::query();
            return DataTables::of($query->where('type',$type))
            ->filter(function ($query) use ($request) {
                if ($request->has('search') && !empty($request->input('search')['value'])) {
                    $search = $request->input('search')['value'];
                    $query->whereHas('translation',function ($q) use ($search) {
                        $q->where('title', 'LIKE', "%{$search}%");
                    });
                }
            })
            ->editColumn('created_at', function ($row) {
                return Carbon::parse($row->created_at)->format('d-m-Y'); 
            })
            ->addColumn('actions', function ($row) {
                $data="";
                foreach(config('translatable.locales') as $locale){
                    $data.='data-title-'.$locale.' ="'.$row->translate($locale)->title.'"';
                    $data.='data-desc-'.$locale.' ="'.$row->translate($locale)->desc.'"';
                }
            
                return '
                    <a href="#" class="edit_btn" data-bs-toggle="modal" data-bs-target="#editModal"  data-id="'.$row->id.'" '.$data.'>   <i class="ri-edit-line"></i> </a>
                    <a href="#" class="delete_btn" data-bs-toggle="modal" data-bs-target="#deleteModal"  data-id="'.$row->id.'">   <i class="ri-delete-bin-6-line"></i></a>

                    ';
            })
            ->rawColumns(['actions'])
            ->toJson();
        }

        $html = $builder->columns([
            ['title' => __('system.id'), 'data' => 'id', 'footer' => __('system.id') , 'orderable' => true],
            ['title' => __('title'), 'data' => 'title', 'footer' => __('title') , 'searchable' => true],
            ['title' => __('desc'), 'data' => 'desc', 'footer' => __('desc') , 'searchable' => true],
            ['title' => __('system.created_at') ,'data' => 'created_at', 'footer' => __('system.created_at')],
            ['title' => __('system.actions'), 'data' => 'actions', 'footer' => __('system.actions'), 'orderable' => false, 'searchable' => false]
        ]);

        return view('Admin.rights.index',compact('html','type'));
    }

    

    public function store(Request $request){
        Right::create($request->all());
        return redirect()->route('Admin.rights.index',$request->type);
    }


    public function update(Request $request,$id){
        $Right =  Right::find($request->id);
        $Right->update($request->except(['id','_token','_method']));
        return redirect()->back();
    } 

    public function destroy(Request $request,$id){
        $Right =  Right::find($request->id);
        $Right->delete();
        return redirect()->back();
    }


}

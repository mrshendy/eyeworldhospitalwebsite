<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{SubSpecialtieType,SubSpecialtie};
use Yajra\DataTables\Html\Builder;
use DataTables;
use Carbon\Carbon;
use App\Traits\fileTrait;

class SpecialtieTypeController extends Controller
{
    //
    use fileTrait;
    public function supSpecialtieType(Request $request,Builder $builder,$id){
        if (request()->ajax()) {
            return DataTables::of(SubSpecialtieType::query())
            ->filter(function ($query) use ($request,$id) {
                $query->where('sub_specialtie_id',$id);
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
                    $data.='
                          data-title-'.$locale.' ="'.$row->translate($locale)?->title.'"
                          data-desc-'.$locale.' ="'.$row->translate($locale)?->desc.'"
                        ';
                }
            
                return '
                    <a href="#" class="edit_btn" data-bs-toggle="modal" data-bs-target="#editModal"  data-id="'.$row->id.'" '.$data.'">    <i class="ri-edit-line"></i> </a>
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
            ['title' => __('desc'), 'data' => 'desc', 'footer' =>__('desc') , 'searchable' => true],
            ['title' => __('system.actions'), 'data' => 'actions', 'footer' =>  __('system.actions'), 'orderable' => false, 'searchable' => false]

        ]);
        
        $SubSpecialtie = SubSpecialtie::where('id',$id)->first();

        return view('Admin.specialtie.sub-specialtie-type.index',compact('html','id','SubSpecialtie'));

    }

    public function supSpecialtieTypeStore(Request $request){
        SubSpecialtieType::create($request->except(['_token']));
        return redirect()->back();
    }

    public function supSpecialtieTypeUpdate(Request $request){
          $SubSpecialtieType = SubSpecialtieType::find($request->id);
          $SubSpecialtieType->update($request->except(['id','_token','_method']));
          return redirect()->back();
    }

    public function destroySubSpecialtieType(Request $request){
        $SubSpecialtieType =  SubSpecialtieType::find($request->id);
        $SubSpecialtieType->delete();
        return redirect()->back();
    }
}

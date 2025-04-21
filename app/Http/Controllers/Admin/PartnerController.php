<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InsurancePartner;
use DataTables;
use Yajra\DataTables\Html\Builder;
use Carbon\Carbon;
use App\Traits\fileTrait;


class PartnerController extends Controller
{
    //
        use fileTrait;
        public function index(Builder $builder,Request $request){

                if (request()->ajax()) {
                    return DataTables::of(InsurancePartner::query())
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
                        }
                    
                        return '
                            <a href="'.route('Admin.partners.update',$row->id).'" class="edit_btn">   <i class="ri-edit-line"></i> </a>
                    <a href="#" class="delete_btn" data-bs-toggle="modal" data-bs-target="#deleteModal"  data-id="'.$row->id.'">   <i class="ri-delete-bin-6-line"></i></a>

                            ';
                    })
                    ->rawColumns(['actions'])
                    ->toJson();
                }

                $html = $builder->columns([
                    ['title' => __('system.id'), 'data' => 'id', 'footer' => 'Id' , 'orderable' => true],
                    ['title' => __('title'), 'data' => 'title', 'footer' => __('title') , 'searchable' => true],
                    ['title' => __('system.created_at') ,'data' => 'created_at', 'footer' => __('system.created_at')],
                    ['title' => __('system.actions'), 'data' => 'actions', 'footer' => __('system.actions'), 'orderable' => false, 'searchable' => false]
                ]);

                return view('Admin.partners.index',compact('html'));
        }

        public function store(Request $request){
            if($request->file!=null)
            $request->merge(['img' => $this->MoveImage($request->file,'uploads/partners')]);

            InsurancePartner::create($request->except(['file']));
            return redirect()->route('Admin.partners.index');
        }

        public function create(){
            return view('Admin.partners.create');
        }



        public function show($id){
             $data =  InsurancePartner::find($id);
             return view('Admin.partners.edit',compact('data'));
        }

        public function update(Request $request,$id){

            if($request->file!=null)
            $request->merge(['img' => $this->MoveImage($request->file,'uploads/partners')]);
        
            $InsurancePartner =  InsurancePartner::find($request->id);

            $InsurancePartner->update($request->except(['id','_token','_method','file']));
            return redirect()->back();
        } 

        public function destroy(Request $request,$id){
            $InsurancePartner =  InsurancePartner::find($request->id);
            $InsurancePartner->delete();
            return redirect()->back();
        }

}

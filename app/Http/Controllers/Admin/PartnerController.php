<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InsurancePartner;
use DataTables;
use Yajra\DataTables\Html\Builder;
use Carbon\Carbon;


class PartnerController extends Controller
{
    //

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
                            <a href="#" class="edit_btn" data-bs-toggle="modal" data-bs-target="#editModal"  data-id="'.$row->id.'" '.$data.'>   <i class="ri-edit-line"></i> </a>
                            <a href="#" class="delete_btn" data-bs-toggle="modal" data-bs-target="#deleteModal"  data-id="'.$row->id.'">   <i class="ri-delete-bin-6-line"></i></a>

                            ';
                    })
                    ->rawColumns(['actions'])
                    ->toJson();
                }

                $html = $builder->columns([
                    ['title' => __('system.id'), 'data' => 'id', 'footer' => 'Id' , 'orderable' => true],
                    ['title' => __('system.title'), 'data' => 'title', 'footer' => 'title' , 'searchable' => true],
                    ['title' => __('system.created_at') ,'data' => 'created_at', 'footer' => 'Created At'],
                    ['title' => __('system.actions'), 'data' => 'actions', 'footer' => 'Actions', 'orderable' => false, 'searchable' => false]
                ]);

                return view('Admin.partners.index',compact('html'));
        }

        public function store(Request $request){
            InsurancePartner::create($request->all());
            return redirect()->back();
        }

        public function edit($id){
            return InsurancePartner::find($id);
        }

        public function update(Request $request,$id){
            $InsurancePartner =  InsurancePartner::find($request->id);
            $InsurancePartner->update($request->except(['id','_token','_method']));
            return redirect()->back();
        } 

        public function destroy(Request $request,$id){
            $InsurancePartner =  InsurancePartner::find($request->id);
            $InsurancePartner->delete();
            return redirect()->back();
        }

}

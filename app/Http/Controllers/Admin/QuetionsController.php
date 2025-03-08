<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quetion;
use DataTables;
use Yajra\DataTables\Html\Builder;
use Carbon\Carbon;

class QuetionsController extends Controller
{
    //

    public function index(Builder $builder,Request $request){

            if (request()->ajax()) {
                return DataTables::of(Quetion::query())
                ->filter(function ($query) use ($request) {
                    if ($request->has('search') && !empty($request->input('search')['value'])) {
                        $search = $request->input('search')['value'];
                        $query->whereHas('translation',function ($q) use ($search) {
                            $q->where('quetion', 'LIKE', "%{$search}%");
                        });
                    }
                })
                ->editColumn('created_at', function ($row) {
                    return Carbon::parse($row->created_at)->format('d-m-Y'); 
                })
                ->addColumn('actions', function ($row) {
                    $data="";
                    foreach(config('translatable.locales') as $locale){
                        $data.='data-quetion-'.$locale.' ="'.$row->translate($locale)->quetion.'"';
                        $data.='data-answer-'.$locale.' ="'.$row->translate($locale)->answer.'"';
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
                ['title' => __('system.quetion'), 'data' => 'quetion', 'footer' => 'quetion' , 'searchable' => true],
                ['title' => __('system.answer'), 'data' => 'answer', 'footer' => 'answer' , 'searchable' => true],
                ['title' => __('system.created_at') ,'data' => 'created_at', 'footer' => 'Created At'],
                ['title' => __('system.actions'), 'data' => 'actions', 'footer' => 'Actions', 'orderable' => false, 'searchable' => false]
            ]);

            return view('Admin.quetions.index',compact('html'));
    }

    public function store(Request $request){
        Quetion::create($request->all());
        return redirect()->back();
    }

    public function edit($id){
         return Quetion::find($id);
    }

    public function update(Request $request,$id){
        $quetion =  Quetion::find($request->id);
        $quetion->update($request->except(['id','_token','_method']));
        return redirect()->back();
    } 

    public function destroy(Request $request,$id){
        $quetion =  Quetion::find($request->id);
        $quetion->delete();
        return redirect()->back();
    }



}

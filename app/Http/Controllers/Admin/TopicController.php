<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Topic};
use DataTables;
use Yajra\DataTables\Html\Builder;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    //


    public function index(Builder $builder,Request $request,$type){


        if (request()->ajax()) {
            $query = Topic::query();
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
            ['title' => __('system.created_at') ,'data' => 'created_at', 'footer' => __('system.created_at')],
            ['title' => __('system.actions'), 'data' => 'actions', 'footer' => __('system.actions'), 'orderable' => false, 'searchable' => false]
        ]);

        return view('Admin.topic.index',compact('html','type'));
    }

    public function store(Request $request){
        Topic::create($request->all());
        return redirect()->back();
    }


    public function destroy(Request $request,$type){
        $topic = Topic::find($request->id);
        $topic->delete();
        return redirect()->route('Admin.Topics',$type);
    }


    public function update(Request $request,$type){
        $topic = Topic::find($request->id);
        $topic->update($request->except(['id','_token']));
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Video,Topic};
use DataTables;
use Yajra\DataTables\Html\Builder;
use Carbon\Carbon;
use App\Traits\fileTrait;

class VideosController extends Controller
{
    //
    use fileTrait;
    public function index(Builder $builder,Request $request ,$type){


        if (request()->ajax()) {
            $query = Video::query();
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
             
            
                return '
                    <a href="'.route('Admin.videos.edit',$row->id).'" class="edit_btn">   <i class="ri-edit-line"></i> </a>
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

        return view('Admin.videos.index',compact('html','type'));
    }

    public function create($type){
        $topics = Topic::where('type',$type)->get();
        return view('Admin.videos.create',compact('topics','type'));
    }

    public function store(Request $request){

        if($request->file!=null)
        $request->merge(['img' => $this->MoveImage($request->file,'uploads/videos')]);

        Video::create($request->except(['file']));
        return redirect()->route('Admin.videos.index',$request->type);
    }


    public function edit($id){
       $data = Video::find($id);
       $topics = Topic::where('type','videos')->get();
       return view('Admin.videos.edit',compact('data','topics'));
    }

    public function update(Request $request,$id){
        if($request->file!=null)
        $request->merge(['img' => $this->MoveImage($request->file,'uploads/videos')]);

        $Article =  Video::find($id);
        $Article->update($request->except(['id','_token','_method','file']));
        return redirect()->back();
    }


    public function destroy(Request $request,$id){
        $Video = Video::find($request->id);
        $Video->delete();
        return redirect()->route('Admin.videos.index');
    }
}

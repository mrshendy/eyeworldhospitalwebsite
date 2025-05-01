<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialMedia;
use DataTables;
use Yajra\DataTables\Html\Builder;
use Carbon\Carbon;
use App\Traits\fileTrait;


class SocialMediaController extends Controller
{
    //
    use fileTrait;
    
    public function index(Builder $builder,Request $request){

        if (request()->ajax()) {
            return DataTables::of(SocialMedia::query())
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
            ['title' => __('system.id'), 'data' => 'id', 'footer' => 'Id' , 'orderable' => true],
            ['title' => __('name'), 'data' => 'name', 'footer' => __('name') , 'searchable' => true],
            ['title' => __('system.created_at') ,'data' => 'created_at', 'footer' => __('system.created_at')],
            ['title' => __('system.actions'), 'data' => 'actions', 'footer' => __('system.actions'), 'orderable' => false, 'searchable' => false]
        ]);

        return view('Admin.socialMedia.index',compact('html'));

    }


    public function create(){
        return view('Admin.socialMedia.create');
    }

    public function store(Request $request){
        if($request->file!=null)
        $request->merge(['img' => $this->MoveImage($request->file,'uploads/articles')]);

        SocialMedia::create($request->except(['file']));
        return redirect()->route('Admin.socialmedia.index');
    }

    public function update(Request $request){
        
    }


    public function show($id){

    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
use Yajra\DataTables\Html\Builder;
use Carbon\Carbon;
Use Alert;

class UserController extends Controller
{
    //
        public function index(Builder $builder,Request $request,$type){
    
        if (request()->ajax()) {
            $query = User::query();
            return DataTables::of($query->where('type',$type))
            ->filter(function ($query) use ($request) {
                if ($request->has('search') && !empty($request->input('search')['value'])) {
                    $search = $request->input('search')['value'];
                      $q->where('name', 'LIKE', "%{$search}%");
                }
            })
            ->editColumn('created_at', function ($row) {
                return Carbon::parse($row->created_at)->format('d-m-Y'); 
            })
            ->addColumn('actions', function ($row) {
                $data="";
             
            
                return '
                    <a href="#" class="delete_btn" data-bs-toggle="modal" data-bs-target="#deleteModal"  data-id="'.$row->id.'" data-name="'.$row->name.'">   <i class="ri-delete-bin-6-line"></i></a>

                    ';
            })
            ->rawColumns(['actions'])
            ->toJson();
        }

        $html = $builder->columns([
            ['title' => __('system.id'), 'data' => 'id', 'footer' => __('system.id') , 'orderable' => true],
            ['title' => __('name'), 'data' => 'name', 'footer' => __('name') , 'searchable' => true],
            ['title' => __('phone'), 'data' => 'phone', 'footer' => __('phone') , 'searchable' => true],
            ['title' => __('email'), 'data' => 'phone', 'footer' => __('email') , 'searchable' => true],
            ['title' => __('system.created_at') ,'data' => 'created_at', 'footer' => __('system.created_at')],
            ['title' => __('system.actions'), 'data' => 'actions', 'footer' => __('system.actions'), 'orderable' => false, 'searchable' => false]
        ]);

        return view('Admin.users.index',compact('html','type'));
    }

    public function destroy(Request $request,$type){
        $user = User::find($request->id);
        $user->delete();
        Alert::success(__('Success'),__('Success'));
        return redirect()->route('Admin.users.type',$type);
    }
}

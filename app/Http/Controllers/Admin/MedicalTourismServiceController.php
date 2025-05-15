<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MedicalTourismService;
use DataTables;
use Yajra\DataTables\Html\Builder;

class MedicalTourismServiceController extends Controller
{
    public function index(Request $request,Builder $builder)
    {
        if (request()->ajax()) {
            return DataTables::of(MedicalTourismService::query())
            ->filter(function ($query) use ($request) {
                if ($request->has('search') && !empty($request->input('search')['value'])) {
                    $search = $request->input('search')['value'];
                    $query->whereHas('translations', function ($q) use ($search) {
                        $q->where('title', 'LIKE', "%{$search}%");
                    });
                }
            })
            ->addColumn('actions', function ($row) {
                $data = "";
                return '
                    <a href="#" class="delete_btn" data-bs-toggle="modal" data-bs-target="#deleteModal"  data-id="'.$row->id.'">
                        <i class="ri-delete-bin-6-line"></i>
                    </a>
                    <a href="'.route('Admin.medical-tourism-services.edit',$row->id).'" class="edit_btn">   <i class="ri-edit-line"></i> </a>

                ';
            })
            ->editColumn('created_at', function ($row) {
                return \Carbon\Carbon::parse($row->created_at)->format('d-m-Y');
            })
            ->rawColumns(['actions'])
            ->toJson();
        }

        $html = $builder->columns([
            ['title' => __('system.id'), 'data' => 'id', 'footer' =>  __('system.id') , 'orderable' => true],
            ['title' => __('title'), 'data' => 'title', 'footer' =>__('title') , 'searchable' => true],
            ['title' => __('system.actions'), 'data' => 'actions', 'footer' =>  __('system.actions'), 'orderable' => false, 'searchable' => false]

        ]);

        return view('Admin.medical-tourism.index',compact('html'));
    }


    public function create()
    {
        return view('Admin.medical-tourism.create');
    }

    public function store(Request $request)
    {



        $data = $request->all();
        $medical_tourism = MedicalTourismService::create($data);
        return redirect()->route('Admin.medical-tourism-services.index');
    }


    public function edit($id)
    {
        $data = MedicalTourismService::find($id);
        return view('Admin.medical-tourism.edit',compact('data'));
     }


    public function update(Request $request, $id)
    {
        $data =  MedicalTourismService::find($id);
        $data->update($request->except(['id','_token','_method']));
        return redirect()->back();
    }

    public function destroy(Request $request,$id)
    {
        $medical_tourism =  MedicalTourismService::find($request->id);
        $medical_tourism->delete();
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use Yajra\DataTables\Html\Builder;
use App\Models\ParticipationType;

class ParticipationTypeController extends Controller
{
    public function index(Request $request,Builder $builder){

        if (request()->ajax()) {
            return DataTables::of(ParticipationType::query())
            ->filter(function ($query) use ($request) {
                if ($request->has('search') && !empty($request->input('search')['value'])) {
                    $search = $request->input('search')['value'];
                    $query->whereHas('translations', function ($q) use ($search) {
                        $q->where('title', 'LIKE', "%{$search}%");
                    });
                }
            })
            ->addColumn('actions', function ($row) {
                return '
                    <a href="#" class="delete_btn" data-bs-toggle="modal" data-bs-target="#deleteModal"  data-id="'.$row->id.'">
                        <i class="ri-delete-bin-6-line"></i>
                    </a>
                    <a href="'.route('Admin.participation_types.edit',$row->id).'" class="edit_btn">   <i class="ri-edit-line"></i> </a>
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
        return view('Admin.participation_type.index', compact('html'));
    }

    public function create()
    {
        return view('Admin.participation_type.create');
    }

    public function store(Request $request)
    {
        ParticipationType::create($request->all());
        return redirect()->route('Admin.participation_types.index');

    }


    public function edit(string $id)
    {
        $data = ParticipationType::findOrFail($id);
        return view('Admin.participation_type.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $participation_type = ParticipationType::findOrFail($id);
        $participation_type->update($request->all());
        return back();
    }

    public function destroy(Request $request, $id)
    {
        ParticipationType::findOrFail($request->id)->delete();
        return redirect()->route('Admin.participation_types.index');
    }
}

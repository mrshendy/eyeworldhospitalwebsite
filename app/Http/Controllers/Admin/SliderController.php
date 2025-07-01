<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use DataTables;
use Yajra\DataTables\Html\Builder;
use App\Traits\fileTrait;


class SliderController extends Controller
{
    use fileTrait;

    public function index(Request $request,Builder $builder)
    {
        if (request()->ajax()) {
            return DataTables::of(Slider::query())
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
                    <a href="'.route('Admin.slider.edit',$row->id).'" class="edit_btn">   <i class="ri-edit-line"></i> </a>

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

        return view('Admin.slider.index',compact('html'));
    }


    public function create()
    {
        return view('Admin.slider.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'file' => 'required'
        ]);
        if($request->file!=null)
            $request->merge(['img' => $this->MoveImage($request->file,'uploads/sliders')]);

        $data = $request->except('file');
        Slider::create($data);
        return redirect()->route('Admin.slider.index');
    }

    public function edit(string $id)
    {
        $data = Slider::findOrFail($id);
        return view('Admin.slider.edit', compact('data'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'file' => 'required'
        ]);
        if($request->file!=null)
            $request->merge(['img' => $this->MoveImage($request->file,'uploads/sliders')]);

        $slider =  Slider::find($id);
        $slider->update($request->except(['id', '_token', '_method', 'file']));
        return redirect()->back();
    }


    public function destroy(Request $request)
    {
        Slider::find($request->id)->delete();
        return back();
    }
}

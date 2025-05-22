<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use Yajra\DataTables\Html\Builder;
use App\Traits\fileTrait;
use App\Models\Conference;

class ConferenceController extends Controller
{
    /**
     * Make Conference Model, controller, migration and seeder, start from and end date,
     * if ended set it in the past, if not set it in the current
     * Conference Details img, title, sub_title, description
     * in each details, title, description, start date, end date, downloaded link for the conference, [multi images for each conference]
     * Conference Advantages, title, description
     * Doctors for each conference, name, title, description, img,
     * there are global doctors and local doctors
     * Charity images
    */
    use fileTrait;

    public function index(Request $request,Builder $builder){

        if (request()->ajax()) {
            return DataTables::of(Conference::query())
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
                    <a href="'.route('Admin.conferences.edit',$row->id).'" class="edit_btn">   <i class="ri-edit-line"></i> </a>

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
        return view('Admin.conferences.index',compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.conferences.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->file!=null)
            $request->merge(['img' => $this->MoveImage($request->file,'uploads/conferences')]);
        $data = $request->except(['file']);
        $medical_conferences = Conference::create($data);
        return redirect()->route('Admin.conferences.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['conference'] = Conference::findOrFail($id);
        return view('Admin.conferences.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->file!=null)
            $request->merge(['img' => $this->MoveImage($request->file,'uploads/conferences')]);

        $data =  Conference::findOrFail($id);
        $data->update($request->except(['id','_token','_method', 'file']));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        Conference::find($request->id)->delete();
        return redirect()->route('Admin.conferences.index');
    }
}

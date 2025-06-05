<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\fileTrait;
use DataTables;
use App\Models\ConferenceDoctor;
use Yajra\DataTables\Html\Builder;


class ConferenceDoctorController extends Controller
{
    use fileTrait;

    public function index(Request $request,Builder $builder, $conferenceId){

        if (request()->ajax()) {
            return DataTables::of(ConferenceDoctor::where('conference_id', $conferenceId))
            ->filter(function ($query) use ($request) {
                if ($request->has('search') && !empty($request->input('search')['value'])) {
                    $search = $request->input('search')['value'];
                    $query->whereHas('translations', function ($q) use ($search) {
                        $q->where('name', 'LIKE', "%{$search}%");
                    });
                }
            })
            ->addColumn('actions', function ($row) use ($conferenceId) {
                return '
                    <a href="#" class="delete_btn" data-bs-toggle="modal" data-bs-target="#deleteModal"  data-id="'.$row->id.'">
                        <i class="ri-delete-bin-6-line"></i>
                    </a>
                    <a href="'.route('Admin.conferences.doctors.edit', [$conferenceId, $row->id]).'" class="edit_btn">
                        <i class="ri-edit-line"></i>
                    </a>
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
            ['title' => __('name'), 'data' => 'name', 'footer' =>__('name') , 'searchable' => true],
            ['title' => __('type'), 'data' => 'type', 'footer' =>__('type') , 'searchable' => true],
            ['title' => __('system.actions'), 'data' => 'actions', 'footer' =>  __('system.actions'), 'orderable' => false, 'searchable' => false]

        ]);
        return view('Admin.doctor-conferences.index',compact('html', 'conferenceId'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($conferenceId)
    {
        return view('Admin.doctor-conferences.create', compact('conferenceId'));
    }

    public function store(Request $request, $conferenceId)
    {
        if($request->file!=null)
            $request->merge(['img' => $this->MoveImage($request->file,'uploads/conference-doctors')]);


        $data = $request->except('file', 'img');
        $data['conference_id'] = $conferenceId;
        if ($request->has('img')) {
            $data['img'] = $request->img;
        }

        $conference_doctors = ConferenceDoctor::create($data);
        return redirect()->route('Admin.conferences.doctors.index', $conferenceId);
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
    public function edit($conferenceId, $id)
    {
        $conference_doctor = ConferenceDoctor::findOrFail($id);
        return view('Admin.doctor-conferences.edit', compact('conference_doctor', 'conferenceId'));
    }

    public function update(Request $request, $conferenceId, $id)
    {
        $conference_doctor = ConferenceDoctor::findOrFail($id);

        if ($request->file != null) {
            $request->merge(['img' => $this->MoveImage($request->file, 'uploads/conference-doctors')]);
        }

        $data = $request->except('file', 'img');

        if ($request->has('img')) {
            $data['img'] = $request->img;
        }

        $conference_doctor->update($data);

        return redirect()->route('Admin.conferences.doctors.index', $conferenceId);
    }

    public function destroy(Request $request, $id, $conferenceId)
    {
        ConferenceDoctor::find($request->id)->delete();
        return redirect()->back();
    }
}

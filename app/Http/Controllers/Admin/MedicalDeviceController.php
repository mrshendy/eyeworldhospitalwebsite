<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MedicalDevice;
use App\Models\Specialtie;
USE App\Models\SubSpecialtie;
use DataTables;
use Yajra\DataTables\Html\Builder;
use App\Traits\fileTrait;


class MedicalDeviceController extends Controller
{
    use fileTrait;

    public function index(Request $request,Builder $builder){

        if (request()->ajax()) {
            return DataTables::of(MedicalDevice::query())
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
                foreach(config('translatable.locales') as $locale){
                    $data.='data-title-'.$locale.' ="'.$row->translate($locale)?->title.'"';
                }
                $data .= ' data-spec-id="'.$row->spec_id.'"';

                return '
                    <a href="#" class="edit_btn" data-bs-toggle="modal" data-bs-target="#editModal"  data-id="'.$row->id.'" '.$data.'>
                        <i class="ri-edit-line"></i>
                    </a>
                    <a href="#" class="delete_btn" data-bs-toggle="modal" data-bs-target="#deleteModal"  data-id="'.$row->id.'">
                        <i class="ri-delete-bin-6-line"></i>
                    </a>
                    <a href="'.route("Admin.medical-devices.show",$row->id).'"> <i class="ri-information-2-line"></i> </a>

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

        $specialists = Specialtie::all();
        $sub_specialists = SubSpecialtie::all();

        return view('Admin.medical-devices.index',compact('html', 'specialists', 'sub_specialists'));
    }


    public function store(Request $request)
    {
        $data = $request->except('sub_specialty_ids');
        $medical_device = MedicalDevice::create($data);

        if ($request->has('sub_specialty_ids')) {
            $medical_device->subSpecialties()->sync($request->sub_specialty_ids);
        }

        return redirect()->route('Admin.medical-devices.index');
    }


    public function show(string $id)
    {
        $data = MedicalDevice::find($id);
        $specialists = Specialtie::all();
        $sub_specialists = SubSpecialtie::all();
        return view('Admin.medical-devices.detail', compact('id','data','specialists','sub_specialists'));
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        if($request->file!=null)
            $request->merge(['img' => $this->MoveImage($request->file,'uploads/medical-devices')]);

        $medical_device =  MedicalDevice::find($request->id);

        $medical_device->update($request->except(['id','_token','_method', 'sub_specialties', 'file']));
        $medical_device->subSpecialties()->sync($request->sub_specialties);
        return redirect()->back();
    }

    public function destroy(Request $request,$id)
    {
        $medical_device =  MedicalDevice::find($request->id);
        $medical_device->delete();
        return redirect()->back();
    }
}

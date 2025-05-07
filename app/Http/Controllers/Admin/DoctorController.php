<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Doctor,Specialtie,SubSpecialtie,DoctorInfo,DoctorSpecialtie,DoctorSubSpecialtie,InsurancePartner,DoctorInsurancePartner,DoctorServiceInfo};
use DataTables;
use Yajra\DataTables\Html\Builder;
use Carbon\Carbon;
use App\Traits\fileTrait;

class DoctorController extends Controller
{
    //
    use fileTrait;
    public function index(Builder $builder,Request $request){
         

        
        if (request()->ajax()) {
            return DataTables::of(Doctor::query())
            ->filter(function ($query) use ($request) {
                if ($request->has('search') && !empty($request->input('search')['value'])) {
                    $search = $request->input('search')['value'];
                    $query->where('name', 'LIKE', "%{$search}%");
                }
            })
            ->editColumn('created_at', function ($row) {
                return Carbon::parse($row->created_at)->format('d-m-Y'); 
            })
            ->addColumn('job_title', function ($row) {
                return $row->info?->job_title; 
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
            ['title' => __('system.id'), 'data' => 'id', 'footer' => __('system.id') , 'orderable' => true],
            ['title' => __('name'), 'data' => 'name', 'footer' => __('name') , 'searchable' => true],
            ['title' => __('job title'), 'data' => 'job_title', 'footer' => __('job title') , 'searchable' => true],
            ['title' => __('system.created_at') ,'data' => 'created_at', 'footer' => __('system.created_at')],
            ['title' => __('system.actions'), 'data' => 'actions', 'footer' => __('system.actions'), 'orderable' => false, 'searchable' => false]
        ]);

        return view('Admin.doctors.index',compact('html'));


    }


    public function create(){
         $specialties = Specialtie::get();
         $subspecialties = SubSpecialtie::where('specialtie_id',$specialties[0]->id)->get();
         $InsurancePartners = InsurancePartner::get();
         return view('Admin.doctors.create',compact('specialties','subspecialties','InsurancePartners'));
    } 

    public function store(Request $request){
         
        if($request->file!=null)
        $request->merge(['img' => $this->MoveImage($request->file,'uploads/articles')]);

        $doctor=Doctor::create([
            'name' =>$request->name,
            'img' =>$request->img,
        ]);
        $request->merge(['doctor_id' => $doctor->id]);


        foreach (config('translatable.locales') as $locale){
            DoctorInfo::create([
                'doctor_id'=>$doctor->id,
                $locale =>[
                    'job_title' =>$request->$locale['job_title'],
                    'title' =>$request->$locale['title'],
                    'sub_title' =>$request->$locale['sub_title'],
                    'breif' =>$request->$locale['breif'],
                    'desc' =>$request->$locale['desc'],
                ]
            ]);
        }
       
        DoctorSpecialtie::create($request->only(['specialtie_id','doctor_id']));
        foreach($request->sub_specialtie_ids as $sub_specialtie_id){
            DoctorSubSpecialtie::create([
                 'doctor_id'=>$doctor->id,
                 'sub_specialtie_id'=>$sub_specialtie_id
            ]);
        }

        foreach($request->partner_ids as $partner_id){
            DoctorInsurancePartner::create([
                 'doctor_id'=>$doctor->id,
                 'partner_id'=>$partner_id
            ]);
        }
        return redirect()->route('Admin.doctors.index');

    }

    public function show($id){

    }

    public function update(Request $request,$id){

    }

    public function destroy(Request $request,$id){
        $data = Doctor::find($request->id);
        $data->delete();
        return redirect()->route('Admin.doctors.index');
    }


    public function subSpecialtie($id){

       
        
    }
}

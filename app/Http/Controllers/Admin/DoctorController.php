<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Doctor,Specialtie,SubSpecialtie,DoctorInfo,DoctorSpecialtie,DoctorSubSpecialtie,InsurancePartner
    ,DoctorInsurancePartner,DoctorServiceInfo,DoctorPrice};
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
                    $query->whereHas('info',function ($q) use ($search) {
                        $q->whereHas('translation',function ($q) use ($search) {
                            $q->where('title', 'LIKE', "%{$search}%");
                        });
                    });
                }
            })
            ->editColumn('created_at', function ($row) {
                return Carbon::parse($row->created_at)->format('d-m-Y');
            })
            ->addColumn('job_title', function ($row) {
                return $row->info?->job_title;
            })
            ->addColumn('specialtie', function ($row) {
                return $row->specialtie?->specialtie->title;
            })
            ->addColumn('name', function ($row) {
                return $row->info?->name;
            })
            ->addColumn('actions', function ($row) {
                $data="";

                return '
                    <a href="'.route('Admin.doctors.edit',$row->id).'" class="edit_btn">   <i class="ri-edit-line"></i> </a>
                    <a href="#" class="delete_btn" data-bs-toggle="modal" data-bs-target="#deleteModal"  data-id="'.$row->id.'">   <i class="ri-delete-bin-6-line"></i></a>
                    <a href="'.route("Admin.appointments.index",$row->id).'"> <i class="ri-information-2-line"></i> </a>

                    ';
            })
           ->orderColumn('id', function ($query, $order) {
                $query->orderBy('id', $order);
            })
            ->rawColumns(['actions'])
            ->toJson();
        }

        $html = $builder->columns([
            ['title' => __('system.id'), 'data' => 'id', 'footer' => __('system.id') , 'orderable' => true],
            ['title' => __('name'), 'data' => 'name', 'footer' => __('name') , 'searchable' => true],
            ['title' => __('job title'), 'data' => 'job_title', 'footer' => __('job title') , 'searchable' => true],
            ['title' => __('specialtie'), 'data' => 'specialtie', 'footer' => __('specialtie') , 'searchable' => true],
            ['title' => __('system.created_at') ,'data' => 'created_at', 'footer' => __('system.created_at')],
            ['title' => __('system.actions'), 'data' => 'actions', 'footer' => __('system.actions'), 'orderable' => false, 'searchable' => false]
        ])->parameters([
            'order' => [[0, 'desc']],
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
        $request->merge(['img' => $this->MoveImage($request->file,'uploads/doctors')]);

        $doctor=Doctor::create([
            'img' =>$request->img,
        ]);
        $request->merge(['doctor_id' => $doctor->id]);

        $infodata=[];  $serviceInfo=[]; $serviceInfos=[];
        $infodata['doctor_id'] = $doctor->id;
        $serviceInfo['doctor_id'] = $doctor->id;
        foreach (config('translatable.locales') as $locale){
            $infodata[$locale]=[
                'name'     =>$request->$locale['name'],
                'job_title' =>$request->$locale['job_title'],
                'title' =>$request->$locale['title'],
                'sub_title' =>$request->$locale['sub_title'] ?? '',
                'breif' =>$request->$locale['breif'],
                'desc' =>$request->$locale['desc'],
            ];
        }
        foreach($request->info as $info){
            foreach (config('translatable.locales') as $locale){
                $serviceInfo[$locale]=[
                    'info' =>$info[$locale]
                ];
            }
            $serviceInfos[]=$serviceInfo;
        }
        DoctorInfo::create($infodata);
        foreach($serviceInfos as $info){
            DoctorServiceInfo::create($info);

        }

        DoctorSpecialtie::create($request->only(['specialtie_id','doctor_id']));
        if($request->sub_specialtie_ids!=null){
            foreach($request->sub_specialtie_ids as $sub_specialtie_id){
                DoctorSubSpecialtie::create([
                    'doctor_id'=>$doctor->id,
                    'sub_specialtie_id'=>$sub_specialtie_id
                ]);
            }
        }


        if($request->partner_ids!=null){
            foreach($request->partner_ids as $partner_id){
                DoctorInsurancePartner::create([
                     'doctor_id'=>$doctor->id,
                     'partner_id'=>$partner_id
                ]);
            }
        }

        DoctorPrice::create([
            'doctor_id'   => $doctor->id,
            'price'       => $request->price,
            'urgent_price'=> $request->urgent_price
        ]);

        return redirect()->route('Admin.doctors.index');
    }

    public function show($id){

    }


    public function edit(Doctor $doctor){

        $doctor->load(['info','serviceinfo','partners','specialtie','subspecialties']);

        $data = DoctorInfo::where('doctor_id',$doctor->id)->first();
        $specialties = Specialtie::get();
        $subspecialties = SubSpecialtie::where('specialtie_id',$specialties[0]->id)->get();
        $InsurancePartners = InsurancePartner::get();
        return view('Admin.doctors.edit',compact('doctor','specialties','subspecialties','InsurancePartners','data'));

    }

    public function update(Request $request,Doctor $doctor){

        if($request->file!=null){
            $request->merge(['img' => $this->MoveImage($request->file,'uploads/doctors')]);
            $doctor->img = $request->img;
        }

        $doctor->save();
        $infodata=[];  $serviceInfo=[]; $serviceInfos=[];

        // update doctor info
        $infodata['doctor_id'] = $doctor->id;
        $serviceInfo['doctor_id'] = $doctor->id;
        foreach (config('translatable.locales') as $locale){
            $infodata[$locale]=[
                'name'     =>$request->$locale['name'],
                'job_title' =>$request->$locale['job_title'],
                'title' =>$request->$locale['title'],
                'sub_title' =>$request->$locale['sub_title'] ?? '',
                'breif' =>$request->$locale['breif'],
                'desc' =>$request->$locale['desc'],
            ];
        }
        $doctorinfo = DoctorInfo::where('doctor_id',$doctor->id)->first();
        $doctorinfo->update($infodata);


        // update doctor service info
        DoctorServiceInfo::where('doctor_id',$doctor->id)->delete();
        foreach($request->info as $info){
            foreach (config('translatable.locales') as $locale){
                $serviceInfo[$locale]=[
                    'info' =>$info[$locale]
                ];
            }
            $serviceInfos[]=$serviceInfo;
        }
        foreach($serviceInfos as $info){
            DoctorServiceInfo::create($info);
        }

        $partners_ids = DoctorInsurancePartner::select('partner_id')->where('doctor_id',$doctor->id)->pluck('partner_id');
        $request_partner_ids = collect($request->partner_ids);

        // i use collection teqnie decause i wan't delete existing partern and add it again
        // add new partner
            $new_partners =  $request_partner_ids->diff($partners_ids);
            foreach($new_partners as $partner_id){
                DoctorInsurancePartner::create([
                    'doctor_id'=>$doctor->id,
                    'partner_id'=>$partner_id
            ]);
            }
        // delete un existing partner
            $deleteing_partner =  $partners_ids->diff($request_partner_ids);

            foreach($deleteing_partner as $partner_id){
                DoctorInsurancePartner::where([
                    'doctor_id'=>$doctor->id,
                    'partner_id'=>$partner_id
            ])->delete();
            }

        // update specialtie
        DoctorSpecialtie::where('doctor_id',$doctor->id)->update([
            'specialtie_id' =>$request->specialtie_id
        ]);


        DoctorSubSpecialtie::where('doctor_id',$doctor->id)->delete();

        if($request->sub_specialtie_ids!=null){
            foreach($request->sub_specialtie_ids as $sub_specialtie_id){
                DoctorSubSpecialtie::create([
                    'doctor_id'=>$doctor->id,
                    'sub_specialtie_id'=>$sub_specialtie_id
                ]);
            }
        }

         DoctorPrice::where(['doctor_id'=>$doctor->id])->update([
            'doctor_id'   => $doctor->id,
            'price'       => $request->price,
            'urgent_price'=> $request->urgent_price
        ]);

        return redirect()->back();

    }

    public function destroy(Request $request,$id){
        $data = Doctor::find($request->id);
        $data->delete();
        return redirect()->route('Admin.doctors.index');
    }


    public function subSpecialtie($id){



    }
}

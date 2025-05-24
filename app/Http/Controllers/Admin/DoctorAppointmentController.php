<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Doctor,Day,DoctorAppointment};
use DataTables;
use Yajra\DataTables\Html\Builder;
use Carbon\Carbon;
use DateTime;

class DoctorAppointmentController extends Controller
{
    //
    public function index($doctor_id,Builder $builder,Request $request){
            $query =  DoctorAppointment::query();
            if (request()->ajax()) {
            return DataTables::of($query->where('doctor_id',$doctor_id))
            ->filter(function ($query) use ($request) {
                if ($request->has('search') && !empty($request->input('search')['value'])) {
                    $search = $request->input('search')['value'];
                }
            })
            ->editColumn('created_at', function ($row) {
                return Carbon::parse($row->created_at)->format('d-m-Y');
            })
             ->addColumn('day', function ($row) {
               return $row->day->title;
            })
            ->addColumn('actions', function ($row) {
                $data="";

                return '
                    <a href="'.route('Admin.appointments.edit',$row->id).'" class="edit_btn">   <i class="ri-edit-line"></i> </a>
                    <a href="#" class="delete_btn" data-bs-toggle="modal" data-bs-target="#deleteModal"  data-id="'.$row->id.'">   <i class="ri-delete-bin-6-line"></i></a>
                    ';
            })
            ->rawColumns(['actions'])
            ->toJson();
        }

        $html = $builder->columns([
            ['title' => __('system.id'), 'data' => 'id', 'footer' => __('system.id') , 'orderable' => true],
            ['title' => __('day'), 'data' => 'day', 'footer' => __('day') , 'searchable' => true],
            ['title' => __('time from'), 'data' => 'time_from', 'footer' => __('name') , 'searchable' => true],
            ['title' => __('time to'), 'data' => 'time_to', 'footer' => __('job title') , 'searchable' => true],
            ['title' => __('system.created_at') ,'data' => 'created_at', 'footer' => __('system.created_at')],
            ['title' => __('system.actions'), 'data' => 'actions', 'footer' => __('system.actions'), 'orderable' => false, 'searchable' => false]
        ]);

        return view('Admin.doctors.appointments.index',compact('html','doctor_id'));
    }

    public function create($doctor_id){
        $days = Day::get();
        return view('Admin.doctors.appointments.create',compact('doctor_id','days'));
    }

    public function store(Request $request){
       
        $dateTime = DateTime::createFromFormat('H:i', $request->time_from);
        $timing = $dateTime->format('A');

        DoctorAppointment::create([
             'doctor_id'=>$request->doctor_id,
             'day_id'=>$request->day_id,
             'time_from'=>$request->time_from,
             'time_to'=>$request->time_to,
             'avilable_count'=>$request->avilable_count,
             'timing'=>$timing,
             'stop_on_complete'=> $request->stop_on_complete==null ? false :true
        ]);

        return redirect()->route('Admin.appointments.index',$request->doctor_id);
       
    }


    public function edit($id){
        $days = Day::get();
        $data = DoctorAppointment::find($id);
        return view('Admin.doctors.appointments.edit',compact('data','days'));
    }


    public function destroy(Request $request,$id){
        $data = DoctorAppointment::find($request->id);
        $data->delete();
        return redirect()->back();
    }
    
    public function update(Request $request,$id){
          $dateTime = DateTime::createFromFormat('H:i:s', $request->time_from);
          $timing = $dateTime->format('A'); 
          DoctorAppointment::find($id)->update([
             'day_id'=>$request->day_id,
             'time_from'=>$request->time_from,
             'time_to'=>$request->time_to,
             'avilable_count'=>$request->avilable_count,
             'timing'=>$timing,
             'stop_on_complete'=> $request->stop_on_complete==null ? false :true
          ]);
          return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MedicalAcademy;
use DataTables;
use Yajra\DataTables\Html\Builder;
use App\Traits\fileTrait;

class MedicalAcademyController extends Controller
{
    use fileTrait;

    public function index(Request $request,Builder $builder){

        if (request()->ajax()) {
            return DataTables::of(MedicalAcademy::query())
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
                    <a href="'.route('Admin.medical-academies.edit',$row->id).'" class="edit_btn">   <i class="ri-edit-line"></i> </a>

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
        return view('Admin.medical-academies.index',compact('html'));
    }


    public function create()
    {
        return view('Admin.medical-academies.create');
    }

    public function store(Request $request)
    {

        if($request->file!=null)
            $request->merge(['img' => $this->MoveImage($request->file,'uploads/medical-academies')]);

        $data = $request->except('file', 'videos', '_token', '_method');
        $medical_academy = MedicalAcademy::create($data);


        if($request->has('videos'))
        {
            foreach ($request->videos as $videoData) {
                $thumbnailPath = null;
                if (isset($videoData['img'])) {
                    $thumbnailPath = $this->MoveImage($videoData['img'], 'uploads/medical-academies/thumbnails');
                }

                $videoAttributes = [
                    'video_url' => $videoData['video_url'],
                    'img' => $thumbnailPath,
                ];

                foreach (config('translatable.locales') as $locale) {
                    $videoAttributes[$locale] = [
                        'title' => $videoData[$locale]['title'] ?? '',
                        'description' => $videoData[$locale]['description'] ?? '',
                    ];
                }
                $medical_academy->videos()->create($videoAttributes);
            }
        }

        return redirect()->route('Admin.medical-academies.index');
    }


    public function show(string $id)
    {
        $data = MedicalAcademy::find($id);
        return view('Admin.medical-academies.detail', compact('id','data'));
    }


    public function edit($id){
        $data = MedicalAcademy::find($id);
        return view('Admin.medical-academies.edit',compact('data'));
     }


    public function update(Request $request, $id)
    {
        if($request->file!=null)
            $request->merge(['img' => $this->MoveImage($request->file,'uploads/medical-academies')]);

        $medical_academy =  MedicalAcademy::find($id);

        $medical_academy->update($request->except(['id','_token','_method', 'file', 'videos', 'deleted_videos']));

        if ($request->has('videos')) {
            foreach ($request->videos as $videoData) {

                if (!isset($videoData['video_url']) || empty($videoData['video_url'])) {
                    continue;
                }

                $submittedVideoIds = [];
                $thumbnailPath = null;


                if (isset($videoData['img'])) {
                    $thumbnailPath = $this->MoveImage($videoData['img'], 'uploads/medical-academies/thumbnails');
                }

                $videoAttributes = [
                    'video_url' => $videoData['video_url'],
                ];

                if ($thumbnailPath !== null) {
                    $videoAttributes['img'] = $thumbnailPath;
                }

                foreach (config('translatable.locales') as $locale) {
                    $oldTranslation = [];
                    if (!empty($videoData['id'])) {
                        $video = $medical_academy->videos()->find($videoData['id']);
                        if ($video) {
                            $oldTranslation = $video->translate($locale)->toArray();
                        }
                    }

                    $videoAttributes[$locale] = [
                        'title' => $videoData[$locale]['title'] ?? $oldTranslation['title'] ?? '',
                        'description' => $videoData[$locale]['description'] ?? $oldTranslation['description'] ?? '',
                    ];
                }

                if (!empty($videoData['id'])) {
                    $video = $medical_academy->videos()->find($videoData['id']);
                    if ($video) {
                        $video->update($videoAttributes);
                        $submittedVideoIds[] = $video->id;
                    }
                } else {
                    $new = $medical_academy->videos()->create($videoAttributes);
                    $submittedVideoIds[] = $new->id;
                }
            }
        }

        if ($request->has('deleted_videos')) {
            foreach ($request->deleted_videos as $deletedId) {
                $medical_academy->videos()->where('id', $deletedId)->delete();
            }
        }

        return redirect()->back();
    }

    public function destroy(Request $request,$id)
    {
        $medical_academy =  MedicalAcademy::find($request->id);
        $medical_academy->delete();
        return redirect()->back();
    }
}

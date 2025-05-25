<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use Yajra\DataTables\Html\Builder;
use App\Traits\fileTrait;
use App\Models\Conference;
use App\Models\ConferenceAdvantge;
use App\Models\ConferenceImage;

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

        $data = $request->except('advantages', 'file', 'images');
        $conference = Conference::create($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $fileName = $this->MoveImage($image, 'uploads/conferences');
                ConferenceImage::create([
                    'conference_id' => $conference->id,
                    'image' => $fileName
                ]);
            }
        }
        // Loop through advantages input array
        foreach ($request->advantages as $advantageData) {
            $translations = [];

            foreach (config('translatable.locales') as $locale) {
                $translations[$locale] = [
                    'advantage_title' => $advantageData[$locale]['advantage_title'] ?? '',
                    'advantage_description' => $advantageData[$locale]['advantage_description'] ?? '',                            ];
            }
            $conference->advantages()->create($translations);
        }

        return redirect()->route('Admin.conferences.index')->with('success', 'Conference created successfully!');
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

        $conference =  Conference::findOrFail($id);
        $conference->update($request->except(['id', '_token', '_method', 'file', 'advantages']));

        $submittedIds = [];

        if ($request->has('advantages')) {
            foreach ($request->advantages as $advantageData) {
                $translations = [];

                foreach (config('translatable.locales') as $locale) {
                    $translations[$locale] = [
                        'advantage_title' => $advantageData[$locale]['advantage_title'] ?? '',
                        'advantage_description' => $advantageData[$locale]['advantage_description'] ?? '',
                    ];
                }

                if (!empty($advantageData['id'])) {
                    $adv = $conference->advantages()->find($advantageData['id']);
                    if ($adv) {
                        $adv->update($translations);
                        $submittedIds[] = $advantageData['id'];
                    }
                } else {
                    $new = $conference->advantages()->create($translations);
                    $submittedIds[] = $new->id;
                }
            }
        }

        //Delete any old advantages not in submitted form
        $conference->advantages()->whereNotIn('id', $submittedIds)->delete();

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

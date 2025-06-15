<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookTopic;
use DataTables;
use Yajra\DataTables\Html\Builder;
use App\Traits\fileTrait;

class LiberaryTopicController extends Controller
{
    //
    use fileTrait;
    public function index(Request $request, Builder $builder)
    {
        if (request()->ajax()) {
            return DataTables::of(BookTopic::query())
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
                    <a href="'.route('Admin.libraryTopic.edit',$row->id).'" class="edit_btn">   <i class="ri-edit-line"></i> </a>

                ';
            })
            ->editColumn('created_at', function ($row) {
                return \Carbon\Carbon::parse($row->created_at)->format('d-m-Y');
            })
            ->orderColumn('id', function ($query, $order) {
                $query->orderBy('id', $order);
            })
            ->rawColumns(['actions'])
            ->toJson();
        }

        $html = $builder->columns([
            ['title' => __('system.id'), 'data' => 'id', 'footer' =>  __('system.id') , 'orderable' => true],
            ['title' => __('title'), 'data' => 'title', 'footer' =>__('title') , 'searchable' => true],
            ['title' => __('system.actions'), 'data' => 'actions', 'footer' =>  __('system.actions'), 'orderable' => false, 'searchable' => false]

        ])->parameters([
            'order' => [[0, 'desc']],
        ]);


        return view('Admin.library.topics.index', compact('html'));
    }


    public function create()
    {
        return view('Admin.library.topics.create');
    }
    public function store(Request $request)
    {
        if($request->file!=null)
        $request->merge(['img' => $this->MoveImage($request->file,'uploads/BookTopics')]);

        BookTopic::create($request->except(['file']));
        return redirect()->route('Admin.libraryTopic.index');
    }


    public function edit($id)
    {
        $data = BookTopic::find($id);
        return view('Admin.library.topics.edit', compact('data'));
    }


     public function update(Request $request,$id){
        if($request->file!=null)
        $request->merge(['img' => $this->MoveImage($request->file,'uploads/BookTopics')]);

        $Article =  BookTopic::find($id);
        $Article->update($request->except(['id','_token','_method','file']));
        return redirect()->back();
     }


    public function destroy(Request $request,$id){
        $data = BookTopic::find($request->id);
        $data->delete();
        return redirect()->route('Admin.libraryTopic.index');
    }


}

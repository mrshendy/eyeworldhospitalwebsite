<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Article,Quetion};
use DataTables;
use Yajra\DataTables\Html\Builder;
use Carbon\Carbon;
use App\Traits\fileTrait;

class ArticleController extends Controller
{
    //
    use fileTrait;
    public function index(Builder $builder,Request $request){


        if (request()->ajax()) {
            return DataTables::of(Article::query())
            ->filter(function ($query) use ($request) {
                if ($request->has('search') && !empty($request->input('search')['value'])) {
                    $search = $request->input('search')['value'];
                    $query->whereHas('translation',function ($q) use ($search) {
                        $q->where('title', 'LIKE', "%{$search}%");
                    });
                }
            })
            ->editColumn('created_at', function ($row) {
                return Carbon::parse($row->created_at)->format('d-m-Y'); 
            })
            ->addColumn('actions', function ($row) {
                $data="";
             
            
                return '
                    <a href="'.route('Admin.articles.edit',$row->id).'" class="edit_btn">   <i class="ri-edit-line"></i> </a>
                    <a href="#" class="delete_btn" data-bs-toggle="modal" data-bs-target="#deleteModal"  data-id="'.$row->id.'">   <i class="ri-delete-bin-6-line"></i></a>

                    ';
            })
            ->rawColumns(['actions'])
            ->toJson();
        }

        $html = $builder->columns([
            ['title' => __('system.id'), 'data' => 'id', 'footer' => __('system.id') , 'orderable' => true],
            ['title' => __('title'), 'data' => 'title', 'footer' => __('title') , 'searchable' => true],
            ['title' => __('desc'), 'data' => 'desc', 'footer' => __('desc') , 'searchable' => true],
            ['title' => __('system.created_at') ,'data' => 'created_at', 'footer' => __('system.created_at')],
            ['title' => __('system.actions'), 'data' => 'actions', 'footer' => __('system.actions'), 'orderable' => false, 'searchable' => false]
        ]);

        return view('Admin.article.index',compact('html'));
    }

    public function create(){
        return view('Admin.article.create');
    }

    public function store(Request $request){

        dd($request->all());
        

        if($request->img!=null){
          $img =  $this->MoveImage($request->img,'uploads/articles');
          $request->merge(['img' => $img]);

        }

        Article::create($request->all());
        return redirect()->route('Admin.articles.index');
    }


    public function edit($id){
       $data = Article::find($id);
       return view('Admin.article.edit',compact('data'));
    }

    public function update(Request $request,$id){
        if($request->img!=null)
        $request->merge(['img' => $this->MoveImage($request->img,'uploads/articles')]);

        $Article =  Article::find($id);
        $Article->update($request->except(['id','_token','_method']));
        return redirect()->back();
    }


    public function destroy(Request $request,$id){
        $article = Article::find($request->id);
        $article->delete();
        return redirect()->route('Admin.articles.index');
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Book,BookTopic};
use DataTables;
use Yajra\DataTables\Html\Builder;
use App\Traits\fileTrait;

class BookController extends Controller
{
    //

    use fileTrait;


     public function index(Request $request, Builder $builder)
    {
        if (request()->ajax()) {
            return DataTables::of(Book::query())
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
                    <a href="'.route('Admin.books.edit',$row->id).'" class="edit_btn">   <i class="ri-edit-line"></i> </a>

                ';
            })
            ->addColumn('is_active', function ($row) {
                  return '
                        <input type="checkbox" class="toggle-active active-book" data-id="'.$row->id.'" '.($row->is_active ? 'checked' : '').'>
                    ';
            })
            ->editColumn('created_at', function ($row) {
                return \Carbon\Carbon::parse($row->created_at)->format('d-m-Y');
            })

            ->orderColumn('id', function ($query, $order) {
                $query->orderBy('id', $order);
            })
            ->rawColumns(['actions','is_active'])
            ->toJson();
        }

        $html = $builder->columns([
            ['title' => __('system.id'), 'data' => 'id', 'footer' =>  __('system.id') , 'orderable' => true],
            ['title' => __('title'), 'data' => 'title', 'footer' =>__('title') , 'searchable' => true],
            ['title' => __('price'), 'data' => 'price', 'footer' =>__('price') , 'searchable' => true],
            ['title' => __('pdf price'), 'data' => 'pdf_price', 'footer' =>__('pdf price') , 'searchable' => true],
            ['title' => __('count'), 'data' => 'count', 'footer' =>__('count') , 'searchable' => true],
            ['title' => __('Is Active'), 'data' => 'is_active', 'footer' =>__('Is Active') , 'searchable' => true],
            ['title' => __('created at'), 'data' => 'created_at', 'footer' =>__('created at') , 'searchable' => true],
            ['title' => __('system.actions'), 'data' => 'actions', 'footer' =>  __('system.actions'), 'orderable' => false, 'searchable' => false]

        ])->parameters([
            'order' => [[0, 'desc']],
        ]);


        return view('Admin.library.books.index', compact('html'));
    }



    public function create()
    {
        $topics = BookTopic::all();
        return view('Admin.library.books.create', compact('topics'));
    }

    public function destroy(Request $request,$id){
        $data = Book::find($request->id);
        if($data->img && file_exists(public_path('uploads/books/' . basename($data->img))))
            unlink(public_path('uploads/books/' . basename($data->img)));

        if($data->pdf_file && file_exists(public_path('uploads/files/books/' . basename($data->pdf_file))))
            unlink(public_path('uploads/files/books/' . basename($data->pdf_file)));

        $data->delete();
        return redirect()->route('Admin.books.index');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'topic_id' => 'required|exists:book_topics,id',
            'img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'price' => 'required|numeric|min:0',
            'pdf_price' => 'required|numeric|min:0',
            'count' => 'required|integer|min:0',
            'en.title' => 'required|string|max:255',
            'en.desc' => 'nullable|string',
            'ar.title' => 'required|string|max:255',
            'ar.desc' => 'nullable|string',
        ]);

        if ($request->hasFile('img')) {
            $data['img'] = $this->uploadImage($request->file('img'), 'uploads/books');
        }
         if ($request->hasFile('file')) {
            $data['pdf_file'] = $this->uploadImage($request->file('file'), 'uploads/files/books');
        }

        Book::create($data);

        return redirect()->route('Admin.books.index')->with('success', __('system.created_successfully'));
    }
    public function edit($id)
    {
        $data = Book::findOrFail($id);
        $topics = BookTopic::all();
        return view('Admin.library.books.edit', compact('data', 'topics'));
    }
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $data = $request->validate([
            'topic_id' => 'required|exists:book_topics,id',
            'img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'price' => 'required|numeric|min:0',
            'pdf_price' => 'required|numeric|min:0',
            'count' => 'required|integer|min:0',
            'en.title' => 'required|string|max:255',
            'en.desc' => 'nullable|string',
            'ar.title' => 'required|string|max:255',
            'ar.desc' => 'nullable|string',
        ]);

         if ($request->hasFile('img')) {
             if ($book->img && file_exists(public_path('uploads/books/' . basename($book->img)))) {
                unlink(public_path('uploads/books/' . basename($book->img)));
            }
             $data['img'] = $this->uploadImage($request->file('img'), 'uploads/books');
         }

          if ($request->hasFile('file')) {
             if ($book->pdf_file && file_exists(public_path('uploads/files/books/' . basename($book->pdf_file)))) {
                unlink(public_path('uploads/files/books/' . basename($book->pdf_file)));
            }
             $data['pdf_file'] = $this->uploadImage($request->file('file'), 'uploads/files/books');
         }

        $book->update($data);

        return redirect()->route('Admin.books.index')->with('success', __('system.updated_successfully'));
    }


    public function updateStatus(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->is_active = !$book->is_active; // Toggle the is_active status
        $book->save();

        return response()->json(['success' => true, 'message' => __('status updated successfully')]);
    }
}

<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookTopic;
use App\Models\BookInfo;
use Alert;

class BookController extends Controller
{
    //
    public function index()
    {
        $bookTopics = BookTopic::all();
        $book_info = BookInfo::first();
        return view('Site.books.index', compact('bookTopics', 'book_info'));
    }

    public function show($id)
    {
        $book_topic = BookTopic::with('books')->findOrFail($id);
        return view('Site.books.books', compact('book_topic'));
    }

    public function download(Book $book)
    {
        $filename = $book->getRawOriginal('pdf_file');
        if (!$filename) {
            Alert::error(__('Error'), __('Book has no file to be downloaded'));
            return redirect()->back();

        }
        $filePath = public_path('uploads/files/books/' . $filename);

        if (!file_exists($filePath)) {
            abort(404, 'Book Not Exist');
        }

        return response()->download($filePath, $book->title . '.pdf');

    }
 }

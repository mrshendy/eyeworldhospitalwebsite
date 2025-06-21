<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookTopic;
use App\Models\BookInfo;

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
}

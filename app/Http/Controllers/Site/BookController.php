<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookTopic;

class BookController extends Controller
{
    //
    public function index()
    {
        $books = Book::where('is_active', 1)->with('bookTopic')->get();
        $bookTopics = BookTopic::all();
        return view('Site.books.index', compact('books', 'bookTopics'));
    }
}

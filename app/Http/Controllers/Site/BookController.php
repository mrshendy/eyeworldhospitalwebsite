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
        $books = Book::where('is_active', 1)->with('bookTopic')->get();
        $bookTopics = BookTopic::all();
        $book_info = BookInfo::first();
        return view('Site.books.index', compact('books', 'bookTopics', 'book_info'));
    }

    public function books($topic_id){
        $books = Book::where('is_active', 1)->where('book_topic_id', $topic_id)->with('bookTopic')->get();
        return view('Site.books.books', compact('books'));
    }
}

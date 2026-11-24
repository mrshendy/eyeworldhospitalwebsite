<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookInfo;
use App\Traits\fileTrait;
use Illuminate\Http\Request;

class BookInfoController extends Controller
{
    use fileTrait;

    public function detail()
    {
        $data = BookInfo::first();

        return view('Admin.services.books.detail', compact('data'));
    }

    public function update(Request $request)
    {
        $info = BookInfo::first();
        if ($request->file != null) {
            $request->merge(['img' => $this->MoveImage($request->file, 'uploads/books')]);
        }

        $info->update($request->except(['file', '_token', '_method']));

        return redirect()->back();

    }
}

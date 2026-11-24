<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\EyeHealthInfo;

class EyeHealthInfoController extends Controller
{
    //
    public function index()
    {
        $data = EyeHealthInfo::first();
        $articles = Article::orderby('id', 'desc')->get()->take(8);

        return view('Site.service.eye_info.index', compact('data', 'articles'));
    }

    public function getArticle($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        $articles = Article::orderBy('id', 'desc')->get()->take(4);

        return view('Site.service.articles.detail', compact('article', 'articles'));
    }
}

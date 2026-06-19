<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();
        return view('articles', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('article-detail', compact('article'));
    }
}

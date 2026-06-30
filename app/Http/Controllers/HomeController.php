<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Service;
use App\Models\Article;
use App\Models\FashionCollection;

class HomeController extends Controller
{
    public function index()
    {
        $company = Company::first();
        $fashionCollections = FashionCollection::latest()->take(6)->get();
        $services = Service::all();
        $articles = Article::latest()->take(3)->get();

        return view('home', compact('company', 'fashionCollections', 'services', 'articles'));
    }
}

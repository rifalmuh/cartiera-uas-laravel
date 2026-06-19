<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Service;
use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        $company = Company::first();
        $services = Service::all();
        $articles = Article::latest()->take(3)->get();

        return view('home', compact('company', 'services', 'articles'));
    }
}
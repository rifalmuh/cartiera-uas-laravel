<?php

namespace App\Http\Controllers;

use App\Models\Company;

class AboutController extends Controller
{
    public function index()
    {
        $company = Company::first();

        return view('about', compact('company'));
    }
}
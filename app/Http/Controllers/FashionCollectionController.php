<?php

namespace App\Http\Controllers;

use App\Models\FashionCollection;
use Illuminate\View\View;

class FashionCollectionController extends Controller
{
    public function index(): View
    {
        return view('fashion-collections', [
            'fashionCollections' => FashionCollection::latest()->get(),
        ]);
    }
}

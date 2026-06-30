<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Company;
use App\Models\Contact;
use App\Models\FashionCollection;
use App\Models\Service;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'counts' => [
                'Profil Perusahaan' => Company::count(),
                'Koleksi Fashion' => FashionCollection::count(),
                'Artikel' => Article::count(),
                'Produk / Layanan' => Service::count(),
                'Kontak' => Contact::count(),
            ],
            'latestFashionCollections' => FashionCollection::latest()->take(5)->get(),
            'latestArticles' => Article::latest()->take(5)->get(),
        ]);
    }
}

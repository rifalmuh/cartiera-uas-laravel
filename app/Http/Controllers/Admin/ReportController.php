<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\FashionCollection;
use Barryvdh\DomPDF\Facade\Pdf;
use Symfony\Component\HttpFoundation\Response;

class ReportController extends Controller
{
    public function articles(): Response
    {
        $pdf = Pdf::loadView('admin.reports.articles', [
            'articles' => Article::latest()->get(),
            'printedAt' => now(),
        ])->setPaper('a4', 'portrait');

        return $pdf->download('laporan-artikel-cartiera-'.now()->format('Ymd-His').'.pdf');
    }

    public function fashionCollections(): Response
    {
        $pdf = Pdf::loadView('admin.reports.fashion-collections', [
            'fashionCollections' => FashionCollection::orderBy('id_fashion')->get(),
            'printedAt' => now(),
        ])->setPaper('a4', 'landscape');

        return $pdf->download('laporan-koleksi-fashion-cartiera-'.now()->format('Ymd-His').'.pdf');
    }
}

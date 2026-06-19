<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
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
}

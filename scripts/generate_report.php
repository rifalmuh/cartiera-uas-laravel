<?php

declare(strict_types=1);

use App\Models\Article;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\Console\Kernel;

$root = dirname(__DIR__);
require $root.'/vendor/autoload.php';

$app = require $root.'/bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();

$outputDirectory = $root.'/storage/app/reports';
if (! is_dir($outputDirectory)) {
    mkdir($outputDirectory, 0775, true);
}

$outputPath = $outputDirectory.'/laporan-artikel-cartiera.pdf';
Pdf::loadView('admin.reports.articles', [
    'articles' => Article::latest()->get(),
    'printedAt' => now(),
])->setPaper('a4', 'portrait')->save($outputPath);

echo "Report dibuat: {$outputPath}".PHP_EOL;

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\CompanyController as AdminCompanyController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

Route::middleware('guest.admin')->group(function (): void {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
});

Route::prefix('admin')->name('admin.')->middleware('admin.session')->group(function (): void {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('companies', AdminCompanyController::class)->except('show');
    Route::resource('articles', AdminArticleController::class)->except('show');
    Route::resource('services', AdminServiceController::class)->except('show');
    Route::resource('contacts', AdminContactController::class)->except('show');
    Route::get('/reports/articles', [ReportController::class, 'articles'])->name('reports.articles');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

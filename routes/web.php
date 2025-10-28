<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\LegalProductController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ConsultationManagementController;
use App\Http\Controllers\Admin\ArticleManagementController;
use App\Http\Controllers\Admin\LegalProductManagementController;
use App\Http\Controllers\Admin\ScheduleController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang', [HomeController::class, 'about'])->name('about');

Route::get('/konsultasi', [ConsultationController::class, 'create'])->name('consultations.create');
Route::post('/konsultasi', [ConsultationController::class, 'store'])->name('consultations.store');
Route::get('/lacak-konsultasi', [ConsultationController::class, 'track'])->name('consultations.track');
Route::post('/lacak-konsultasi', [ConsultationController::class, 'search'])->name('consultations.search');

Route::get('/produk-hukum', [LegalProductController::class, 'index'])->name('legal-products.index');
Route::get('/produk-hukum/{legalProduct}/download', [LegalProductController::class, 'download'])->name('legal-products.download');

Route::get('/artikel', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/artikel/{article:slug}', [ArticleController::class, 'show'])->name('articles.show');

Auth::routes(['register' => false]);

Route::get('/admin/login', function() {
    if (auth()->check()) {
        return redirect()->route('admin.dashboard');
    }
    return view('auth.login');
})->name('login');

Route::get('/admin/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/admin/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('consultations', ConsultationManagementController::class)->only(['index', 'show', 'update']);
    
    Route::resource('articles', ArticleManagementController::class);
    
    Route::resource('legal-products', LegalProductManagementController::class);
    
    Route::resource('schedules', ScheduleController::class);
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AgendaController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('agenda', AgendaController::class);
    Route::resource('laporan', LaporanController::class);
    Route::resource('reports', ReportController::class);

    // Additional admin routes for exporting and PDF generation
    Route::get('laporan/export', [LaporanController::class, 'export'])->name('laporan.export');
    Route::get('laporan/pdf', [LaporanController::class, 'generatePDF'])->name('laporan.pdf');
});

require __DIR__ . '/auth.php';
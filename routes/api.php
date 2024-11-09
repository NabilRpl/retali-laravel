<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AgendaController;
use App\Http\Controllers\Api\LaporanController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\LogintController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
});
    Route::get('/agenda', [AgendaController::class, 'index']);      // Get all agenda
    Route::post('/agenda', [AgendaController::class, 'store']);     // Create agenda
    Route::get('/agenda/{id}', [AgendaController::class, 'show']);  // Show specific agenda
    Route::put('/agenda/{id}', [AgendaController::class, 'update']); // Update agenda
    Route::delete('/agenda/{id}', [AgendaController::class, 'destroy']); // Delete agenda

    Route::get('/laporan', [LaporanController::class, 'index']);         // Get all laporan
    Route::post('/laporan', [LaporanController::class, 'store']);        // Create laporan
    Route::get('/laporan/{id}', [LaporanController::class, 'show']);     // Show specific laporan
    Route::put('/laporan/{id}', [LaporanController::class, 'update']);   // Update laporan
    Route::delete('/laporan/{id}', [LaporanController::class, 'destroy']); // Delete laporan

    Route::post('/submit-report', [ReportController::class, 'store']);

    Route::post('/login', [LoginController::class, 'login']);
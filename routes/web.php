<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['multi-auth', 'check-privileges'])->group(function () {

    
    
    // ======================= Kepala Sub =======================
    Route::middleware('role:kepala_sub')->prefix('kepala-sub')->controller(KepalaSubController::class)->group(function () {
        Route::get('/', 'index')->name('kepalasub.dashboard');
        Route::get('/dashboard/data', 'getDashboardData')->name('kepalasub.dashboard.data');
        Route::post('/surat/{id}/approve', 'approveSurat')->name('kepalasub.approve');
        Route::post('/surat/{id}/reject', 'rejectSurat')->name('kepalasub.reject');
        Route::get('/statistik','statistik')->name('kepalasub.statistik');
        Route::get('/persetujuansurat','persetujuansurat')->name('kepalasub.persetujuansurat');
        Route::get('/persetujuansurat/data','getSuratDiajukanData')->name('kepalasub.persetujuansurat.data');
        Route::get('/surat/{id}/tinjau','tinjauSurat')->name('kepalasub.tinjau-surat');
    });
});



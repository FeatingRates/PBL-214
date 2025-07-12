<?php

use App\Http\Controllers\tatausahaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['multi-auth', 'check-privileges'])->group(function () {

       // ======================= Staff =======================
    Route::middleware('role:staff')->group(function () {
        Route::prefix('staff-umum')->controller(staffumumController::class)->group(function () {
            Route::get('/', 'index')->name('staffumum.dashboard');
            Route::get('/search', 'search')->name('staffumum.search');
            Route::get('/statistik','statistik')->name('staffumum.statistik');
            Route::get('/terbitkan','terbitkan')->name('staffumum.terbitkan');
            Route::get('/statussurat','statussurat')->name('staffumum.statussurat');
            Route::get('/statussurat/data', 'getStatusSuratData')->name('staffumum.statussurat.data');
            Route::get('/statussurat/{id}', 'showStatusSurat')->name('staffumum.statussurat.show');
            Route::get('/jenissurat','jenissurat')->name('staffumum.jenissurat');
            Route::post('/jenis-surat', 'storeJenisSurat')->name('staffumum.jenissurat.store');
            Route::put('/jenis-surat/{id}', 'updateJenisSurat')->name('staffumum.jenissurat.update');
            Route::delete('/jenis-surat/{id}', 'destroyJenisSurat')->name('staffumum.jenissurat.destroy');
            Route::get('/tinjau-surat', 'tinjauSurat')->name('staffumum.tinjausurat');
            Route::get('/tinjau-surat/data', 'getSuratData')->name('staffumum.tinjau.data');
            Route::get('/surat/{id}/tinjau', 'showDetailSurat')->name('staffumum.tinjau.detail');
            Route::post('/surat/{id}/tolak', 'tolakSurat')->name('staffumum.surat.tolak');
            Route::post('/surat/{id}/approve', 'approveSurat')->name('staffumum.surat.approve');
        }); 

    Route::prefix('tata-usaha')->controller(tatausahaController::class)->group(function () {
            Route::get('/', 'index')->name('tatausaha.dashboard');
            Route::get('/search', 'search')->name('tatausaha.search');
            Route::get('/statistik','statistik')->name('tatausaha.statistik');
            Route::get('/terbitkan','terbitkan')->name('tatausaha.terbitkan');
            Route::get('/terbitkan/data', 'getTerbitkanData')->name('tatausaha.terbitkan.data');
            Route::get('/terbitkan/{id}/detail', 'detail')->name('tatausaha.terbitkan.detail');
            Route::get('/statussurat','statussurat')->name('tatausaha.statussurat');
            Route::get('/statussurat/data', 'getStatusSuratData')->name('tatausaha.statussurat.data');
            Route::get('/statussurat/{id}', 'showStatusSurat')->name('tatausaha.statussurat.show');
            Route::get('/jenissurat','jenissurat')->name('tatausaha.jenissurat');
            Route::post('/jenis-surat', 'storeJenisSurat')->name('tatausaha.jenissurat.store');
            Route::put('/jenis-surat/{id}', 'updateJenisSurat')->name('tatausaha.jenissurat.update');
            Route::delete('/jenis-surat/{id}', 'destroyJenisSurat')->name('tatausaha.jenissurat.destroy');
            Route::get('/tinjau-surat','tinjauSurat')->name('tatausaha.tinjausurat');
            Route::get('/tinjau-surat/data', 'getSuratData')->name('tatausaha.tinjau.data');
            Route::get('/surat/{id}/tinjau', 'showDetailSurat')->name('tatausaha.tinjau.detail');
            Route::post('/surat/{id}/tolak', 'tolakSurat')->name('tatausaha.surat.tolak');
            Route::post('/surat/{id}/approve', 'approveSurat')->name('tatausaha.surat.approve');
            Route::post('/surat/{id}/terbitkan', 'terbitkanSurat')->name('tatausaha.surat.terbitkan');
        });

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



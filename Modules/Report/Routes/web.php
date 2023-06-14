<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('report')->middleware(['auth'])->group(function() {
    Route::get('/abc/all', [\Modules\Report\Http\Controllers\ReportController::class, 'reports_abc_all'])->name('reports.abc.all');
    Route::get('/abc/view/{report}', [\Modules\Report\Http\Controllers\ReportController::class, 'report_abc_view'])->name('report.abc.view');
    Route::get('/abc', [\Modules\Report\Http\Controllers\ReportController::class, 'report_abc'])->name('report.abc.create');
    Route::post('/abc/store', [\Modules\Report\Http\Controllers\ReportController::class, 'report_abc_store'])->name('report.abc.store');
});
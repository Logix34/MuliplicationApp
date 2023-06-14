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

Route::prefix('coordinator')->middleware(['auth'])->group(function() {
    Route::get('/', [\Modules\Coordinator\Http\Controllers\CoordinatorController::class, 'index'])->name('coordinators.all');
    Route::get('/create', [\Modules\Coordinator\Http\Controllers\CoordinatorController::class, 'create'])->name('coordinator.create');
    Route::post('/store', [\Modules\Coordinator\Http\Controllers\CoordinatorController::class, 'store'])->name('coordinator.store');
    Route::get('/edit/{coordinator}', [\Modules\Coordinator\Http\Controllers\CoordinatorController::class, 'edit'])->name('coordinator.edit');
    Route::put('/update/{coordinator}', [\Modules\Coordinator\Http\Controllers\CoordinatorController::class, 'update'])->name('coordinator.update');
    Route::delete('/delete/{coordinator}', [\Modules\Coordinator\Http\Controllers\CoordinatorController::class, 'destroy'])->name('coordinator.delete');
});
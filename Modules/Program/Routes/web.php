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

Route::prefix('program')->middleware(['auth'])->group(function() {
    Route::get('/', [\Modules\Program\Http\Controllers\ProgramController::class, 'index'])->name('programs.all');
    Route::get('/create', [\Modules\Program\Http\Controllers\ProgramController::class, 'create'])->name('program.create');
    Route::post('/store', [\Modules\Program\Http\Controllers\ProgramController::class, 'store'])->name('program.store');
    Route::get('/edit/{program}', [\Modules\Program\Http\Controllers\ProgramController::class, 'edit'])->name('program.edit');
    Route::put('/update/{program}', [\Modules\Program\Http\Controllers\ProgramController::class, 'update'])->name('program.update');
    Route::delete('/delete/{program}', [\Modules\Program\Http\Controllers\ProgramController::class, 'destroy'])->name('program.delete');
});
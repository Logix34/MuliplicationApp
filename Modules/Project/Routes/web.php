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

Route::prefix('project')->middleware(['auth'])->group(function() {
    Route::post('/planter/add', [\Modules\Project\Http\Controllers\ProjectController::class, 'planter_add'])->name('planter.add');
    Route::get('/all', [\Modules\Project\Http\Controllers\ProjectController::class, 'index'])->name('projects.all');
    Route::get('/denomination', [\Modules\Project\Http\Controllers\ProjectController::class, 'denomination'])->name('projects.denomination');
    Route::get('/create', [\Modules\Project\Http\Controllers\ProjectController::class, 'create'])->name('project.create');
    Route::post('/create/Denomination', [\Modules\Project\Http\Controllers\ProjectController::class, 'addDenomination'])->name('project.create.denomination');
    Route::get('/states', [\Modules\Project\Http\Controllers\ProjectController::class, 'states'])->name('project.states');
    Route::get('/cities', [\Modules\Project\Http\Controllers\ProjectController::class, 'cities'])->name('project.cities');
    Route::post('/store', [\Modules\Project\Http\Controllers\ProjectController::class, 'store'])->name('project.add');
    Route::get('/edit/{project}', [\Modules\Project\Http\Controllers\ProjectController::class, 'edit'])->name('project.edit');
    Route::post('/edit', [\Modules\Project\Http\Controllers\ProjectController::class, 'update'])->name('project.update');
    Route::get('/delete/{project}', [\Modules\Project\Http\Controllers\ProjectController::class, 'destroy'])->name('project.delete');

});

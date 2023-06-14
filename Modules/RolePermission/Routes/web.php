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

Route::prefix('rolepermission')->middleware(['auth'])->group(function() {
    Route::get('/', [\Modules\RolePermission\Http\Controllers\RolePermissionController::class, 'index'])->name('rolepermission.all');
    Route::get('/edit/{id}', [\Modules\RolePermission\Http\Controllers\RolePermissionController::class, 'edit'])->name('rolepermission.edit');
    Route::post('/edit', [\Modules\RolePermission\Http\Controllers\RolePermissionController::class, 'update'])->name('rolepermission.update');
});
Route::prefix('role')->middleware(['auth'])->group(function() {
    Route::get('/all', [\Modules\RolePermission\Http\Controllers\RoleController::class, 'index'])->name('role.all');
    Route::get('/create', [\Modules\RolePermission\Http\Controllers\RoleController::class, 'create'])->name('role.create');
    Route::post('/store', [\Modules\RolePermission\Http\Controllers\RoleController::class, 'store'])->name('role.add');
    Route::get('/edit/{id}', [\Modules\RolePermission\Http\Controllers\RoleController::class, 'edit'])->name('role.edit');
    Route::post('/edit', [\Modules\RolePermission\Http\Controllers\RoleController::class, 'update'])->name('role.update');
    Route::get('/delete/{id}', [\Modules\RolePermission\Http\Controllers\RoleController::class, 'destroy'])->name('role.delete');

});
Route::prefix('permission')->middleware(['auth'])->group(function() {
    Route::get('/all', [\Modules\RolePermission\Http\Controllers\PermissionController::class, 'index'])->name('permission.all');
    Route::get('/create', [\Modules\RolePermission\Http\Controllers\PermissionController::class, 'create'])->name('permission.create');
    Route::post('/store', [\Modules\RolePermission\Http\Controllers\PermissionController::class, 'store'])->name('permission.add');
    Route::get('/edit/{id}', [\Modules\RolePermission\Http\Controllers\PermissionController::class, 'edit'])->name('permission.edit');
    Route::post('/edit', [\Modules\RolePermission\Http\Controllers\PermissionController::class, 'update'])->name('permission.update');
    Route::get('/delete/delete/{id}', [\Modules\RolePermission\Http\Controllers\PermissionController::class, 'destroy'])->name('permission.delete');

});
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

Route::prefix('user')->middleware(['auth'])->group(function() {
    Route::controller(UserController::class)->group(function () {
        Route::get('affiliation/{user?}', 'affiliation')->middleware(['role:user'])->name('user.affiliation');
        Route::get('profile', 'profile')->name('user.profile');
        Route::get('church', 'church')->name('user.church');
        Route::get('m_church', 'm_church')->name('user.m_church');
        Route::get('testimony', 'testimony')->name('user.testimony');
        Route::get('all', 'index')->middleware(['permission:view_users'])->name('user.all');
        Route::get('planters_all', 'planters_all')->middleware(['permission:planters_all'])->name('planters.all');
        Route::get('create', 'create')->middleware(['permission:create_user'])->name('user.create');
        Route::get('add_planter', 'add_planter')->middleware(['permission:add_planter'])->name('planter.create');
        Route::post('store', 'store')->middleware(['permission:create_user'])->name('user.store');
        Route::post('profile/update', 'profileUpdate')->name('user.profile.update');
        Route::get('/states', [\Modules\User\Http\Controllers\UserController::class, 'states'])->name('user.states');
        Route::get('/cities', [\Modules\User\Http\Controllers\UserController::class, 'cities'])->name('user.cities');
        Route::get('detail/{user}', 'detail')->middleware(['permission:user_detail'])->name('user.detail');
        Route::get('view/{user}', 'view')->middleware(['permission:user_view'])->name('user.view');
        Route::get('admin/accounts/{user}', 'accounts')->middleware(['permission:user_accounts'])->name('user.admin.accounts');
        Route::post('update', 'update')->middleware(['permission:user_detail'])->name('user.update');
        Route::get('affiliation/user/{user}', 'user_affiliation')->name('user.affiliation.admin');
        Route::get('agreement/user/{user}', 'user_agreement')->name('user.agreement.admin');
        Route::get('account/{user}', 'user_account')->name('user.account');
        Route::get('transactions/{user}', 'transactions')->name('user.transactions.admin');
        Route::post('add', 'add_user')->name('add.user');
        Route::get('delete/{user}', 'destroy')->name('user.delete');
        Route::get('affliation/setting', 'affliation_setting')->name('affliation.setting');
        Route::post('affliation/setting/addorupdate', 'affliation_add_update')->name('affliation.setting.add.update');

        Route::post('tax/setting/addorupdate', 'tax_add_update')->name('tax.setting.add.update');
        Route::get('tax_document', 'tax_document')->name('user.tax_document');
        Route::post('tax_document_post', 'tax_document_post')->name('user.tax_document_post');

        Route::get('view_agreement', 'view_agreement')->name('user.view.agreement');
        Route::post('agreement/setting/addorupdate', 'agreement_add_update')->name('agreement.setting.add.update');
    });
});

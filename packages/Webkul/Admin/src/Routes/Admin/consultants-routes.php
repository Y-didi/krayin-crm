<?php

use Illuminate\Support\Facades\Route;
use Webkul\Admin\Http\Controllers\Consultants\ActivityController;
use Webkul\Admin\Http\Controllers\Consultants\ConsultantController;
use Webkul\Admin\Http\Controllers\Consultants\TagController;

Route::group(['middleware' => ['user']], function () {
    Route::controller(ConsultantController::class)->prefix('consultants')->group(function () {
        Route::get('', 'index')->name('admin.consultants.index');

        Route::get('create', 'create')->name('admin.consultants.create');

        Route::post('create', 'store')->name('admin.consultants.store');

        Route::get('view/{id}', 'view')->name('admin.consultants.view');

        Route::get('edit/{id}', 'edit')->name('admin.consultants.edit');

        Route::put('edit/{id}', 'update')->name('admin.consultants.update');

        Route::get('search', 'search')->name('admin.consultants.search');

        Route::delete('{id}', 'destroy')->name('admin.consultants.delete');

        Route::post('mass-destroy', 'massDestroy')->name('admin.consultants.mass_delete');

        Route::controller(ActivityController::class)->prefix('{id}/activities')->group(function () {
            Route::get('', 'index')->name('admin.consultants.activities.index');
        });

        Route::controller(TagController::class)->prefix('{id}/tags')->group(function () {
            Route::post('', 'attach')->name('admin.consultants.tags.attach');

            Route::delete('', 'detach')->name('admin.consultants.tags.detach');
        });
    });
});

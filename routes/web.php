<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Botble\MaintenanceMode\Http\Controllers', 'middleware' => 'web'], function () {
    Route::group(['prefix' => config('core.base.general.admin_dir'), 'middleware' => 'auth'], function () {
        Route::group(['prefix' => 'system/maintenance'], function () {
            Route::get('', [
                'as' => 'system.maintenance.index',
                'uses' => 'MaintenanceModeController@getIndex',
                'permission' => ACL_ROLE_SUPER_USER,
            ]);

            Route::post('run', [
                'as' => 'system.maintenance.run',
                'uses' => 'MaintenanceModeController@postRun',
                'middleware' => 'preventDemo',
                'permission' => ACL_ROLE_SUPER_USER,
            ]);
        });
    });
});

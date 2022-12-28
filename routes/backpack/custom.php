<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('blood-pack', 'BloodPackCrudController');
    Route::get('/blood-pack/{id}/mark-sold', 'BloodPackCrudController@markSold')->name('admin.blood_pack.mark_sold');
    Route::get('/blood-pack/{id}/mark-reserved', 'BloodPackCrudController@markReserved')->name('admin.blood_pack.mark_reserved');
    Route::crud('donor', 'DonorCrudController');
    Route::crud('event', 'EventCrudController');
    Route::get('charts', 'ChartController@index');
    Route::crud('hospital-request', 'HospitalRequestCrudController');
}); // this should be the absolute last line of this file
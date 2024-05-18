<?php

use App\Http\Controllers\PublicPart\HomeController;
use App\Http\Controllers\PublicPart\PropertiesController;
use Illuminate\Support\Facades\Route;

// Init route
//Route::get('/', function () {
//    return view('welcome');
//});


/**
 *  Public routes; Data visible to all visitors
 */

Route::prefix('')->group(function () {
    Route::get('/',                    [HomeController::class, 'home'])->name('public-part.home');

    /**
     *  Properties controller
     */
    Route::prefix('/properties')->group(function () {
        Route::get('/',                                [PropertiesController::class, 'index'])->name('public-part.properties');
        Route::get('/preview/{slug}',                  [PropertiesController::class, 'preview'])->name('public-part.properties.preview');
    });
});

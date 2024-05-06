<?php

use App\Http\Controllers\PublicPart\HomeController;
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
});

<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Users\UsersController;
use App\Http\Controllers\PublicPart\FaqController;
use App\Http\Controllers\PublicPart\HomeController;
use App\Http\Controllers\PublicPart\PropertiesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicPart\AuthController;
use App\Http\Controllers\PublicPart\ContactUsController;
use App\Http\Controllers\Admin\Faq\FaqController as AdminFaqController;

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

    /**
     * Auth
     */
    Route::prefix('/auth')->group(function (){
        Route::get('/',                                [AuthController::class, 'auth'])->name('public-part.auth');
        Route::post('/authenticate',                   [AuthController::class, 'authenticate'])->name('public-part.auth.authenticate');

        Route::get('/logout',                          [AuthController::class, 'logout'])->name('public-part.logout');
    });

    Route::prefix('/contact-us')->group(function (){
        Route::get('/',                                [ContactUsController::class, 'index'])->name('public.part.contact-us');
    });

    /**
     * FAQ
     */
    Route::prefix('/faq')->group(function (){
        Route::get('/',                                 [FaqController::class, 'index'])->name('public-part.faq');
    });
});

/**
 *  Admin routes
 */

Route::prefix('system')->group(function () {
    Route::get('/dashboard',                                   [DashboardController::class, 'dashboard'])->name('system.dashboard');

    /* Users routes */
    Route::prefix('users')->group(function () {
        Route::get('/',                          [UsersController::class, 'index'])->name('system.users.index');
        Route::get ('/create',                   [UsersController::class, 'create'])->name('system.users.create');
        Route::post('/save',                     [UsersController::class, 'save'])->name('system.users.save');
        Route::get ('/preview/{username}',       [UsersController::class, 'preview'])->name('system.users.preview');
        Route::get ('/edit/{username}',          [UsersController::class, 'edit'])->name('system.users.edit');
        Route::post('/update',                   [UsersController::class, 'update'])->name('system.users.update');
        Route::get ('/delete/{username}',        [UsersController::class, 'delete'])->name('system.users.delete');
    });

    /* FAQ routes */
    Route::prefix('faq')->group(function () {
        Route::get('/',                           [AdminFaqController::class, 'index'])->name('system.faq.index');
        Route::get('/create',                     [AdminFaqController::class, 'create'])->name('system.faq.create');
        Route::post('/save',                      [AdminFaqController::class, 'save'])->name('system.faq.save');
        Route::get ('/preview/{question}',        [AdminFaqController::class, 'preview'])->name('system.faq.preview');
        Route::get ('/edit/{question}',           [AdminFaqController::class, 'edit'])->name('system.faq.edit');
        Route::post('/update',                    [AdminFaqController::class, 'update'])->name('system.faq.update');
        Route::get ('/delete/{question}',         [AdminFaqController::class, 'delete'])->name('system.faq.delete');
    });
});

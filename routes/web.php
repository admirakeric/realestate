<?php

use App\Http\Controllers\Admin\AboutUs\AboutUsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Estates\EstatesController;
use App\Http\Controllers\Admin\Users\UsersController;
use App\Http\Controllers\PublicPart\FaqController;
use App\Http\Controllers\PublicPart\HomeController;
use App\Http\Controllers\PublicPart\PropertiesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicPart\AuthController;
use App\Http\Controllers\PublicPart\ContactUsController;
use App\Http\Controllers\Admin\Faq\FaqController as AdminFaqController;
use App\Http\Controllers\Admin\Keywords\KeywordsController;

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

    /**
     * About Us page
     */
    Route::prefix('/about_us')->group(function (){
        Route::get('/',                                 [AboutUsController::class, 'index'])->name('public-part.about-us');

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

    /**
     *  Estates routes
     */
    Route::prefix('estates')->group(function () {
        Route::get('/',                          [EstatesController::class, 'index'])->name('system.estates.index');
        Route::get ('/create',                   [EstatesController::class, 'create'])->name('system.estates.create');
        Route::post('/save',                     [EstatesController::class, 'save'])->name('system.estates.save');
        Route::get ('/preview/{slug}',           [EstatesController::class, 'preview'])->name('system.estates.preview');
        Route::get ('/edit/{slug}',              [EstatesController::class, 'edit'])->name('system.estates.edit');
        Route::post('/update',                   [EstatesController::class, 'update'])->name('system.estates.update');
        Route::get ('/delete/{slug}',            [EstatesController::class, 'delete'])->name('system.estates.delete');
    });

    /* FAQ routes */
    Route::prefix('faq')->group(function () {
        Route::get('/',                           [AdminFaqController::class, 'index'])->name('system.faq.index');
        Route::get('/create',                     [AdminFaqController::class, 'create'])->name('system.faq.create');
        Route::post('/save',                      [AdminFaqController::class, 'save'])->name('system.faq.save');
        Route::get ('/preview/{id}',        [AdminFaqController::class, 'preview'])->name('system.faq.preview');
        Route::get ('/edit/{id}',           [AdminFaqController::class, 'edit'])->name('system.faq.edit');
        Route::post('/update',                    [AdminFaqController::class, 'update'])->name('system.faq.update');
        Route::get ('/delete/{id}',         [AdminFaqController::class, 'delete'])->name('system.faq.delete');
    });

    /*
    *  Keywords
    */
    Route::group(['prefix' => '/keywords'], function(){
        Route::get ('/',                                    [KeywordsController::class, 'index'])->name('system.settings.keywords');

        Route::get ('/preview-instances/{key}',             [KeywordsController::class, 'previewInstances'])->name('system.settings.keywords.preview-instances');
        Route::get ('/new-instance/{key}',                  [KeywordsController::class, 'newInstance'])->name('system.settings.keywords.new-instance');
        Route::post('/save-instance',                       [KeywordsController::class, 'saveInstance'])->name('system.settings.keywords.save-instance');
        Route::get ('/edit-instance/{id}',                  [KeywordsController::class, 'editInstance'])->name('system.settings.keywords.edit-instance');
        Route::post('/update-instance',                     [KeywordsController::class, 'updateInstance'])->name('system.settings.keywords.update-instance');
        Route::get ('/delete-instance/{id}',                [KeywordsController::class, 'deleteInstance'])->name('system.settings.keywords.delete-instance');
    });
    /*
    *  About us page
    */
    Route::group(['prefix' => '/about-us'], function (){
       Route::get('/',                                      [AboutUsController::class, 'index'])->name('system.about-us.index');
       Route::get('/create',                                [AboutUsController::class, 'create'])->name('system.about-us.create');
       Route::post('/save',                                 [AboutUsController::class, 'save'])->name('system.about-us.save');
       Route::get ('/preview/{id}',                         [AboutUsController::class, 'preview'])->name('system.about-us.preview');
       Route::get ('/edit/{id}',                            [AboutUsController::class, 'edit'])->name('system.about-us.edit');
       Route::post('/update',                               [AboutUsController::class, 'update'])->name('system.about-us.update');
       Route::get ('/delete/{id}',                          [AboutUsController::class, 'delete'])->name('system.about-us.delete');
    });
});

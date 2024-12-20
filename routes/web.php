<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Estates\EstatesController;
use App\Http\Controllers\Admin\Other\SliderController;
use App\Http\Controllers\Admin\SinglePages\SinglePagesController;
use App\Http\Controllers\Admin\Users\UsersController;
use App\Http\Controllers\Admin\Blog\BlogController as AdminBlogController;
use App\Http\Controllers\PublicPart\BlogController;
use App\Http\Controllers\PublicPart\FaqController;
use App\Http\Controllers\PublicPart\HomeController;
use App\Http\Controllers\PublicPart\PropertiesController;
use App\Http\Middleware\PublicMiddleware;
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

Route::prefix('')->middleware('public-middleware')->group(function () {
    Route::get('/',                    [HomeController::class, 'home'])->name('public-part.home');

    /**
     *  Properties controller
     */
    Route::prefix('/properties')->group(function () {
        Route::get ('/',                                [PropertiesController::class, 'index'])->name('public-part.properties');
        Route::get ('/preview/{slug}',                  [PropertiesController::class, 'preview'])->name('public-part.properties.preview');

        Route::post('/schedule-visit',                  [PropertiesController::class, 'scheduleVisit'])->name('public-part.schedule-visit');

        Route::post('/add-remove-from-wishlist',        [PropertiesController::class, 'addRemoveFromWishList'])->name('public-part.add-remove-from-wishlist');
    });

    /**
     * Blog
     */
    Route::prefix('/blog')->group(function (){
       Route::get('/',                                   [BlogController::class, 'index'])->name('public-part.blog.index');
       Route::get('/search-by-category/{category}',      [BlogController::class, 'index'])->name('public-part.blog.search-by-category');
       Route::get('/preview/{slug}',                     [BlogController::class, 'preview'])->name('public-part.blog.preview');
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
        Route::get ('/',                                [ContactUsController::class, 'index'])->name('public.part.contact-us');

        /* Send message*/
        Route::post('/send-us-message',                 [ContactUsController::class, 'sendUsMessage'])->name('public.part.send-us-message');
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
    //Route::prefix('/about_us')->group(function (){
    //    Route::get('/',                                 [AboutUsController::class, 'index'])->name('public-part.about-us');
    //});

    /**
     *  Single pages
     */
    Route::prefix('/pages')->group(function (){
        Route::get('/privacy-policy',                            [HomeController::class, 'privacyPolicy'])->name('public-part.pages.privacy-policy');
        Route::get('/terms-and-conditions',                      [HomeController::class, 'termsAndConditions'])->name('public-part.pages.terms-and-conditions');
        Route::get('/cookies',                                   [HomeController::class, 'cookies'])->name('public-part.pages.cookies');
        Route::get('/about-us',                                  [HomeController::class, 'aboutUs'])->name('public-part.pages.about-us');
        Route::get('/business-terms',                            [HomeController::class, 'businessTerms'])->name('public-part.pages.business-terms');

        Route::get('/preview/{id}',                              [HomeController::class, 'preview'])->name('public-part.pages.preview');
    });
});

/**
 *  Admin routes
 */

Route::prefix('system')->middleware('auth-middleware')->group(function () {
    Route::get ('/dashboard',                                   [DashboardController::class, 'dashboard'])->name('system.dashboard');

    /** Calendar routes */
    Route::get ('/calendar',                                    [DashboardController::class, 'calendar'])->name('system.calendar');
    Route::post('/calendar-month-content',                      [DashboardController::class, 'monthContent'])->name('system.month-content');
    Route::post('/calendar-day-content',                        [DashboardController::class, 'dayContent'])->name('system.day-content');

    /* Users routes */
    Route::prefix('users')->group(function () {
        Route::get('/',                          [UsersController::class, 'index'])->name('system.users.index');
        Route::get ('/create',                   [UsersController::class, 'create'])->name('system.users.create');
        Route::post('/save',                     [UsersController::class, 'save'])->name('system.users.save');
        Route::get ('/preview/{username}',       [UsersController::class, 'preview'])->name('system.users.preview');
        Route::get ('/edit/{username}',          [UsersController::class, 'edit'])->name('system.users.edit');
        Route::post('/update',                   [UsersController::class, 'update'])->name('system.users.update');
        Route::get ('/delete/{username}',        [UsersController::class, 'delete'])->name('system.users.delete');

        Route::post('/update-image',             [UsersController::class, 'updateImage'])->name('system.users.update-image');
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

        /**
         *  QR Code generator: Generate QR codes for estates
         */
        Route::get ('/generate-qr-code/{slug}',            [EstatesController::class, 'generateQRCode'])->name('system.estates.generate-qr-code');

        Route::prefix('images')->group(function () {
            Route::get ('/insert-new-image/{slug}',                      [EstatesController::class, 'insertNewImage'])->name('system.estates.insert-new-image');
            Route::post('/save-new-image',                               [EstatesController::class, 'saveNewImage'])->name('system.estates.save-new-image');
            Route::get ('/delete-new-image/{id}',                        [EstatesController::class, 'deleteNewImage'])->name('system.estates.delete-new-image');

            Route::post('/update-main-image',                            [EstatesController::class, 'updateMainImage'])->name('system.estates.update-main-image');
        });

        Route::prefix('google-map')->group(function () {
            Route::get ('/edit-location/{slug}',                         [EstatesController::class, 'editLocation'])->name('system.estates.google-map.edit-location');
            Route::post('/update-location',                              [EstatesController::class, 'updateLocation'])->name('system.estates.google-map.update-location');
        });

        Route::prefix('features')->group(function () {
            Route::get ('/edit-features/{slug}',                         [EstatesController::class, 'editFeatures'])->name('system.estates.google-map.edit-features');
            Route::post('/update-features',                              [EstatesController::class, 'updateFeatures'])->name('system.estates.google-map.update-features');
        });
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
    *  Single pages
    */
    Route::group(['prefix' => '/single-pages'], function (){
       Route::get('/',                                      [SinglePagesController::class, 'index'])->name('system.single-pages.index');
       Route::get('/create',                                [SinglePagesController::class, 'create'])->name('system.single-pages.create');
       Route::post('/save',                                 [SinglePagesController::class, 'save'])->name('system.single-pages.save');
       Route::get ('/preview/{id}',                         [SinglePagesController::class, 'preview'])->name('system.single-pages.preview');
       Route::get ('/edit/{id}',                            [SinglePagesController::class, 'edit'])->name('system.single-pages.edit');
       Route::post('/update',                               [SinglePagesController::class, 'update'])->name('system.single-pages.update');
       Route::get ('/delete/{id}',                          [SinglePagesController::class, 'delete'])->name('system.single-pages.delete');

        Route::post('/update-image',                        [SinglePagesController::class, 'updateImage'])->name('system.single-pages.update-image');
    });

    /*
     *  Blog section
     */
    Route::group(['prefix' => '/blog'], function (){
        Route::get('/',                                      [AdminBlogController::class, 'index'])->name('system.blog.index');
        Route::get('/create',                                [AdminBlogController::class, 'create'])->name('system.blog.create');
        Route::post('/save',                                 [AdminBlogController::class, 'save'])->name('system.blog.save');
        Route::get ('/preview/{id}',                         [AdminBlogController::class, 'preview'])->name('system.blog.preview');
        Route::get ('/edit/{id}',                            [AdminBlogController::class, 'edit'])->name('system.blog.edit');
        Route::post('/update',                               [AdminBlogController::class, 'update'])->name('system.blog.update');
        Route::get ('/delete/{id}',                          [AdminBlogController::class, 'delete'])->name('system.blog.delete');

        Route::post('/update-image',                        [AdminBlogController::class, 'updateImage'])->name('system.blog.update-image');
    });

    /*
     *  Slider
     */
    Route::group(['prefix' => '/slider'], function (){
        Route::get('/',                                      [SliderController::class, 'index'])->name('system.slider.index');
        Route::get('/create',                                [SliderController::class, 'create'])->name('system.slider.create');
        Route::post('/save',                                 [SliderController::class, 'save'])->name('system.slider.save');
        Route::get ('/delete/{id}',                          [SliderController::class, 'delete'])->name('system.slider.delete');
    });
});

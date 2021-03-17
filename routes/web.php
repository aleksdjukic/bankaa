<?php

use App\Http\Controllers\NewsletterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\StraniceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryNewsController;
use App\Http\Controllers\CategoryPropertyController;

Route::redirect('/nova-banka', '/sr');

Auth::routes();
//Auth::routes(['/register' => false]);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('newsletters', [DashboardController::class, 'newsletter'])->name('newsletter');
    Route::delete('newsletters-destroy/{newsLetter}', [NewsletterController::class, 'destroy'])->name('newsletters-destroy');
    Route::get('newsletters-pretraga', [NewsletterController::class, 'search'])->name('newsletters-pretraga');
    Route::get('menu', [MenuController::class, 'index'])->name('menu-dvelop');
    Route::post('ckeditor/upload', [DashboardController::class, 'ckeditor'])->name('ckeditor');
    Route::resource('news', NewsController::class)->middleware('optimizeImages');
    Route::get('visibility-news', [NewsController::class, 'visibility'])->name('visibility-news');
    Route::get('novosti-pretraga', [NewsController::class, 'search'])->name('novosti-pretraga');

    Route::resource('pages', PageController::class);
    Route::get('templates', [PageController::class, 'template'])->name('page-template');
    Route::get('visibility-pages', [PageController::class, 'visibility'])->name('visibility-pages');
    Route::get('stranice-pretraga', [PageController::class, 'search'])->name('stranice-pretraga');

    Route::resource('stranice', StraniceController::class);
    Route::get('templates-stranice', [StraniceController::class, 'template'])->name('stranice-template');
    Route::get('visibility-stranice', [StraniceController::class, 'visibility'])->name('visibility-stranice');
    Route::get('page-pretraga', [StraniceController::class, 'search'])->name('page-pretraga');

    Route::resource('properties', PropertyController::class)->middleware('optimizeImages');;
    Route::get('visibility-property', [PropertyController::class, 'visibility'])->name('visibility-property');
    Route::get('imovina-pretraga', [PropertyController::class, 'search'])->name('imovina-pretraga');
    Route::resource('users', UserController::class);
    Route::get('korisnici-pretraga', [UserController::class, 'search'])->name('korisnici-pretraga');
    Route::resource('category-properties', CategoryPropertyController::class);
    Route::resource('category-news', CategoryNewsController::class);
});

Route::post('newsletter-store', [NewsletterController::class, 'store'])->name('newsletter-store');

Route::group(['prefix' => '{language}'], function(){
    Route::get('/', [IndexController::class, 'index'])->name('home');
    Route::get('exchange-rate', [IndexController::class, 'exchange'])->name('exchange');

    Route::get('all-news', [IndexController::class, 'allNews'])->name('all-news');
    Route::get('one-news', [IndexController::class, 'oneNews'])->name('one-news');
    Route::get('table', [IndexController::class, 'table'])->name('table');

    Route::get('menu', [IndexController::class, 'menu'])->name('menu');
    Route::get('page/{slug}', [PageController::class, 'getPage'])->name('page');
    Route::get('stranica/{slug}', [StraniceController::class, 'getPage'])->name('stranica');
    Route::post('newsletter-store', [NewsletterController::class, 'store'])->name('newsletter-store');

});



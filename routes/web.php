<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\HomeController;

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


    Route::get('/', [HomeController::class, 'index']);
    Route::get('/blogs', [HomeController::class, 'blogs']);
    Route::get('/blog/{slug}', [HomeController::class, 'single_blog']);
    Route::post('/store_comment/{id}', [HomeController::class, 'store_comment'])->name('storeComment');

    Route::get('/contact-us', [HomeController::class, 'contactus']);
    Route::post('/store_contact', [HomeController::class, 'store_contact'])->name('storeContact');

    Route::get('/about-us', [HomeController::class, 'aboutus']);




<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\SettingsController;
use App\Http\Controllers\Dashboard\AdminsController;
use App\Http\Controllers\Dashboard\RolesController;
use App\Http\Controllers\Dashboard\CategorysController;
use App\Http\Controllers\Dashboard\BlogsController;
use App\Http\Controllers\Dashboard\ContactUsController;
use App\Http\Controllers\Dashboard\TagsController;
use App\Http\Controllers\Dashboard\SocialsController;

Route::group(['prefix' => 'admin', 'middleware' => 'lang'], function () {

    Route::get('/login', [HomeController::class, 'loginPage'])->middleware('adminGuest');
    Route::post('/signin', [HomeController::class, 'signin'])->name('admin.login')->middleware('adminGuest');

    Route::group([ 'middleware' => 'IsAdmin'], function () {
        Route::get('/adminLogout', [HomeController::class, 'adminLogout']);
        Route::get('/change-language/{lang}', [HomeController::class,'changeLang']);

        Route::get('/dashboard', [HomeController::class, 'index']);

        Route::get('/settings', [SettingsController::class, 'index']);
        Route::put('/settings/update', [SettingsController::class, 'update'])->name('updateSetting');

        Route::resource('/roles', RolesController::class);
        Route::resource('/admins', AdminsController::class);
        Route::resource('/tags', TagsController::class);
        Route::resource('/categorys', CategorysController::class);
        Route::resource('/socials', SocialsController::class);
        Route::resource('/blogs', BlogsController::class);
        Route::get('/contacts', [ContactUsController::class,'index'])->name('contacts.index');
        Route::get('/contacts/{contacts}', [ContactUsController::class,'show'])->name('contacts.show');
        Route::delete('/contacts/{contacts}/delete', [ContactUsController::class,'destroy'])->name('contacts.destroy');

    });
});
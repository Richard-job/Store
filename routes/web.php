<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {

    Route::get('/profile', 'ProfileController@edit')->name('profile');
    Route::post('/profile/update', 'ProfileController@update')->name('profile.update');
    Route::post('/profile/update/password', 'ProfileController@passwordUpdate')->name('password.update');

    Route::middleware(['admin'])->group(function () {
        Route::prefix('admin')->group(function () {

            Route::resource('user', 'UserController');
            Route::resource('category', 'CategoryController');
            Route::resource('category.subcategory', 'CategorySubCategoryController')->shallow();

        });
    });
});

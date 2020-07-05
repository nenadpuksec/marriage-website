<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;





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

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index');

    Route::group(['middleware' => ['admin']], function () {

        Route::get('/admin_home', 'HomeController@admin_index');
    });

});
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile/{user}', 'ProfileController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfileController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfileController@update')->name('profile.update');

Route::get('/profile/gallery/create', 'GalleryController@create')->name('gallery.create');
Route::post('/profile/gallery', 'GalleryController@store')->name('gallery.store');


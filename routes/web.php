<?php

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

Auth::routes();
/*Route::get('/', function () {
    return view('app');
})->name('done');*/
Route::get('/', 'ProductController@index')->name('home');
Route::get('/product/{id}', 'ProductController@show')->where('id','[0-9]+')->name('details');
Route::get('/register', 'RegistrationController@create')->name('reg');
Route::post('/register', 'RegistrationController@store');
Route::get('/login', 'LoginController@create')->name('login');
Route::post('/login', 'LoginController@store')->name('doLogin');
Route::get('/logout', 'LoginController@destroy')->name('logout');
Route::get('/category/{id}','CategoryController@index')->name('category');
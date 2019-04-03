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

;
/*Route::get('/', function () {
    return view('app');
})->name('done');*/

Route::get('/', 'ProductController@index')->name('home');
Route::get('/search','ProductController@search')->name('search');
Route::get('/product/{id}', 'ProductController@show')->where('id','[0-9]+')->name('details');
Route::post('/product/{manufacturer}', 'ManufacturerController@index')->where('manufacturer','[a-z]+')->name('manufacturer');
Route::get('/products', 'ProductController@grid')->name('grid');
Route::get('/register', 'RegistrationController@create')->name('reg');
Route::post('/register', 'RegistrationController@store');
Route::get('/login', 'LoginController@create')->name('login');
Route::post('/login', 'LoginController@store')->name('doLogin');
Route::get('/logout', 'LoginController@destroy')->name('logout');
Route::get('/category/{id}','CategoryController@index')->name('category');
Route::post('/addtocart', 'CartController@add')->name('addtocart');
Route::get('/cart','CartController@index')->name('showcart');
Route::post('/cart','CartController@index')->name('showcart');
Route::get('/deletefromcart','CartController@destroy')->name('deletefromcart');
Route::post('/dashboard/createcat','AdminController@store')->name('createcat');
Route::get('/dashboard','AdminController@index')->name('dashboard');
Route::post('/checkout','CartController@store')->name('saveorder');
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
use Illuminate\Http\Request;
/*Route::get('/', function () {
    return view('app');
})->name('home');*/

/*Route::post('/test', function (Request $request) {
    return view('test',['request'=>$request]);
});*/
Auth::routes();
/*Route::get('/', function () {
    return view('app');
})->name('done');*/
Route::get('/', 'ProductController@index')->name('home');
Route::get('/register', 'RegistrationController@create')->name('reg');
Route::post('/register', 'RegistrationController@store');
Route::get('/login', 'LoginController@create')->name('login');
Route::post('/login', 'LoginController@store')->name('doLogin');
Route::get('/logout', 'LoginController@destroy')->name('logout');
Route::get('/category/{title}','CategoryController@index')->name('category');
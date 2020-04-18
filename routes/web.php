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
    return view('signin');
})->name('login');

Route::get('/signup', function () {
    return view('signup');
});

Route::group(['middleware' => ['auth']], function() {
    Route::group(['prefix' => 'product'], function() {
        Route::post('/', 'ProductController@create');
        Route::put('/{id}', 'ProductController@update');
        Route::delete('/{id}', 'ProductController@delete');
        Route::post('down/{id}', 'ProductController@downProduct');
    });

    Route::get('/logout', 'AuthController@logout');

    Route::get('/home', 'ProductController@getAll');
});

Route::post('/signin', 'AuthController@authenticate');

Route::group(['prefix' => 'user'], function () {
    Route::post('/', 'UserController@create');
});

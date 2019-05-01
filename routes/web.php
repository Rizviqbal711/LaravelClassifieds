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
// Landing Pages

Route::get('/', 'PagesController@home');

Route::get('/about', 'PagesController@about');

Route::get('/contact', 'PagesController@contact');

// App Pages

Route::resource('items', 'ItemController');

Route::resource('categories', 'CategoryController');


// Route::get('/items', 'ItemController@index');

// Route::get('/items/create', 'ItemController@create');

// Route::post('/items', 'ItemController@store');

// Route::get('/items/{item}', 'ItemController@show');

// Route::get('/items/{item}/edit', 'ItemController@edit');

// Route::patch('/items/{item}', 'ItemController@update');

// Route::delete('/items/{item}', 'ItemController@destroy');







Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
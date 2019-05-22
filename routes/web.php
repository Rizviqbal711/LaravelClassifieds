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

Route::get('list', 'ListController@create');

Route::get('search', 'ItemController@search');





// Login

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('auth/facebook', 'Auth\FacebookloginController@redirectToFacebook');

Route::get('auth/facebook/callback', 'Auth\FacebookloginController@handleFacebookCallback');

// Rewards

Route::patch('update/{user}', 'UserController@update');
Route::get('myitems', 'ItemController@useritems');
Route::get('profile', 'UserController@myprofile');
Route::get('rewards', 'UserController@rewards');

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//routes for posts
Route::get('/posts', 'PostsController@index');
Route::get('/posts/create', 'PostsController@create');
Route::get('/posts/store', 'PostsController@store');
Route::get('/posts/update', 'PostsController@update');
Route::get('/posts/delete', 'PostsController@destroy');

//users routes
Route::get('/users', 'UserController@index');
Route::get('/users/create', 'PostsController@create');
Route::get('/users/store', 'PostsController@store');
Route::get('/users/update', 'PostsController@update');
Route::get('/users/delete', 'PostsController@destroy');

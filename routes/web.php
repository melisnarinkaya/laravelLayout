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

Route::get('/','LayoutsController@index')->name('home');
//Route::get('/iletisim','LayoutsController@iletisim');
Route::get('/posts/create','LayoutsController@create');
Route::post('/posts','LayoutsController@store');
Route::get('/posts/{post}','LayoutsController@show');

Route::get('/posts/tags/{tag}','TagsController@index');

Route::post('/posts/{post}/comments','CommentsController@store');

Route::get('/register','RegistrationController@create');
Route::post('/register','RegistrationController@store');

Route::get('/login','SessionsController@create');
Route::post('/login','SessionsController@store');
Route::get('/logout','SessionsController@destroy');

//Route::get('/home', 'HomeController@index');

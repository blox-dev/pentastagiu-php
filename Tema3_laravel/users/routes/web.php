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

Route::get('/posts/{post}', 'PostController@show');

Route::get('/books','BookController@index');
Route::get('/books/create','BookController@create');
Route::post('/books/store','BookController@store');
Route::get('/books/edit','BookController@edit');
Route::post('/books/update','BookController@update');
Route::get('/books/delete','BookController@delete');

Route::get('/authors','AuthorController@index');
Route::get('/authors/create','AuthorController@create');
Route::post('/authors/store','AuthorController@store');
Route::get('/authors/delete','AuthorController@delete');

Route::get('/publishers','PublisherController@index');
Route::get('/publishers/create','PublisherController@create');
Route::post('/publishers/store','PublisherController@store');
Route::get('/publishers/delete','PublisherController@delete');

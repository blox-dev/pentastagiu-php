<?php

use Illuminate\Support\Facades\Auth;
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
    return redirect('/home');
});

Route::get('/books','BookController@index');
Route::get('/books/create','BookController@create');
Route::post('/books/store','BookController@store');
Route::get('/books/edit','BookController@edit');
Route::post('/books/update','BookController@update');
Route::get('/books/delete','BookController@delete');

Route::get('/authors','AuthorController@index');
Route::get('/authors/create','AuthorController@create');
Route::post('/authors/store','AuthorController@store');
Route::get('/authors/edit','AuthorController@edit');
Route::post('/authors/update','AuthorController@update');
Route::get('/authors/delete','AuthorController@delete');

Route::get('/publishers','PublisherController@index');
Route::get('/publishers/create','PublisherController@create');
Route::post('/publishers/store','PublisherController@store');
Route::get('/publishers/edit','PublisherController@edit');
Route::post('/publishers/update','PublisherController@update');
Route::get('/publishers/delete','PublisherController@delete');

Route::get('/users','UserController@index');
Route::post('/user/store','UserController@store');
Route::get('/user','UserController@show');
Route::get('/user/{book_id}', 'UserController@viewBook');


Route::get('/transactions','TransactionController@index');
Route::post('/transactions/store','TransactionController@store');
Route::post('/transactions/delete','TransactionController@delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

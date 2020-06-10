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

Auth::routes();

Route::get('/authors-list', 'HomeController@auhthorsList');
Route::get('/books-list', 'HomeController@booksList');
Route::get('/author/{id}', 'HomeController@booksList');

Route::get('/my-list', 'AdminController@getList');

Route::post('/add-book', 'AdminController@createBook');
Route::post('/edit-book', 'AdminController@editBook');
Route::post('/delete-book', 'AdminController@deleteBook');
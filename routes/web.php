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

Route::get('/my-list', 'AdminController@getList')->middleware('auth');

Route::post('/add-book', 'AdminController@createBook')->middleware('auth');
Route::post('/edit-book', 'AdminController@editBook')->middleware('auth');
Route::post('/delete-book', 'AdminController@deleteBook')->middleware('auth');
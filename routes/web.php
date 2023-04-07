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
    return view('welcome');
});

Route::get('/', 'WelcomeController@index')->name('welcome.index')->middleware('auth');;

Auth::routes();

Route::get('/home', 'BookController@index')->name('book.index')->middleware('auth');
Route::post('/home', 'BookController@store')->name('book.store')->middleware('auth');
Route::get('/home/create', 'BookController@create')->name('book.create')->middleware('auth');
Route::get('/home/{book}', 'BookController@show')->name('book.show')->middleware('auth');
Route::get('/home/{book}/edit', 'BookController@edit')->name('book.edit')->middleware('auth');
Route::put('/home/{id}', 'BookController@update')->name('book.update')->middleware('auth');
Route::delete('/home/{book}', 'BookController@destroy')->name('book.destroy')->middleware('auth');


// Route::middleware('auth')->group(function () {
//     Route::resource('book', 'BookController')->parameters(['book' => 'id'])->except(['show']);
//     Route::get('book/{book}', 'BookController@show')->name('book.show');
// });

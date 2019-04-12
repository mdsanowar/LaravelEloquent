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
Route::get('post', 'PostController@index')->name('all.post');
Route::post('add-post', 'PostController@store')->name('insert.post');
Route::get('/edit-post/{id}', 'PostController@edit');
Route::post('/update-post/{id}', 'PostController@update');
Route::get('/delete/{id}','PostController@destroy');

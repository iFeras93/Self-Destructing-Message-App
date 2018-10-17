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
Route::get('/add_new_message', 'MessageController@add_new_message_show_form');
Route::post('/add_new_message', 'MessageController@add_new_message_post_form');
Route::get('/message/{hash}', 'MessageController@read_message');
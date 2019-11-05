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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/','UserticketController@index')->name('index');
Route::get('/','UserticketController@create')->name('usesrticket.create');
Route::post('/','UserticketController@store')->name('usesrticket.store');

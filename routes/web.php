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

Route::get('/', 'ParosController@index');
Route::get('/paros/{id}', 'ParosController@edit');
Route::put('/paros/{id}', 'ParosController@update');
Route::get('/paros/{id}/show', 'ParosController@show');
Route::get('/prueba', 'ParosController@getData')->name('datatable');



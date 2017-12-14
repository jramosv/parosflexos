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

Route::get('/paros', 'ParosController@index');
Route::get('/paros/{id}', 'ParosController@show');
Route::get('/paros_lista', 'ParosController@listado')->name('listado');
Route::get('/paros/{id}/edit', 'ParosController@edit');
Route::put('/paros/{id}', 'ParosController@update');
Route::get('/prueba', 'ParosController@prueba')->name('prueba');



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

Route::get('/', 'ProductController@listar')->name('productos.listar');
Route::get('/eliminar/{id}', 'ProductController@eliminar')->name('productos.eliminar');
Route::get('/editar/{id}', 'ProductController@editar')->name('productos.editar');
Route::post('/modificar/{id}', 'ProductController@modificar')->name('productos.modificar');
Route::post('/buscar', 'ProductController@buscar')->name('productos.buscar');
Route::get('/mostrar/{id}', 'ProductController@mostrar')->name('productos.mostrar');

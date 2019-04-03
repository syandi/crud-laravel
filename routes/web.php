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
Route::get('/barang', 'BarangController@index');
Route::post('/barang/create', 'BarangController@create');
Route::get('barang/{id}/edit', 'BarangController@edit');
Route::post('barang/{id}/update', 'BarangController@update');
Route::get('barang/{id}/delete', 'BarangController@delete');
Route::post('barang/search', 'BarangController@search');
Route::get('/table', 'BarangController@table');

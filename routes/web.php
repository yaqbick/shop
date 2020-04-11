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

Route::get('/', function () {
    return view('shop.index');
});
Auth::routes();
Route::resource('/panel/products', 'ProductController');
Route::get('/list', 'ProductController@list');
Route::get('/import', 'ProductController@importExportView');
Route::get('export', 'ProductController@export')->name('export');
Route::post('import', 'ProductController@import')->name('import');

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
Route::get('/', 'ShopController@index')->name('shop');
Route::get('/category/{categoryId}', 'ShopController@category');
Route::post('/', 'CartController@add');
Route::post('/remove', 'CartController@remove');

Route::resource('/panel/products', 'BookController');
Route::get('/list', 'BookController@list');
Route::get('/import', 'BookController@importExportView');
Route::get('export', 'BookController@export')->name('export');
Route::post('import', 'BookController@import')->name('import');
Route::resource('/cart', 'CartController')->middleware('auth');
Route::post('order', 'OrderController@store')->middleware('auth');
Route::get('order', 'OrderController@index')->middleware('auth');
Route::put('order/{id}', 'OrderController@edit');
Route::delete('order/{id}', 'OrderController@destroy');
Route::get('order/{orderId}/items', 'OrderItemController@index')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cart, @CartController@index');

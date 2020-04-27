<?php

use Illuminate\Support\Facades\Route;
use App\Product;
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

        $products =  Product::all();
        return view('shop.index', compact('products'));
});
Auth::routes();
Route::resource('/panel/products', 'ProductController');
Route::get('/list', 'ProductController@list');
Route::get('/import', 'ProductController@importExportView');
Route::get('export', 'ProductController@export')->name('export');
Route::post('import', 'ProductController@import')->name('import');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cart', function()
{
        $cart = Session::get('cart');
        $cartItems = $cart->getItems();
        return view('cart.cart', compact('cartItems'));
});

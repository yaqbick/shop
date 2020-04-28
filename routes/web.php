<?php

use Illuminate\Support\Facades\Route;
use App\Product;
use App\Cart;
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

        if(Session::get('cart')==null)
        {
           
                $cart = new Cart();
                Session::put('cart', $cart);
                session(['cart' => $cart]);

        }

        $products =  Product::all();
        // Session::flush();
        return view('shop.index', compact('products'));
})->name('shop');
Route::post('/', 'CartController@add');
Route::post('/aaaa', 'CartController@remove');
Auth::routes();
Route::resource('/panel/products', 'ProductController');
Route::get('/list', 'ProductController@list');
Route::get('/import', 'ProductController@importExportView');
Route::get('export', 'ProductController@export')->name('export');
Route::post('import', 'ProductController@import')->name('import');
Route::resource('/cart', 'CartController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cart', function()
{
        $cart = Session::get('cart');
        if($cart)
        {
                $cartItems = $cart->getItems();
                return view('cart.cart', compact('cartItems','cart'));
        }
});

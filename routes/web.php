<?php

use App\Book;
use App\Cart;
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
    if (Session::get('cart') == null) {
        $cart = new Cart();
        Session::put('cart', $cart);
        session(['cart' => $cart]);
    }

    $products = Book::all();
    $cartItems = Session::get('cart');

    return view('shop.index', compact('products', 'cartItems'));
})->name('shop');
Route::post('/', 'CartController@add');
Route::post('/aaaa', 'CartController@remove');
Auth::routes();
Route::resource('/panel/products', 'BookController');
Route::get('/list', 'BookController@list');
Route::get('/import', 'BookController@importExportView');
Route::get('export', 'BookController@export')->name('export');
Route::post('import', 'BookController@import')->name('import');
Route::resource('/cart', 'CartController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cart', function () {
    $cart = Session::get('cart');
    if ($cart) {
        $cartItems = $cart->getItems();

        return view('cart.cart', compact('cartItems', 'cart'));
    }
});

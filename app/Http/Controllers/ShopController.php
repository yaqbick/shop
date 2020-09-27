<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $products = Book::all();
        $cartItems = $request->session()->get('cart');

        return view('shop.index', compact('products', 'cartItems'));
    }

    public function category(Request $request, int $categoryId)
    {
        $cartItems = $request->session()->get('cart');
        $products = Book::all()->whereIn('category_id', $categoryId);

        return view('shop.index', compact('products', 'cartItems'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request, OrderService $orderService): RedirectResponse
    {
        // $request->validate([
        //     'product_name' => 'required|max:255|unique:products,name',
        //     'product_sku' => 'required|numeric|unique:products,SKU',
        //     'product_price' => 'required|numeric',
        // ]);
        $cart = $request->session()->get('cart');
        if ($cart && $cart->getItems()) {
            $orderService->saveOrder($cart);
            $request->session()->flush();

            return redirect('/order/create')->with('success', 'pomyślnie złożono zamówienie');
        } else {
            throw new Exception('koszyk jest pusty');
        }
    }
}

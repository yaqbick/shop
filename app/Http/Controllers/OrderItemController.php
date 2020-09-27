<?php

namespace App\Http\Controllers;

use App\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index($orderId)
    {
        $items = OrderItem::with(['book'])->where('order_id', $orderId)->get()->toArray();
        $order = $orderId;

        return view('orders.items', compact('order', 'items'));
    }

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
            $request->session()->forget('cart');

            return redirect()->back()->with('message', 'pomyślnie złożono zamówienie');
        } else {
            throw new Exception('koszyk jest pusty');
        }
    }

    public function edit($id)
    {
        $product = Product::find($id);

        return view('products.edit', compact('product', 'id'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $this->validate(request(), [
          'name' => 'required',
          'price' => 'required|numeric',
        ]);
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->save();

        return redirect('products')->with('success', 'Product has been updated');
    }
}

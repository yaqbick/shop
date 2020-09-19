<?php

namespace App\Services;

use App\Book;
use App\CartItem;
use Illuminate\Http\Request;

class CartService
{
    public function add(Request $request): void
    {
        $id = $request->get('productID');
        $cart = $request->session()->get('cart');
        $product = Book::find($id);
        if ($cart->getItemByID($id)) {
            $cartItem = $cart->getItemByID($id);
            $cartItem->increaseAmount(1);
            $cart->save();
        } else {
            $cartItem = new CartItem($product, 1);
            $cart->addItem($cartItem);
        }
    }

    public function remove(Request $request): void
    {
        $id = $request->get('productID');
        $cart = $request->session()->get('cart');
        if ($cart->getItemByID($id)) {
            $cartItem = $cart->getItemByID($id);
            $cartItem->decreaseAmount(1);
            if ($cartItem->getAmount() == 0) {
                // $this->destroy($request, $id);
            }

            $cart->save();
        }
    }

    public function destroy(Request $request, $id)
    {
        $cart = $request->session()->get('cart');
        $cartItem = $cart->getItemByID($id);
        $cart->removeItem($cartItem);
    }
}

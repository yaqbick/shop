<?php

namespace App\Services;

use App\Book;
use App\Cart;
use App\CartItem;
use Illuminate\Http\Request;

class CartService
{
    protected $cart;

    public function __construct(Request $request)
    {
        if ($request->session()->get('cart')) {
            $this->cart = $request->session()->get('cart');
        } else {
            $this->cart = new Cart();
            $request->session()->put('cart', $this->cart);
        }
    }

    public function getCart(): Cart
    {
        return $this->cart;
    }

    public function add(Request $request): void
    {
        $id = $request->get('productID');
        $product = Book::find($id);
        if ($this->cart->itemExists($id)) {
            $cartItem = $this->cart->getItemById($id);
            $cartItem->increaseAmount(1);
            $this->cart->save();
        } else {
            $cartItem = new CartItem($product, 1);
            $this->cart->addItem($cartItem);
        }
    }

    public function remove(Request $request): void
    {
        $id = $request->get('productID');
        if ($this->cart->itemExists($id)) {
            $cartItem = $this->cart->getItemById($id);
            $cartItem->decreaseAmount(1);
            if ($cartItem->getAmount() == 0) {
                // $this->destroy($request, $id);
            }
            $this->cart->save();
        }
    }

    public function destroy(Request $request, $id)
    {
        $cartItem = $this->cart->getItemByID($id);
        $this->cart->removeItem($cartItem);
    }
}

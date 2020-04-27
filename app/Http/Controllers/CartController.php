<?php

namespace App\Http\Controllers;

use App\Product;
use App\CartItem;
use Illuminate\Http\Request;


class CartController extends Controller
{
    public function add(Request $request,$id): void
    {
        $cart = $request->session()->get('cart');
        $product = Product::find($id);
        if ($cart->getItemByID($id)) 
        {
            $cartItem = $cart->getItemByID($id);
            $cartItem->increaseAmount($amount);
            $cart->save();
        }
        else
        {
            $cartItem = new CartItem($product, $amount);
            $cart->addItem($cartItem);
        }
    }

    public function remove(Request $request,$id):void
    {
        if ($request->session()->has('cart_'.$id)) 
        {
            $cartItem = $request->session()->get('cart_'.$id);
            $cartItem->decreaseAmount($amount);
            if($cartItem->getAmount()==0)
            {
                $request->session()->forget('cart_'.$id);
            }
        }
    }
}
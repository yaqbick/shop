<?php

namespace App\Http\Controllers;

use App\Product;
use App\CartItem;
use Illuminate\Http\Request;


class CartController extends Controller
{

    public function add(Request $request)
    {
        $id = $request->get('productID');
        $cart = $request->session()->get('cart');
        $product = Product::find($id);
        if ($cart->getItemByID($id)) 
        {
            $cartItem = $cart->getItemByID($id);
            $cartItem->increaseAmount(1);
            $cart->save();
            return redirect()->back();
        }
        else
        {
            $cartItem = new CartItem($product,1);
            $cart->addItem($cartItem);
        }
    }

    public function remove(Request $request)
    {
        $id = $request->get('productID');
        $cart = $request->session()->get('cart');
        if ($cart->getItemByID($id)) 
        {
            $cartItem = $cart->getItemByID($id);
            $cartItem->decreaseAmount(1);

            if($cartItem->getAmount()==0)
            {
                // $this->destroy($id);
            }

            $cart->save();
            return redirect()->back();
        }
    }

    public function show(Request $request)
    {
        //
    }

    public function destroy(Request $request, $id)
    {
        $cart = $request->session()->get('cart');
        $cartItem = $cart->getItemByID($id);
        $cart->removeItem($cartItem);
        return redirect('/cart')->with('success','Coin has been  deleted');
    }
}
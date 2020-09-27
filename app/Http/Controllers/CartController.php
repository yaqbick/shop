<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\CartService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $service;

    // public function __construct(CartService $service)
    // {
    //     $this->service = $service;
    // }
    public function index(Request $request, CartService $cartService)
    {
        $cart = $cartService->getCart();
        if ($cart) {
            $cartItems = $cart->getItems();
        } else {
            $cartItems = null;
        }

        return view('cart.cart', compact('cartItems', 'cart'));
    }

    public function add(Request $request, CartService $service): RedirectResponse
    {
        $service->add($request);

        return redirect()->back()->with('message', 'pomyślnie dodano do koszyka');
    }

    public function remove(Request $request, CartService $service): RedirectResponse
    {
        $service->remove($request);

        return redirect()->back();
    }

    public function show(Request $request)
    {
    }

    public function destroy(Request $request, $id, CartService $service): RedirectResponse
    {
        $service->destroy($request, $id);

        return redirect('/cart')->with('success', 'Coin has been  deleted');
    }
}

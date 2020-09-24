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

    public function add(Request $request, CartService $service): RedirectResponse
    {
        $service->add($request);

        return redirect()->back();
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

<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(CartService $service)
    {
        $this->service = $service;
    }

    public function add(Request $request)
    {
        $this->service->add($request);

        return redirect()->back();
    }

    public function remove(Request $request)
    {
        $this->service->remove($request);

        return redirect()->back();
    }

    public function show(Request $request)
    {
    }

    public function destroy(Request $request, $id)
    {
        $this->service->destroy($request, $id);

        return redirect('/cart')->with('success', 'Coin has been  deleted');
    }
}

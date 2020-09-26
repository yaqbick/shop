<?php

namespace App\Services;

use App\Order;
use App\OrderItem;

class OrderService
{
    public function saveOrder($cart): void
    {
        $user = auth()->user();
        var_dump($user);
        $order = [
            'user_id' => $user->id,
            'totals' => $cart->getTotals(),
        ];
        $orderId = Order::create($order)->id;
        $this->saveOrderItems($cart, $orderId);
    }

    public function saveOrderItems($cart, $orderId): void
    {
        foreach ($cart->getItems() as $cartItem) {
            $orderItem = [
            'order_id' => $orderId,
            'book_id' => $cartItem->getId(),
            'amount' => $cartItem->getAmount(),
            'totals' => $cartItem->getTotals(),
        ];
            OrderItem::create($orderItem);
        }
    }
}

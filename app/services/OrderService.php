<?php

namespace App\Services;

use App\Order;
use App\OrderItem;

class OrderService
{
    public function saveOrder($cart): void
    {
        $order = [
            'customer_id' => 1,
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

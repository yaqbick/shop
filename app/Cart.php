<?php

namespace App;

use Exception;

class Cart
{
    protected $items;

    public function __construct()
    {
        $this->items = [];
        // $this->amount = $amount;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function getItemById($id)
    {
        if (!array_key_exists('item_'.$id, $this->items)) {
            throw new Exception('item not found');
        }

        return $this->items['item_'.$id];
    }

    public function itemExists($id)
    {
        if (!array_key_exists('item_'.$id, $this->items)) {
            return false;
        }

        return true;
    }

    public function addItem(CartItem $item): void
    {
        $this->items['item_'.$item->getID()] = $item;
        $this->save();
    }

    public function removeItem(CartItem $item): void
    {
        unset($this->items['item_'.$item->getID()]);
        $this->save();
    }

    public function getTotals(): float
    {
        $totals = 0;
        $items = $this->items;
        foreach ($items as $key => $item) {
            $price = $item->getItem()->price;
            $amount = $item->getAmount();
            $totals += $price * $amount;
        }

        return $totals;
    }

    public function save(): void
    {
        session(['cart' => $this]);
    }
}

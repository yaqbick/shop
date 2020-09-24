<?php

namespace App;

use Exception;

class CartItem
{
    protected $id;
    protected $item;
    protected $amount;
    protected $totals;

    public function __construct(Book $item, int $amount = 1)
    {
        $this->id = $item->id;
        $this->item = $item;
        $this->amount = $amount;
        $this->totals = $item->price * $this->amount;
    }

    public function getID()
    {
        return $this->id;
    }

    public function getItem(): Book
    {
        return  $this->item;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function increaseAmount($amountToAdd): void
    {
        $this->amount = $this->amount + $amountToAdd;
        $this->calculateTotals();
    }

    public function decreaseAmount($amountToRemove): void
    {
        var_dump($this->amount);
        if ($amountToRemove <= $this->amount) {
            $this->amount -= $amountToRemove;
            $this->calculateTotals();
        } else {
            throw new Exception('cannot remove item');
        }
    }

    public function calculateTotals(): void
    {
        $this->totals = $this->item->price * $this->amount;
    }

    public function getTotals(): float
    {
        return $this->totals;
    }
}

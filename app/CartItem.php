<?php

namespace App;

class CartItem
{
    protected $id;
    protected $item;
    protected $amount;

    public function __construct(Book $item, int $amount = 1)
    {
        $this->id = $item->id;
        $this->item = $item;
        $this->amount = $amount;
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
    }

    public function decreaseAmount($amountToRemove): void
    {
        if ($amountToRemove > $this->amount) {
        }
        if ($this->amount == 1) {
        } else {
            $this->amount = $this->amount - $amountToRemove;
        }
    }
}

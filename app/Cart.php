<?php
namespace App;
use App\CartItem;

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

    public function getItemByID($id)
    {
        if(array_key_exists('item_'.$id,$this->items))
        {
            return $this->items['item_'.$id];
        }
        else
        {
            return false;
        }
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

    public function save(): void
    {
        session(['cart' => $this]);
    }
}
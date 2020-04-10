<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'SKU',
        'name',
        'short_description',
        'description',
        'price' ,
        'discount_price',
        'image',
        'url' ,
        'weight' ,
        'length' ,
        'width',
        'height',
        'categories',
        'tags',
        'type',
        'is_purchasable',
        'is_taxable',
        'tax',
        'qty'
      ];
}

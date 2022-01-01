<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    protected $fillable = [
        "user_id",
        "keyboard_id",
        "quantity"
    ];

    public $timestamps = false;
    protected $table = "shopping_cart";
}

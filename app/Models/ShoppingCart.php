<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    protected $fillable = [
        "user_id",
        "keyboard_id",
        "quantity"
    ];
    
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $table = "shopping_cart";
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        "user_id",
        "keyboard_name",
        "keyboard_image",
        "price_per_keyboard",
        "quantity",
        "date"
    ];

    protected $primaryKey = "id";
    public $timestamps = false;
    protected $table = "transaction";
}

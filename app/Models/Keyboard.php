<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keyboard extends Model
{
    protected $fillable = [
        'category',
        'name',
        'price',
        'description',
        'image',
    ];

    protected $primaryKey = 'id';
    protected $table = "keyboard";
    public $timestamps = false;
}

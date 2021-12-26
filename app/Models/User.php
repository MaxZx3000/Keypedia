<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'email',
        'email_address',
        'password',
        'address',
        'gender',
        'date_of_birth'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $primaryKey = "id";
    protected $table = "users";
    public $timestamps = false;
}

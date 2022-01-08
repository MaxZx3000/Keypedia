<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CustomerUserSeeder extends Seeder
{
    public function run()
    {
        // Code to insert Customer data
        $users = [
            ["username" => "Benten", "email_address" => "benten@gmail.com",
            "password" => "SamplePassword1", "Address" => "Jl. Sample Road 22", "Gender" => "Male",
            "date_of_birth" => '2014-12-07', "role" => 'C'],
        ];
        User::insert($users);
    }
}

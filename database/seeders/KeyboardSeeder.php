<?php

namespace Database\Seeders;

use App\Models\Keyboard;
use Illuminate\Database\Seeder;

class KeyboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $keyboards = [
            ["category" => 1, 'name' => 'Super Keyboard',
            'price' => 50000, 'description' => 'Sample Desc 1',
            'image' => 'keyboards/Keyboard 1.jpg']
        ];

        Keyboard::insert($keyboards);
    }
}

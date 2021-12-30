<?php

namespace Database\Seeders;

use App\Models\Keyboard;
use Illuminate\Database\Seeder;

class KeyboardSeeder extends Seeder
{
    public function run()
    {
        $keyboards = [
            ['category_id' => 1, 'name' => 'Super Keyboard',
            'price' => 50000, 'description' => 'Sample Desc 1',
            'image' => 'images/keyboards/Keyboard 1.jpg']
        ];

        Keyboard::insert($keyboards);
    }
}

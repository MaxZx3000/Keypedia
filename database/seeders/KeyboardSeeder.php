<?php

namespace Database\Seeders;

use App\Models\Keyboard;
use Illuminate\Database\Seeder;

class KeyboardSeeder extends Seeder
{
    public function run()
    {
        $keyboards = [
            ['category_id' => 1, 'name' => 'Super Keyboard 1',
            'price' => 50000, 'description' => 'This is a sample description 1',
            'image' => 'images/keyboards/Keyboard 1.jpg'],
            ['category_id' => 2, 'name' => 'Super Keyboard 2',
            'price' => 60000, 'description' => 'This is a sample description 2',
            'image' => 'images/keyboards/Keyboard 2.jpg'],
            ['category_id' => 3, 'name' => 'Super Keyboard 3',
            'price' => 70000, 'description' => 'This is a sample description 3',
            'image' => 'images/keyboards/Keyboard 3.jpg'],
            ['category_id' => 4, 'name' => 'Super Keyboar 4',
            'price' => 80000, 'description' => 'This is a sample description 4',
            'image' => 'images/keyboards/Keyboard 4.jpg'],
            ['category_id' => 5, 'name' => 'Super Keyboard 5',
            'price' => 90000, 'description' => 'This is a sample description 5',
            'image' => 'images/keyboards/Keyboard 5.jpg'],
        ];

        Keyboard::insert($keyboards);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Sample Category 1', 'image' => 'images/category/Category 1.jpg'],
            ['name' => 'Sample Category 2', 'image' => 'images/category/Category 2.jpg'],
            ['name' => 'Sample Category 3', 'image' => 'images/category/Category 3.jpg'],
            ['name' => 'Sample Category 4', 'image' => 'images/category/Category 4.jpg'],
            ['name' => 'Sample Category 5', 'image' => 'images/category/Category 5.jpg']
        ];

        Category::insert($categories);
    }
}

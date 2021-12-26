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
            ['name' => 'Sample Category 1', 'image' => 'category/Category 1'],
            ['name' => 'Sample Category 2', 'image' => 'category/Category 2'],
            ['name' => 'Sample Category 3', 'image' => 'category/Category 3'],
            ['name' => 'Sample Category 4', 'image' => 'category/Category 4'],
            ['name' => 'Sample Category 5', 'image' => 'category/Category 5']
        ];

        Category::insert($categories);
    }
}

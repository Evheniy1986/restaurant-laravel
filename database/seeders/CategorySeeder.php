<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Сніданки',
                'name_en' => 'Breakfast',
                'slug' => 'snidanky',
            ],
            [
                'name' => 'Обіди',
                'name_en' => 'Lunch',
                'slug' => 'obidy',
            ],
            [
                'name' => 'Вечері',
                'name_en' => 'Dinner',
                'slug' => 'vecheri',
            ],

        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

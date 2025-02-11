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
            [
                'name' => 'Десерти',
                'name_en' => 'Desserts',
                'slug' => 'deserty',
            ],
            [
                'name' => 'Напої',
                'name_en' => 'Drinks',
                'slug' => 'napoi',
            ],
            [
                'name' => 'Супи',
                'name_en' => 'Soups',
                'slug' => 'supy',
            ],
            [
                'name' => 'Салати',
                'name_en' => 'Salads',
                'slug' => 'salaty',
            ],
            [
                'name' => 'Фастфуд',
                'name_en' => 'Fast Food',
                'slug' => 'fastfood',
            ],
            [
                'name' => 'Вегетаріанські',
                'name_en' => 'Vegetarian',
                'slug' => 'vegetarianski',
            ],
            [
                'name' => 'Морепродукти',
                'name_en' => 'Seafood',
                'slug' => 'moreprodukty',
            ],
            [
                'name' => 'Гарніри',
                'name_en' => 'Side Dishes',
                'slug' => 'garniry',
            ],
            [
                'name' => 'Гриль',
                'name_en' => 'Grill',
                'slug' => 'grill',
            ],
            [
                'name' => 'Випічка',
                'name_en' => 'Bakery',
                'slug' => 'vypichka',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

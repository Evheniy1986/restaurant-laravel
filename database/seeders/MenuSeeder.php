<?php

namespace Database\Seeders;

use App\Helpers\DirManager;
use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(DirManager $dirManager): void
    {
        $images = $dirManager->copyFiles(public_path('asset/images/food'), storage_path('app/public/menus'));

        $imageIndex = 0;
        $totalImages = count($images);

        $meals = [
            [
                'name' => 'Оджахурі з білими грибами',
                'name_en' => 'Ojahuri with white mushrooms',
                'category_id' => rand(1, 13),
                'slug' => Str::slug('Оджахурі з білими грибами'),
                'description' => 'Смажена картопля з м’ясом та білими грибами',
                'description_en' => 'Fried potatoes with meat and white mushrooms',
                'weight' => '350g',
                'image' => $totalImages ? 'menus/' . $images[($imageIndex++) % $totalImages] : null,
                'old_price' => fake()->boolean(50) ? rand(100, 900) : null,
                'price' => rand(100, 800),
                'is_new' => fake()->boolean(),
                'is_hit' => fake()->boolean(),
            ],
            [
                'name' => 'Борщ український',
                'name_en' => 'Ukrainian Borscht',
                'category_id' => rand(1, 13),
                'slug' => Str::slug('Борщ український'),
                'description' => 'Традиційний червоний борщ з пампушками',
                'description_en' => 'Traditional red borscht with garlic buns',
                'weight' => '400g',
                'image' => $totalImages ? 'menus/' . $images[($imageIndex++) % $totalImages] : null,
                'old_price' => fake()->boolean(50) ? rand(100, 900) : null,
                'price' => rand(100, 800),
                'is_new' => fake()->boolean(),
                'is_hit' => fake()->boolean(),
            ],
            [
                'name' => 'Котлета по-київськи',
                'name_en' => 'Chicken Kiev',
                'category_id' => rand(1, 13),
                'slug' => Str::slug('Котлета по-київськи'),
                'description' => 'Соковита куряча котлета з маслом',
                'description_en' => 'Juicy chicken cutlet with butter',
                'weight' => '250g',
                'image' => $totalImages ? 'menus/' . $images[($imageIndex++) % $totalImages] : null,
                'old_price' => fake()->boolean(50) ? rand(100, 900) : null,
                'price' => rand(100, 800),
                'is_new' => fake()->boolean(),
                'is_hit' => fake()->boolean(),
            ],
            [
                'name' => 'Грецький салат',
                'name_en' => 'Greek Salad',
                'category_id' => rand(1, 13),
                'slug' => Str::slug('Грецький салат'),
                'description' => 'Овочевий салат з фетою',
                'description_en' => 'Vegetable salad with feta cheese',
                'weight' => '300g',
                'image' => $totalImages ? 'menus/' . $images[($imageIndex++) % $totalImages] : null,
                'old_price' => fake()->boolean(50) ? rand(100, 900) : null,
                'price' => rand(100, 800),
                'is_new' => fake()->boolean(),
                'is_hit' => fake()->boolean(),
            ],
            [
                'name' => 'Паста Карбонара',
                'name_en' => 'Pasta Carbonara',
                'category_id' => rand(1, 13),
                'slug' => Str::slug('Паста Карбонара'),
                'description' => 'Паста з беконом і соусом',
                'description_en' => 'Pasta with bacon and sauce',
                'weight' => '350g',
                'image' => $totalImages ? 'menus/' . $images[($imageIndex++) % $totalImages] : null,
                'old_price' => fake()->boolean(50) ? rand(100, 900) : null,
                'price' => rand(100, 800),
                'is_new' => fake()->boolean(),
                'is_hit' => fake()->boolean(),
            ],
            [
                'name' => 'Піца Маргарита',
                'name_en' => 'Pizza Margherita',
                'category_id' => rand(1, 13),
                'slug' => Str::slug('Піца Маргарита'),
                'description' => 'Томатний соус, моцарела, базилік',
                'description_en' => 'Tomato sauce, mozzarella, basil',
                'weight' => '500g',
                'image' => $totalImages ? 'menus/' . $images[($imageIndex++) % $totalImages] : null,
                'old_price' => fake()->boolean(50) ? rand(100, 900) : null,
                'price' => rand(100, 800),
                'is_new' => fake()->boolean(),
                'is_hit' => fake()->boolean(),
            ],
            [
                'name' => 'Шашлик зі свинини',
                'name_en' => 'Pork Shashlik',
                'category_id' => rand(1, 13),
                'slug' => Str::slug('Шашлик зі свинини'),
                'description' => 'Соковите м’ясо на грилі',
                'description_en' => 'Juicy grilled meat',
                'weight' => '450g',
                'image' => $totalImages ? 'menus/' . $images[($imageIndex++) % $totalImages] : null,
                'old_price' => fake()->boolean(50) ? rand(100, 900) : null,
                'price' => rand(100, 800),
                'is_new' => fake()->boolean(),
                'is_hit' => fake()->boolean(),
            ],
            [
                'name' => 'Рол Філадельфія',
                'name_en' => 'Philadelphia Roll',
                'category_id' => rand(1, 13),
                'slug' => Str::slug('Рол Філадельфія'),
                'description' => 'Лосось, крем-сир, рис',
                'description_en' => 'Salmon, cream cheese, rice',
                'weight' => '250g',
                'image' => $totalImages ? 'menus/' . $images[($imageIndex++) % $totalImages] : null,
                'old_price' => fake()->boolean(50) ? rand(100, 900) : null,
                'price' => rand(100, 800),
                'is_new' => fake()->boolean(),
                'is_hit' => fake()->boolean(),
            ],
            [
                'name' => 'Сирники',
                'name_en' => 'Cheese Pancakes',
                'category_id' => rand(1, 13),
                'slug' => Str::slug('Сирники'),
                'description' => 'Домашні сирники з варенням',
                'description_en' => 'Homemade cheese pancakes with jam',
                'weight' => '250g',
                'image' => $totalImages ? 'menus/' . $images[($imageIndex++) % $totalImages] : null,
                'old_price' => fake()->boolean(50) ? rand(100, 900) : null,
                'price' => rand(100, 800),
                'is_new' => fake()->boolean(),
                'is_hit' => fake()->boolean(),
            ],
            [
                'name' => 'Чізкейк Нью-Йорк',
                'name_en' => 'New York Cheesecake',
                'category_id' => rand(1, 13),
                'slug' => Str::slug('Чізкейк Нью-Йорк'),
                'description' => 'Класичний чізкейк з сиром',
                'description_en' => 'Classic cheesecake with cheese',
                'weight' => '200g',
                'image' => $totalImages ? 'menus/' . $images[($imageIndex++) % $totalImages] : null,
                'old_price' => fake()->boolean(50) ? rand(100, 900) : null,
                'price' => rand(100, 800),
                'is_new' => fake()->boolean(),
                'is_hit' => fake()->boolean(),
            ],
            [
                'name' => 'Лате',
                'name_en' => 'Latte',
                'category_id' => rand(1, 13),
                'slug' => Str::slug('Лате'),
                'description' => 'Молочна кава',
                'description_en' => 'Milk coffee',
                'weight' => '300ml',
                'image' => $totalImages ? 'menus/' . $images[($imageIndex++) % $totalImages] : null,
                'old_price' => fake()->boolean(50) ? rand(100, 900) : null,
                'price' => rand(100, 800),
                'is_new' => fake()->boolean(),
                'is_hit' => fake()->boolean(),
            ],
            [
                'name' => 'Чай зелений',
                'name_en' => 'Green Tea',
                'category_id' => rand(1, 13),
                'slug' => Str::slug('Чай зелений'),
                'description' => 'Ароматний зелений чай',
                'description_en' => 'Aromatic green tea',
                'weight' => '250ml',
                'image' => $totalImages ? 'menus/' . $images[($imageIndex++) % $totalImages] : null,
                'old_price' => fake()->boolean(50) ? rand(100, 900) : null,
                'price' => rand(100, 800),
                'is_new' => fake()->boolean(),
                'is_hit' => fake()->boolean(),
            ],
            [
                'name' => 'Деруни',
                'name_en' => 'Potato Pancakes',
                'category_id' => rand(1, 13),
                'slug' => Str::slug('Деруни'),
                'description' => 'Традиційні картопляні деруни з часником і сметаною',
                'description_en' => 'Traditional potato pancakes with garlic and sour cream',
                'weight' => '250g',
                'image' => $totalImages ? 'menus/' . $images[($imageIndex++) % $totalImages] : null,
                'old_price' => fake()->boolean(50) ? rand(100, 900) : null,
                'price' => rand(100, 800),
                'is_new' => fake()->boolean(),
                'is_hit' => fake()->boolean(),
            ],
        ];


        foreach ($meals as $meal) {
            Menu::create($meal);
        }


    }
}

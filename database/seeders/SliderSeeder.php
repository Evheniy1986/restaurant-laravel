<?php

namespace Database\Seeders;

use App\Helpers\DirManager;
use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(DirManager $dirManager): void
    {
        $images = $dirManager->copyFiles(public_path('asset/images/sliders'), storage_path('app/public/sliders'));
        $totalImages = count($images);
        $imageIndex = 0;
        $sliders = [];

        for ($i = 1; $i <= $totalImages; $i++) {
            $sliders[] = [
                'title' => fake()->sentence(3),
                'title_en' => fake()->sentence(3),
                'description' => fake()->realText(50),
                'description_en' => fake()->realText(50),
                'image' => $totalImages ? 'sliders/' . $images[$imageIndex++ % $totalImages] : null,
                'link' => fake()->url(),
                'order' => rand(1, 20),
                'is_active' => 1,
            ];
        }

        Slider::insert($sliders);
    }
}

<?php

namespace App\View\Composers;

use App\Models\Category;
use App\Models\Slider;
use Illuminate\View\View;

class SliderComposer
{
    public function compose(View $view)
    {
        $sliders = Slider::where('is_active', true)->orderBy('order')->get();
        $view->with('sliders', $sliders);
    }
}

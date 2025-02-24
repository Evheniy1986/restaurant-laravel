<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MainController extends Controller
{
    public function index()
    {
        return view('front.index');

    }

    public function categoryWithProduct($categorySlug)
    {
        $categorywithMeal = Category::with('menus')->where('slug', $categorySlug)->first();
        return view('front.category', compact('categorywithMeal'));
    }
}

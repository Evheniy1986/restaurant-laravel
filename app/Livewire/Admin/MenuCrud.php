<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Menu;
use App\Services\ImageService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class MenuCrud extends Component
{
    use WithFileUploads;

    public $menus;

    public $menuId, $name, $name_en, $category_id, $slug, $description, $description_en,
        $image, $weight, $old_price, $price, $is_new, $is_hit;


    public $isOpen = false;
    public $isShow = false;
    public $showMenu;
    public $old_image;
    protected $imageService;

    public function __construct()
    {
        $this->imageService = new ImageService();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }


    public function show($id)
    {
        $this->showMenu = Menu::find($id);

        $this->isShow = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->isShow = false;
        $this->resetFields();
    }

    public function resetFields()
    {
        $this->menuId = null;
        $this->name = '';
        $this->name_en = '';
        $this->category_id = null;
        $this->slug = '';
        $this->description = '';
        $this->description_en = '';
        $this->image = '';
        $this->weight = '';
        $this->old_price = null;
        $this->price = null;
        $this->is_new = false;
        $this->is_hit = false;
        $this->old_image = null;
    }


    public function loadMenuList()
    {
        $this->menus = Menu::all();
    }

    public function create()
    {
        $this->openModal();
        $this->resetFields();
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        $this->menuId = $menu->id;
        $this->name = $menu->name;
        $this->name_en = $menu->name_en;
        $this->category_id = $menu->category_id;
        $this->slug = $menu->slug;
        $this->description = $menu->description;
        $this->description_en = $menu->description_en;
        $this->old_image = $menu->image;
        $this->weight = $menu->weight;
        $this->old_price = $menu->old_price;
        $this->price = $menu->price;
        $this->is_new = $menu->is_new;
        $this->is_hit = $menu->is_hit;
        $this->openModal();
    }

    public function save()
    {

        $data = $this->validate([
            'name' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('menus')->ignore($this->menuId)],
            'description' => 'required|string',
            'description_en' => 'nullable|string',
            'image' => $this->menuId ? 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:7000' : 'required|image|mimes:jpeg,png,jpg,webp,svg|max:7000',
            'weight' => 'required',
            'old_price' => 'nullable|numeric',
            'price' => 'required|numeric|min:0',
            'is_new' => 'nullable|boolean',
            'is_hit' => 'nullable|boolean',
        ]);

        $menu = $this->menuId ? Menu::find($this->menuId) : null;
        if ($this->image) {
            if ($menu && $menu->image) {
                Storage::disk('public')->delete($menu->image);
            }

            $data['image'] = $this->imageService->processAndStore($this->image, 'menus');
        } else {
            $data['image'] = $menu->image;
        }

        $data['slug'] = $menu ? $menu->slug : Str::slug($this->name);


        Menu::updateOrCreate(
            ['id' => $this->menuId],
            $data
        );

        session()->flash('message', $this->menuId ? 'Dishes updated successfully' : 'Dishes created successfully');
        $this->closeModal();
        $this->loadMenuList();
    }


    public function delete($id)
    {
        Menu::find($id)->delete();

        session()->flash('message', 'Dishes deleted successfully!');
        $this->loadMenuList();
    }


    public function render()
    {
        $this->loadMenuList();
        $categories = Category::all();
        return view('livewire.admin.menu-crud', compact('categories'))
            ->extends('layouts.admin');
    }
}

<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CategoryCrud extends Component
{
    public $categories;
    public $name, $name_en, $slug, $categoryId;
    public $isModalOpen = false;


    public function loadCategories()
    {
        $this->categories = Category::all();
    }

    public function openModal($categoryId = null)
    {
        if ($categoryId) {
            $category = Category::find($categoryId);
            $this->categoryId = $category->id;
            $this->name = $category->name;
            $this->name_en = $category->name_en;
            $this->slug = $category->slug;
        } else {
            $this->reset();
        }
        $this->isModalOpen = true;
    }


    public function closeModal()
    {
        $this->isModalOpen =false;
        $this->reset();
    }

    public function save()
    {
       $data = $this->validate([
            'name' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('categories')->ignore($this->categoryId)
            ]
        ]);

        if ($this->categoryId) {
            $category = Category::find($this->categoryId);
            $data['slug'] = $category->slug;
        } else {
            $data['slug'] = Str::slug($this->name);
        }
        Category::updateOrCreate(['id' => $this->categoryId], $data);

        session()->flash('message', $this->categoryId ? 'Category updated successfully!' : 'Category created successfully!');
        $this->closeModal();
        $this->loadCategories();
    }

    public function delete($categoryId)
    {
        Category::find($categoryId)->delete();
        session()->flash('message', 'Category deleted successfully!');
        $this->loadCategories();
    }

    public function render()
    {
        $this->loadCategories();
        return view('livewire.admin.category-crud')
            ->extends('layouts.admin');
    }
}

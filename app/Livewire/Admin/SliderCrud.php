<?php

namespace App\Livewire\Admin;

use App\Models\Slider;
use App\Services\ImageService;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class SliderCrud extends Component
{
    use WithFileUploads;

    public $sliders;
    public $sliderId;
    public $title;
    public $title_en;
    public $description;
    public $description_en;
    public $image;
    public $link;
    public $order = 0;
    public $is_active = false;

    public $isOpen = false;
    public $isShow = false;
    public $showSlider;
    public $old_image;

    public function load()
    {
        $this->sliders = Slider::all();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->isShow = false;
        $this->reset();
    }

    public function create()
    {
        $this->openModal();
    }

    public function edit($id)
    {
        $slider = Slider::find($id);

        $this->sliderId = $slider->id;
        $this->title = $slider->title;
        $this->title_en = $slider->title_en;
        $this->description = $slider->description;
        $this->description_en = $slider->description_en;
        $this->old_image = $slider->image;
        $this->link = $slider->link;
        $this->order = $slider->order;
        $this->is_active = $slider->is_active;

        $this->openModal();
    }

    public function show($id)
    {
        $this->showSlider = Slider::find($id);
        $this->isShow = true;
    }



    protected function rules()
    {
        return [
            'title' => 'nullable|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'description_en' => 'nullable|string',
            'image' => $this->sliderId ? 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:7000' : 'required|image|mimes:jpeg,png,jpg,webp,svg|max:7000',
            'link' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ];
    }

    public function save(ImageService $imageService)
    {
        $data = $this->validate();

        $slider = $this->sliderId ? Slider::find($this->sliderId) : null;
        if ($this->image) {
            if ($slider && $slider->image) {
                Storage::disk('public')->delete($slider->image);
            }
            $data['image'] = $imageService->processAndStore($this->image, 'sliders', 1600, 600);
        } else {
            $data['image'] = $slider->image;
        }
        Slider::query()->updateOrCreate(['id' => $this->sliderId], $data);

        session()->flash('message', $this->sliderId ? 'Slider updated successfully' : 'Slider created successfully');
        $this->closeModal();
        $this->load();
    }

    public function delete($id)
    {
        $slider = Slider::find($id);
        if (isset($slider->image)) {
            Storage::disk('public')->delete($slider->image);
        }
        $slider->delete();

        session()->flash('message', 'Slider deleted successfully!');
        $this->load();
    }

    public function render()
    {
        $this->load();
        return view('livewire.admin.slider-crud')
            ->extends('layouts.admin');
    }
}

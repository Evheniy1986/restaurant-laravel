@extends('layouts.main')
@section('title',  'Главная' )

@section('content')
    <div class="container-fluid">
        <div id="carousel" class="carousel slide carousel-fade mt-lg-4 m-3 mb-4" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach($sliders as $index => $slider)
                    <button type="button" data-bs-target="#carousel" data-bs-slide-to="{{ $index }}"
                            class="{{ $index === 0 ? 'active' : '' }}"
                            aria-label="Slide {{ $index + 1 }}"></button>
                @endforeach
            </div>

            <div class="carousel-inner">
                @foreach($sliders as $index => $slider)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <a class="no-underline" href="{{ $slider->link ?? '#' }}">
                            <img src="{{ $slider->getImage() }}"
                                 class="d-block w-100 object-fit-cover" alt="{{ $slider->title ?? '' }}">
                        </a>
                        <div class="carousel-caption d-none d-md-block">
                            <h2 class="slider-title">{{ $slider->title ?? '' }}</h2>
                            <p class="slider-description">{{ $slider->description ?? '' }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <button class="carousel-control-prev d-none d-lg-flex" type="button" data-bs-target="#carousel"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next d-none d-lg-flex" type="button" data-bs-target="#carousel"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>



    <section class="categories">
        <div class="container-fluid mt-4">
            <div class="row g-1">
                @foreach($categories as $category)
                    <div class="col-lg-2 col-md-3 col-sm-3 col-5">
                        <div class="category-card">
                            <div class="category-name">
                                <h3><a class="no-underline"
                                       href="{{ route('category', $category->slug) }}">{{ $category->name }}</a></h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="foods mb-4">
        <div class="container-fluid">
            <h1 class="mb-4">{{ $categorywithMeal->name }}</h1>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-1 mb-3 mt-4">
                @foreach($categorywithMeal->menus as $meal)
                    <livewire:front.product :$meal :key="$meal->id"/>
                @endforeach
            </div>
        </div>
    </section>
@endsection

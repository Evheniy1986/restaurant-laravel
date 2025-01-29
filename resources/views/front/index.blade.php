@extends('layouts.main')
@section('title',  'Главная' )

@section('content')
<div class="container-fluid">

    <div id="carousel" class="carousel slide carousel-fade mt-lg-4 m-3 mb-4" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active"
                    aria-current="true"
                    aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="4" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('/asset/images/sliders/WEB_Kyiv_MamaManana_10khinkali.webp') }}"
                     class="d-block w-100 object-fit-cover" alt="...">
                <div class="carousel-caption d-none d-md-block">

                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('/asset/images/sliders/1705949175925.webp') }}" class="d-block w-100 object-fit-cover" alt="...">
                <div class="carousel-caption d-none d-md-block">

                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('/asset/images/sliders/1716367895784.webp') }}" class="d-block w-100 object-fit-cover" alt="...">
                <div class="carousel-caption d-none d-md-block">

                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('asset/images/sliders/tg_image_2993662886.webp') }}" class="d-block w-100 object-fit-cover" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h2>Third slide label</h2>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('/asset/images/sliders/WEB_Kyiv_MamaManana_12khachapuri.webp') }}"
                     class="d-block w-100 object-fit-cover" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h2>Third slide label</h2>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>

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
            <div class="col-lg-2 col-md-3 col-sm-3 col-5">
                <div class="category-card">

                    <div class="category-name">
                        <h3><a class="no-underline" href="">Сніданки</a></h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-5">
                <div class="category-card">

                    <div class="category-name">
                        <h3><a class="no-underline" href="">Гарячі страви</a></h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-5">
                <div class="category-card">

                    <div class="category-name">
                        <h3><a class="no-underline" href="">Десерти</a></h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-5">
                <div class="category-card">

                    <div class="category-name">
                        <h3><a class="no-underline" href="">Холодні закуски</a></h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-5">
                <div class="category-card">

                    <div class="category-name">
                        <h3><a class="no-underline" href="">Перші страви</a></h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-5">
                <div class="category-card">

                    <div class="category-name">
                        <h3><a class="no-underline" href="">Основні страви</a></h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-5">
                <div class="category-card">

                    <div class="category-name">
                        <h3><a class="no-underline" href="">Салати</a></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="foods">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-12 product-category d-flex align-items-end">
                <div class="product-category-name me-2">
                    <h2 class="section-name">Салати</h2>
                </div>
                <div class="product-category-link">
                    <a class="" href="#">Смотреть все<i class="fa-solid fa-arrow-right ms-2"></i></a>
                </div>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-1">
            <div class="col product-wrapper">
                <div class="product-card">
                    <div class="product-card-offer">
                        <div class="offer-hit badge text-bg-danger">Hit</div>
                        <div class="offer-new badge text-bg-warning">New</div>
                    </div>
                    <div class="product-thumb">
                        <a class="no-underline" href="#"><img src="{{ asset('/asset/images/food/4-chashoshyli-2.webp') }}" alt=""></a>
                    </div>
                    <div class="product-details">
                        <div class="in-stock">
                            <span class="small">200 г</span>
                        </div>
                        <h4>
                            <a class="no-underline" href="#">Салат Глехурі зі слабосолоним лососем</a>
                        </h4>
                        <p class="product-excerpt">Салат зі слабосолоним лососем, авокадо, руколою, шпинатом, кінзою та медовим дресінгом</p>
                        <div class="product-bottom-details d-flex justify-content-between align-items-center">
                            <div class="product-price mb-2">
                                240 грн
                            </div>

                            <div class="product-links">
                                <button class="btn-cart">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                         stroke="currentColor" aria-hidden="true" class="cart-btn">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col product-wrapper">
                <div class="product-card">
                    <div class="product-card-offer">
                        <div class="offer-hit badge text-bg-danger">Hit</div>
                        <div class="offer-new badge text-bg-warning">New</div>
                    </div>
                    <div class="product-thumb">
                        <a class="no-underline" href="#"><img src="{{ asset('/asset/images/food/0b1075d65502f7914e005691fd6cd075385a2b71-700x700.webp') }}" alt=""></a>
                    </div>
                    <div class="product-details">
                        <div class="in-stock">
                            <span class="small">200 г</span>
                        </div>
                        <h4>
                            <a class="no-underline" href="#">Салат Глехурі зі слабосолоним лососем</a>
                        </h4>
                        <p class="product-excerpt">Салат зі слабосолоним лососем, авокадо, руколою, шпинатом, кінзою та медовим дресінгом.Салат Глехурі зі слабосолоним лососемСалат Глехурі зі слабосолоним лососем</p>
                        <div class="product-bottom-details d-flex justify-content-between align-items-center">
                            <div class="product-price mb-2">
                                <small>$94</small>
                                240 грн
                            </div>

                            <div class="product-links">
                                <button class="btn-cart">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                         stroke="currentColor" aria-hidden="true" class="cart-btn">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col product-wrapper">
                <div class="product-card">
                    <div class="product-card-offer">
                        <div class="offer-hit badge text-bg-danger">Hit</div>
                        <div class="offer-new badge text-bg-warning">New</div>
                    </div>
                    <div class="product-thumb">
                        <a class="no-underline" href="#"><img src="{{ asset('/asset/images/food/4-tsitsila-2.webp') }}" alt=""></a>
                    </div>
                    <div class="product-details">
                        <div class="in-stock">
                            <span class="small">200 г</span>
                        </div>
                        <h4>
                            <a class="no-underline" href="#">Салат Глехурі зі слабосолоним лососем</a>
                        </h4>
                        <p class="product-excerpt">Салат зі слабосолоним лососем, авокадо, руколою, шпинатом, кінзою та медовим дресінгом</p>
                        <div class="product-bottom-details d-flex justify-content-between align-items-center">
                            <div class="product-price mb-2">
                                <small>$94</small>
                                240 грн
                            </div>

                            <div class="product-links">
                                <button class="btn-cart">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                         stroke="currentColor" aria-hidden="true" class="cart-btn">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col product-wrapper">
                <div class="product-card">
                    <div class="product-card-offer">
                        <div class="offer-hit badge text-bg-danger">Hit</div>
                        <div class="offer-new badge text-bg-warning">New</div>
                    </div>
                    <div class="product-thumb">
                        <a class="no-underline" href="#"><img src="{{ asset('/asset/images/food/5-salad-fatysh.webp') }}" alt=""></a>
                    </div>
                    <div class="product-details">
                        <div class="in-stock">
                            <span class="small">200 г</span>
                        </div>
                        <h4>
                            <a class="no-underline" href="#">Салат Глехурі зі слабосолоним лососем</a>
                        </h4>

                        <p class="product-excerpt">Салат зі слабосолоним лососем, авокадо, руколою, шпинатом, кінзою та медовим дресінгом</p>
                        <div class="product-bottom-details d-flex justify-content-between align-items-center">
                            <div class="product-price mb-2">
                                <small>$94</small>
                                240 грн
                            </div>

                            <div class="product-links">
                                <button class="btn-cart">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                         stroke="currentColor" aria-hidden="true" class="cart-btn">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col product-wrapper">
                <div class="product-card">
                    <div class="product-card-offer">
                        <div class="offer-hit badge text-bg-danger">Hit</div>
                        <div class="offer-new badge text-bg-warning">New</div>
                    </div>
                    <div class="product-thumb">
                        <a class="no-underline" href="#"><img src="{{ asset('/asset/images/food/7-kare-telyatina-2.webp') }}" alt=""></a>
                    </div>
                    <div class="product-details">
                        <div class="in-stock">
                            <span class="small">200 г</span>
                        </div>
                        <h4>
                            <a class="no-underline" href="#">Салат Глехурі зі слабосолоним лососем</a>
                        </h4>

                        <p class="product-excerpt">Салат зі слабосолоним лососем, авокадо, руколою, шпинатом, кінзою та медовим дресінгом</p>
                        <div class="product-bottom-details d-flex justify-content-between align-items-center">
                            <div class="product-price mb-2">
                                <small>$94</small>
                                240 грн
                            </div>

                            <div class="product-links">
                                <button class="btn-cart">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                         stroke="currentColor" aria-hidden="true" class="cart-btn">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col product-wrapper">
                <div class="product-card">
                    <div class="product-card-offer">
                        <div class="offer-hit badge text-bg-danger">Hit</div>
                        <div class="offer-new badge text-bg-warning">New</div>
                    </div>
                    <div class="product-thumb">
                        <a class="no-underline" href="#"><img class="card-img-top" src="{{ asset('/asset/images/food/73bc9b2642e9e7ad245ecb8fa07527f7e3047d15-700x700.webp') }}" alt=""></a>
                    </div>
                    <div class="product-details">
                        <div class="in-stock">
                            <span class="small">200 г</span>
                        </div>
                        <h4>
                            <a class="no-underline" href="#">Салат Глехурі зі слабосолоним лососем</a>
                        </h4>

                        <p class="product-excerpt">Салат зі слабосолоним лососем, авокадо, руколою, шпинатом, кінзою та медовим дресінгом</p>
                        <div class="product-bottom-details d-flex justify-content-between align-items-center">
                            <div class="product-price mb-2">
                                <small>$94</small>
                                240 грн
                            </div>

                            <div class="product-links">
                                <button class="btn-cart">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                         stroke="currentColor" aria-hidden="true" class="cart-btn">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col product-wrapper">
                <div class="product-card">
                    <div class="product-card-offer">
                        <div class="offer-hit badge text-bg-danger">Hit</div>
                        <div class="offer-new badge text-bg-warning">New</div>
                    </div>
                    <div class="product-thumb">
                        <a class="no-underline" href="#"><img class="card-img-top" src="{{ asset('/asset/images/food/73bc9b2642e9e7ad245ecb8fa07527f7e3047d15-700x700.webp') }}" alt=""></a>
                    </div>
                    <div class="product-details">
                        <div class="in-stock">
                            <span class="small">200 г</span>
                        </div>
                        <h4>
                            <a class="no-underline" href="#">Салат Глехурі зі слабосолоним лососем</a>
                        </h4>

                        <p class="product-excerpt">Салат зі слабосолоним лососем, авокадо, руколою, шпинатом, кінзою та медовим дресінгом</p>
                        <div class="product-bottom-details d-flex justify-content-between align-items-center">
                            <div class="product-price mb-2">
                                <small>$94</small>
                                240 грн
                            </div>

                            <div class="product-links">
                                <button class="btn-cart">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                         stroke="currentColor" aria-hidden="true" class="cart-btn">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col product-wrapper">
                <div class="product-card">
                    <div class="product-card-offer">
                        <div class="offer-hit badge text-bg-danger">Hit</div>
                        <div class="offer-new badge text-bg-warning">New</div>
                    </div>
                    <div class="product-thumb">
                        <a class="no-underline" href="#"><img class="card-img-top" src="{{ asset('/asset/images/food/73bc9b2642e9e7ad245ecb8fa07527f7e3047d15-700x700.webp') }}" alt=""></a>
                    </div>
                    <div class="product-details">
                        <div class="in-stock">
                            <span class="small">200 г</span>
                        </div>
                        <h4>
                            <a class="no-underline" href="#">Салат Глехурі зі слабосолоним лососем</a>
                        </h4>

                        <p class="product-excerpt">Салат зі слабосолоним лососем, авокадо, руколою, шпинатом, кінзою та медовим дресінгом</p>
                        <div class="product-bottom-details d-flex justify-content-between align-items-center">
                            <div class="product-price mb-2">
                                <small>$94</small>
                                240 грн
                            </div>

                            <div class="product-links">
                                <button class="btn-cart">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                         stroke="currentColor" aria-hidden="true" class="cart-btn">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Infant:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/w3-css/4.1.0/w3.css">


    @vite(['resources/css/app.css', 'resources/css/style.css', 'resources/js/app.js'])
    <title>@yield('title')</title>
</head>
<body>
<div class="wrapper">
    <header class="header sticky-top">
        <div class="container-xxl d-flex justify-content-between align-items-center">
            <button id="btnCatalogMobile" class="navbar-toggler d-md-block d-lg-none btn-menu"
                    data-bs-toggle="offcanvas" data-bs-target="#mobileMenu"
                    type="button">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="logo">
                <a href="#">tata-potato</a>
            </div>
            <div class="header-list d-flex gap-4 align-items-center  d-lg-flex d-none">
                <div class="header-list-menu">
                    <a href="#">About</a>
                </div>

                <div class="header-list-menu">
                    <a href="#">Delivery</a>
                </div>
                <div class="header-list-menu">
                    <a href="#">Menu</a>
                </div>
                <div class="header-list-menu">
                    <a href="#">Reservations</a>
                </div>


            </div>
            <div class="d-flex gap-2 align-items-center">

                <div class="header-list cart-container me-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" aria-hidden="true" class="cart">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z"></path>
                    </svg>
                    <span class="cart-badge">5</span>
                </div>
                <div class="header-list">
                    <select class="form-select" aria-label="Default select example">
                        <option value="1">Ua</option>
                        <option value="2">Eng</option>
                    </select>
                </div>
            </div>

        </div>
    </header>
    <!-- Offcanvas Menu -->
    <div class="offcanvas offcanvas-start catalog-offcanvas" tabindex="-1" id="mobileMenu"
         aria-labelledby="mobileMenuLabel">
        <div class="offcanvas-header catalog-offcanvas-header">
            <h5 class="offcanvas-title" id="mobileMenuLabel"><a href="index.html" class="header-logo">Tata-Potato</a>
            </h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
        </div>
        <div class="offcanvas-body catalog-offcanvas-body">
            <div class="container catalog-container text-center">
                <div class="row mobile-menu-list">
                    <!-- Первая колонка -->
                    <div class="header-list-menu-mobile">
                        <a href="#">About</a>
                    </div>

                    <div class="header-list-menu-mobile">
                        <a href="#">Delivery</a>
                    </div>
                    <div class="header-list-menu-mobile">
                        <a href="#">Menu</a>
                    </div>
                    <div class="header-list-menu-mobile">
                        <a href="#">Reservations</a>
                    </div>

                    <!-- Информация -->
                    <div class="header-list-menu-mobile">
                        <h4 class="catalog-info-header">Информация</h4>
                        <ul class="list-unstyled catalog-contacts-list">
                            <li><a href="#">Условия доставки</a></li>
                            <li><a href="#">Контакты</a></li>
                            <li><a href="#">Карта сайта</a></li>
                        </ul>
                    </div>
                    <!-- Рабочие часы -->
                    <div class="header-list-menu-mobile">
                        <h4 class="catalog-hours-header">Рабочие часы</h4>
                        <ul class="list-unstyled catalog-contacts-list">
                            <li>Киев улица Кооперативная 2</li>
                            <li>Ежедневно 10:00-22:00</li>
                            <li><a href="mailto:User@gmail.com">User@gmail.com</a></li>
                            <li><a href="tel:0669999999">066-999-99-99</a></li>
                        </ul>
                    </div>

                    <div class="header-list-menu-mobile">
                        <h4 class="catalog-contacts-header">Мы в соцсетях</h4>
                        <ul class="list-unstyled catalog-contacts-list">
                            <li><a href="#"><i class="fa-brands fa-instagram me-2"></i>Instagram</a></li>
                            <li><a href="#"><i class="fa-brands fa-facebook me-2"></i>Facebook</a></li>
                        </ul>
                    </div>
                    <!-- Контакты -->

                </div>
            </div>
        </div>
    </div>

    <main class="main">

        @yield('content')

    </main>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-6">
                    <h4>Информация</h4>
                    <ul class="list-unstyled">
                        <li><a href="#">Условия доставки</a></li>
                        <li><a href="#">Контакты</a></li>
                        <li><a href="#">Карта сайта</a></li>
                    </ul>
                </div>

                <div class="col-md-3 col-6">
                    <h4>Menu</h4>
                    <ul class="list-unstyled">
                        <li><a href="#">About</a></li>
                        <li><a href="#">Delivery</a></li>
                        <li><a href="#">Menu</a></li>
                        <li><a href="#">Reservation</a></li>
                    </ul>
                </div>

                <div class="col-md-3 col-6">
                    <h4>Мы всоцсетях</h4>
                    <ul class="list-unstyled">
                        <li><a href="#"><i class="fa-brands fa-instagram me-2"></i>Instagram</a></li>
                        <li><a href="#"><i class="fa-brands fa-facebook me-2"></i>Facebook</a></li>
                    </ul>
                </div>

                <div class="col-md-3 col-6">
                    <h4>Рабочие часы</h4>
                    <ul class="list-unstyled">
                        <li>Киев улица Кооперативная 2</li>
                        <li>Ежедневно 10:00-22:00</li>
                        <li><a href="mailto:User@gmail.com">User@gmail.com</a></li>
                        <li><a href="tel:0669999999">066-999-99-99</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </footer>
</div>


{{--<script src="js/main.js"></script>--}}
</body>
</html>

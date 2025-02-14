<header class="header sticky-top">
    <div class="container-xxl d-flex justify-content-between align-items-center">
        <button id="btnCatalogMobile" class="navbar-toggler d-md-block d-lg-none btn-menu"
                data-bs-toggle="offcanvas" data-bs-target="#mobileMenu"
                type="button">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="logo">
            <a href="{{ route('main') }}">tata-potato</a>
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
                <a class="no-underline" href="{{ route('cart') }}"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                                        stroke="currentColor" aria-hidden="true" class="cart">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z"></path>
                    </svg></a>
                <livewire:front.cart-badge />

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

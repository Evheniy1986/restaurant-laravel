<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <div class="sidebar">


        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="pages/calendar.html" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Calendar
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.category') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-cat"></i>
                        <p>
                            Категории
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.table') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-chair"></i>
                        <p>
                            Столы
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.menu') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-utensils"></i>
                        <p>
                            Меню
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.reservation') }}" class="nav-link">
                        <i class=" nav-icon fa-solid fa-book-open"></i>
                        <p>
                            Бронирование
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.slider') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-sliders"></i>
                        <p>
                            Слайдер
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.user') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-users"></i>
                        <p>
                            Пользователи
                        </p>
                    </a>
                </li>
            </ul>
        </nav>

    </div>
</aside>

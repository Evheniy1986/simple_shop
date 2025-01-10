<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="pages/gallery.html" class="nav-link">
                    <i class="nav-icon fas fa-shopping-bag"></i>
                    <p>
                        Заказы
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.products.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-apple-alt"></i>
                    <p>
                        Продукты
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.categories.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-tasks"></i>
                    <p>
                        Категории
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.users.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Пользователи
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.brands.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Бренды
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.options.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Опции
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.option-values.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Свойство опции товара
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.properties.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Характеристики товара
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>

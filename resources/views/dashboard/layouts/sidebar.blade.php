<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img
            src="{{ asset('/AdminLTE/dist/img/AdminLTELogo.png') }}"
            alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3"
            style="opacity: 0.8"
        />
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img
                    src="{{ asset('/AdminLTE/dist/img/user2-160x160') }}.jpg"
                    class="img-circle elevation-2"
                    alt="User Image"
                />
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul
                class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview"
                role="menu"
                data-accordion="false"
            >
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.home') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-header">Master</li>
                <li class="nav-item">
                    <a href="{{ route('books.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-cube"></i>
                        <p>Books</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/dashboard.html" class="nav-link">
                        <i class="nav-icon fas fa-cubes"></i>
                        <p>Broken Books</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/dashboard.html" class="nav-link">
                        <i class="nav-icon fas fa-id-card"></i>
                        <p>Customers</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/dashboard.html" class="nav-link">
                        <i class="nav-icon fas fa-truck"></i>
                        <p>Suppliers</p>
                    </a>
                </li>
                <li class="nav-header">Transaksi</li>
                <li class="nav-item">
                    <a href="pages/dashboard.html" class="nav-link">
                        <i class="nav-icon fas fa-money-bill"></i>
                        <p>Pengeluaran</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/dashboard.html" class="nav-link">
                        <i class="nav-icon fas fa-download"></i>
                        <p>Pembelian</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/dashboard.html" class="nav-link">
                        <i class="nav-icon fas fa-upload"></i>
                        <p>Penjualan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/dashboard.html" class="nav-link">
                        <i class="nav-icon fas fa-cart-arrow-down"></i>
                        <p>Transaksi Lama</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/dashboard.html" class="nav-link">
                        <i class="nav-icon fas fa-cart-arrow-down"></i>
                        <p>Transaksi Baru</p>
                    </a>
                </li>
                <li class="nav-header">Reports</li>
                <li class="nav-item">
                    <a href="pages/dashboard.html" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Report</p>
                    </a>
                </li>
              
                <!-- manager role only -->
                @if(auth()->user()->role == 'manager')
                <li class="nav-header">Manager Only</li>
                <li class="nav-item">
                    <a href="{{route('users.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>User Manager</p>
                    </a>
                </li>
                @endif
                
                </li>
                <li class="nav-header">Settings</li>
                <li class="nav-item">
                    <a href="pages/dashboard.html" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>User</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/dashboard.html" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>Setting</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="nav-link"
                    >
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Log out</p>
                    </a>

                    <form
                        id="logout-form"
                        action="{{ route('logout') }}"
                        method="POST"
                        class="d-none"
                    >
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

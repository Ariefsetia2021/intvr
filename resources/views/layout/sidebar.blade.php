<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-danger elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ asset('AdminLTE/dist/img/defaut.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8" />
        <span class="brand-text font-weight-light">INVENTORY</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('AdminLTE/dist/img/SMM.png') }}" class="img-circle elevation-2" alt="User Image" />
            </div>
            <div class="info">
                <a
                    href="https://id-check.net/sinar-multi-mandiri/555464.html"
                    class="d-block"
                    >SINAR MULTI MANDIRI</a
                >
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
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            DATA MASTER
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a
                                href="{{ route('masterbarang') }}"
                                class="nav-link active"
                            >
                                <i class="far fa-circle nav-icon"></i>
                                <p>Master Barang</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('stok') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Master Stok Barang</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('customer') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Master Customer</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('sales') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Master Sales</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('supplier') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Master Supplier</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('gudang') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Master Gudang</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            MENU PROSES
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('barangmasuk') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Barang Masuk</p>
                            </a>
                        </li>

                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('barangkeluar') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Barang Keluar</p>
                            </a>
                        </li>

                    </ul>

                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            CETAK BERKAS
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a
                                href="{{ route('invoice') }}"
                                class="nav-link"
                            >
                                <i class="far fa-circle nav-icon"></i>
                                <p>Print Berkas</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

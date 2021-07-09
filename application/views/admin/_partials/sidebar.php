<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav <?php echo $this->uri->segment(2) == '' ? 'active' : '' ?>">
            <div class="sb-sidenav-menu-heading text-success">Core</div>
            <a class="nav-link" href="<?php echo base_url('admin/overview') ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <a class="nav-link" href="<?php echo base_url('welcome/about') ?>">
                <div class="sb-nav-link-icon"><i class="far fa-address-card"></i></div>
                About
            </a>
            <a class="nav-link" href="<?php echo base_url('welcome/contact') ?>">
                <div class="sb-nav-link-icon"><i class="far fa-address-book"></i></div>
                Contact
            </a>
            <div class="sb-sidenav-menu-heading text-success">TUGAS</div>
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTugas" aria-expanded="false" aria-controls="collapseTugas">
                <div class="sb-nav-link-icon"><i class="far fa-calendar-alt"></i></div>
                Kumpulan Tugas
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseTugas" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionTugas">
                    <a class="nav-link" href="<?php echo base_url('welcome/biodata') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-id-card"></i></div> Data Diri
                    </a>
                    <a class="nav-link" href="<?php echo base_url('welcome/prestasi') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-trophy"></i></div> Pengalaman Organisasi
                    </a>
                    <a class="nav-link" href="<?php echo base_url('admin/container') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-truck-moving"></i></div> Tugas Container
                    </a>
                </nav>
            </div>
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div> Data Master
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav accordion" id='sidenavAccordionDataMaster'>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTokobuku" aria-expanded="true" aria-controls="collapseTokobuku">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div> Toko Buku
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseTokobuku" aria-labelledby="headingOne" data-parent="#sidenavAccordionTugas">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?php echo base_url('admin/author') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-edit"></i></div> Author
                            </a>
                            <a class="nav-link" href="<?php echo base_url('admin/book_category') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-atlas"></i></div> Book Category
                            </a>
                            <a class="nav-link" href="<?php echo base_url('admin/supplier') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-reader"></i></div> Supplier
                            </a>
                            <a class="nav-link" href="<?php echo base_url('admin/customer') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-friends"></i></div> Customer
                            </a>
                            <a class="nav-link" href="<?php echo base_url('admin/level') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div> Level
                            </a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseExample" aria-expanded="true" aria-controls="collapseExample">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div> Grocery
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseExample" aria-labelledby="headingOne" data-parent="#sidenavAccordionTugas">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?php echo base_url('examples/author') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-edit"></i></div> Author
                            </a>
                            <a class="nav-link" href="<?php echo base_url('examples/book_category') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-atlas"></i></div> Book Category
                            </a>
                            <a class="nav-link" href="<?php echo base_url('examples/supplier') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-reader"></i></div> Supplier
                            </a>
                            <a class="nav-link" href="<?php echo base_url('examples/customer') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-friends"></i></div> Customer
                            </a>
                            <a class="nav-link" href="<?php echo base_url('examples/level') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div> Level
                            </a>
                            <a class="nav-link" href="<?php echo base_url('examples/book') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div> Book
                            </a>
                        </nav>
                    </div>
                </nav>
            </div>

            <div class="sb-sidenav-menu-heading text-success">Grocery CRUD</div>
            <a class="nav-link" href="<?php echo site_url('examples/customers_management') ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                Customer
            </a>
            <a class="nav-link" href="<?php echo site_url('examples/orders_management') ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                Orders
            </a>
            <a class="nav-link" href="<?php echo site_url('examples/products_management') ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-boxes"></i></div>
                Product
            </a>
            <a class="nav-link" href="<?php echo site_url('examples/offices_management') ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                Offices
            </a>
            <a class="nav-link" href="<?php echo site_url('examples/employees_management') ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div>
                Employees
            </a>
            <a class="nav-link" href="<?php echo site_url('examples/film_management') ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-film"></i></div>
                Films
            </a>
            <a class="nav-link" href="<?php echo site_url('examples/multigrids') ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-calculator"></i></div>
                Multigrid [BETA]
            </a>

            <div class="sb-sidenav-menu-heading text-success">Transaksi</div>
            <a class="nav-link" href="<?php echo site_url('admin/penjualan') ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                Penjualan
            </a>
            <a class="nav-link" href="<?php echo site_url('admin/penjualan/list_penjualan') ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                Laporan Penjualan
            </a>
            <a class="nav-link" href="<?php echo site_url('admin/penjualan/chart') ?>">
                <div class="sb-nav-link-icon"><i class=" fas fa-chart-pie"></i></div>
                Chart Penjualan
            </a>
            <a class="nav-link" href="<?php echo site_url('admin/pembelian') ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Pembelian
            </a>
            <a class="nav-link" href="<?php echo site_url('admin/pembelian/list_pembelian') ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                Laporan Pembelian
            </a>
            <a class="nav-link" href="<?php echo site_url('admin/pembelian/chart') ?>">
                <div class="sb-nav-link-icon"><i class=" fas fa-chart-pie"></i></div>
                Chart Pembelian
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        <?php if ($this->session->userdata('employee_id') != null) echo $_SESSION['name'] ?>
        <?php if ($this->session->userdata('employee_id') == null) echo "User" ?>
    </div>
</nav>
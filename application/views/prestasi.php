<!DOCTYPE html>
<html lang="en">

<head>
    <!-- head.php-->
    <?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body class="sb-nav-fixed">
    <!-- Navbar.php-->
    <?php $this->load->view("admin/_partials/navbar.php") ?>
    <!-- Modal -->
    <?php $this->load->view("admin/_partials/modal.php") ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <!-- sidebar.php-->
            <?php $this->load->view("admin/_partials/sidebar.php") ?>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h2 style="color: green">Prestasi yang Dimiliki</h2>
                    <?php $this->load->view("admin/_partials/breadcrumb.php") ?>
                    <p>Prestasi : </p>
                    <ul>
                        <li>Februari 2021 <t>- Asisten Dosen untuk Mata Kuliah Prinsip Pemrograman</li>
                        <li>Agustus 2020 - Asisten Dosen untuk Mata Kuliah Pemrograman Berorientasi Objek</li>
                        <li>Maret 2020 - Desain Terbaik untuk Cover Buku Wisuda UAJY</li>
                        <li>Februari 2020 - Asisten Dosen untuk Mata Kuliah Prinsip Pemrograman</li>
                        <li>April 2018 - Top 5 Business Idea in Regina Pacis Senior High School by Orita Sinclair</li>
                    </ul>
                    <p>Pengalaman Organisasi : </p>
                    <ol>
                        <li>Kelompok Studi UAJY E-Sport Community (UNISEC)</li>
                        <li>Himpunan Mahasiswa Sistem Informasi 2019/2020</li>
                        <li>OSIS SMA Regina Pacis 2016/2017</li>
                    </ol>
                </div>
            </main>
            <!-- footer.php -->
            <?php $this->load->view("admin/_partials/footer.php") ?>
        </div>
    </div>
    <!-- js.php-->
    <?php $this->load->view("admin/_partials/js.php") ?>
    <!-- <?php $this->load->view("admin/author/modal_author.php") ?> -->
</body>

</html>
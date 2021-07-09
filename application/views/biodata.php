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
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h2 style="color: blue">Biodata</p>
                    </h2>
                    <?php $this->load->view("admin/_partials/breadcrumb.php") ?>
                    <p>Nama Lengkap : <strong>Thomas Quincy Padawangi</strong></p>
                    <p>NPM : <strong>181709819</strong></p>
                    <p>Prodi : <strong>Sistem Informasi</strong></p>
                    <p>Alamat : Ciparigi, Bogor</p>
                    <p>Nomor Telepon : 087711245352</p>
                    <p>Jenis Kelamin : Laki-Laki</p>
                    <p>Sosial Media : </p>
                    <ul>
                        <li>Instagram: @q.pdw</li>
                        <li>Twitter: @quincypdw</li>
                    </ul>

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
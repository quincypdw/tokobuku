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
                    <h1 class="mt-4" style="color:blue">About Us</h1>                           
                        <?php $this->load->view("admin/_partials/breadcrumb.php") ?>
                    <p>Halaman untuk About Us</p>
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
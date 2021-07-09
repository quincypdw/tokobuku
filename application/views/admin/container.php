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
                        <h3 class="mt-4">Container</h3>
                            <?php $this->load->view("admin/_partials/breadcrumb.php") ?>
                            <div class="container">
                                <div class="row">
                                  <div class="col bg-warning"><h5><p class="text-center"><strong>Container 1 - Gambar</strong></p></h5></div>
                                </div>
                                <div class="row">
                                  <div class="col bg-info"><center><img src="http://www.uajy.ac.id/wp-content/uploads/2008/11/Gedung-Bonaventura.jpg" class = "img-thumbnail"><h5>Gedung Bonaventura</h5></center></div>
                                  <div class="col" style="background-color:grey;"><center><img src="https://1.bp.blogspot.com/-_ObzUiA8jZk/XVqdT9tFF3I/AAAAAAAAAfE/zzj4YgZrdBE96fX5Bsq1ALUxnMC2uXUkgCLcBGAs/s1600/31.UAJY.png" width="202" height="250"><h5>Logo UAJY</h5></center></div>
                                  <div class="col bg-success"><center><img src="https://fti.uajy.ac.id/himsi/wp-content/uploads/2018/10/1500620359240.png" width="208" height="200"><h5>Logo HIMSI</h5></center></div>
                                </div>
                                <br>
                                <div class="row">
                                  <div class="col bg-success"><h5><p class="text-center"><strong>Container 2 - Biodata Diri</strong></p></h5></div>
                                </div>
                                <div class="row">
                                <div class="col bg-info"><h5><p class="text-center">Data Diri</p></h5>
                                  <p class="text-center">Nama: Thomas Quincy Padawangi</p>
                                  <p class="text-center">NPM: <strong>181709819</strong></p>
                                  <p class="text-center">Jenis Kelamin : Laki-Laki</p>
                                  <p class="text-center">Tempat, Tanggal Lahir: Jakarta, 28 Januari 2000</p>
                                  <p class="text-center">Alamat : disebelah warung</p>
                                  <p class="text-center">Minggu 3</p>
                                </div>
                                <div class="col bg-warning"><h5><p class="text-center">Deskripsi Singkat</p></h5>
                                  <p class="text-center">Just a little boy with a cup of coffee</p>
                              </div>
                            </div>
                        </div>
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

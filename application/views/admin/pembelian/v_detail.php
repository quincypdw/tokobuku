<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body class="sb-nav-fixed">
    <?php $this->load->view("admin/_partials/navbar.php") ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php $this->load->view("admin/_partials/sidebar.php") ?>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Detail Pembelian</h1>
                    <?php $this->load->view("admin/_partials/breadcrumb.php") ?>
                    <?php echo anchor('admin/pembelian/list_pembelian', '<div class="btn btn-md btn-danger">< Kembali</div>'); ?><br><br>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table tablebordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th width="35%">Nama Buku</th>
                                        <th width="35%">Jumlah Dijual</th>
                                        <th width="30%">Harga Buku</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pembelian3->result_array() as $i) { ?>
                                        <tr>
                                            <td><?php echo $i['title']; ?></td>
                                            <td><?php echo $i['amount']; ?></td>
                                            <td><?php echo $i['price']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <?php $this->load->view("admin/_partials/footer.php") ?>
        </div>
    </div>
    <?php $this->load->view("admin/_partials/js.php") ?>
</body>
<?php $this->load->view("admin/_partials/modal.php") ?>
</html>
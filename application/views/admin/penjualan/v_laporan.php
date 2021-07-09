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
                    <h1 class="mt-4">Daftar Penjualan</h1>
                    <?php $this->load->view("admin/_partials/breadcrumb.php") ?>
                    <div class="card-header"><i class="fas fa-table mr-1"></i>
                        <a type="button" href="<?= base_url('admin/penjualan/pdf'); ?>" class="btn btn-warning"><i class="far fa-file-pdf"></i> Export PDF</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table tablebordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th width="10%">No.Nota</th>
                                        <th width="20%">Nama Kasir</th>
                                        <th width="20%">Pembeli</th>
                                        <th width="20%">Tgl Jual</th>
                                        <th width="10%">Total</th>
                                        <th width="20%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $x = 1;
                                    foreach ($penjualan->result_array() as $i) :
                                        $penjualan_id = $i['penjualan_id'];
                                        $kode_jual = $i['kode_jual'];
                                        $customer_name = $i['customer_name'];
                                        $employee_name = $i['employee_name'];
                                        $sale_date = $i['sale_date'];
                                    ?>
                                        <tr>
                                            <td><?php echo $kode_jual; ?></td>
                                            <td><?php echo $employee_name; ?></td>
                                            <?php
                                            if ($customer_name == "") {
                                                $customer_name = '==Pembeli Bukan Member==';
                                            } else {
                                                $customer_name;
                                            }
                                            ?>
                                            <td><?php echo $customer_name; ?></td>
                                            <td><?php echo $sale_date; ?></td>
                                            <?php
                                            $temp = 0;
                                            foreach ($penjualan1->result_array() as $i) {
                                                $penjualan_id1 = $i['penjualan_id'];
                                                $total = $i['total_price'];
                                                if ($penjualan_id == $penjualan_id1) {
                                                    $total = $total + $temp;
                                                    $temp = $total;
                                                }
                                            }
                                            ?>
                                            <td>Rp. <?php echo number_format($temp); ?>,-</td>
                                            <td>
                                                <a href="<?= base_url('admin/penjualan/detail_penjualan/' . $penjualan_id) ?>" class="btn btn-primary btn-flat">View</a>
                                            </td>
                                        </tr>
                                    <?php
                                        $x++;
                                    endforeach; ?>
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
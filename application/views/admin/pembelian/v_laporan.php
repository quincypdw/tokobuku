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
                    <h1 class="mt-4">Daftar Pembelian</h1>
                    <?php $this->load->view("admin/_partials/breadcrumb.php") ?>
                    <div class="card-header"><i class="fas fa-table mr-1"></i>
                        <a type="button" href="<?= base_url('admin/pembelian/pdf'); ?>" class="btn btn-warning"><i class="far fa-file-pdf"></i> Export PDF</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table tablebordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th width="10%">No.Nota</th>
                                        <th width="20%">Nama Kasir</th>
                                        <th width="20%">Supplier</th>
                                        <th width="20%">Tgl Beli</th>
                                        <th width="10%">Total</th>
                                        <th width="20%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $x = 1;
                                    foreach ($pembelian->result_array() as $i) :
                                        $pembelian_id = $i['pembelian_id'];
                                        $kode_beli = $i['kode_beli'];
                                        $supplier_name = $i['supplier_name'];
                                        $employee_name = $i['employee_name'];
                                        $buy_date = $i['buy_date'];
                                    ?>
                                        <tr>
                                            <td><?php echo $kode_beli; ?></td>
                                            <td><?php echo $employee_name; ?></td>
                                            <?php
                                            if ($supplier_name == "") {
                                                $supplier_name = '==Supplier Belum Terdata==';
                                            } else {
                                                $supplier_name;
                                            }
                                            ?>
                                            <td><?php echo $supplier_name; ?></td>
                                            <td><?php echo $buy_date; ?></td>
                                            <?php
                                            $temp = 0;
                                            foreach ($pembelian1->result_array() as $i) {
                                                $pembelian_id1 = $i['pembelian_id'];
                                                $total = $i['total_price'];
                                                if ($pembelian_id == $pembelian_id1) {
                                                    $total = $total + $temp;
                                                    $temp = $total;
                                                }
                                            }
                                            ?>
                                            <td>Rp. <?php echo number_format($temp); ?>,-</td>
                                            <td>
                                                <a href="<?= base_url('admin/pembelian/detail_pembelian/' . $pembelian_id) ?>" class="btn btn-primary btn-flat">View</a>
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
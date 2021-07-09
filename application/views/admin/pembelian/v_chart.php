<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body class="sb-nav-fixed">
    <?php $this->load->view("admin/_partials/navbar.php"); ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php $this->load->view("admin/_partials/sidebar.php"); ?>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Grafik Pembelian</h1>
                    <?php $this->load->view("admin/_partials/breadcrumb.php") ?>
                    <!-- Start Search Date Range -->
                    <div class="card mb-4">
                        <div class="card-header font-weight-bold">
                            <i class="fas fa-search"></i> Search Date
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" method="post" action="<?php echo base_url('admin/pembelian/chart'); ?>">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold">
                                                Start Date </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-calendar-alt"></i></span>
                                                </div>
                                                <input type="date" class="form-control
 pullright" id="start_date" name="start_date">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold">
                                                End Date </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-calendar-day"></i></span>
                                                </div>
                                                <input type="date" class="form-control
 pullright" id="end_date" name="end_date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="font-weight-bold"> Go
                                            </label>
                                            <div class="input-group date">
                                                <button class="btn btn-success btn-md" href="submit">
                                                    <i class="fas fa-search">
                                                    </i> Search </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="font-weight-lighter">
                                    <em>*The <b> End Date</b> input must be + 1 Day.</em>
                                    <br>e.g. End Date : 01/20/2020 &rarr; <strong> 01/21
                                        /2020 </strong>.
                                </p>
                            </form>
                        </div>
                    </div>
                    <!-- End Search Date Range -->
                    <!-- Start Grafik Garis Pembelian Bulan -->
                    <div class="card mb-4">
                        <div class="card-header font-weight-bold"><i class="fas fa-chart-line mr-1">
                            </i> Grafik Garis Pembelian Bulanan
                            <button class="btn btn-warning" onclick="LinePDF2();" style="float: right;">
                                <i class="fas fa-chart-line"></i> Export Chart </button>
                            <a id="download2" download="chart.jpg">
                                <button type="button" style="float: right; margin: 1px;" class="btn btn-warning" onClick="downloadLine2()">
                                    <i class="fas fa-file-image"></i> Download </button></a>
                        </div>
                        <div class="cardbody"><canvas id="pmbLineBulan" width="80%" height="30">
                            </canvas></div>
                        <div class="card-footer small text-muted"></div>
                    </div>
                    <!-- End Grafik Garis Pembelian BUlan -->
                    <!-- Start Grafik Garis Pembelian -->
                    <div class="card mb-4">
                        <div class="card-header font-weight-bold"><i class="fas fa-chart-line mr-1">
                            </i> Grafik Garis Pembelian
                            <button class="btn btn-warning" onclick="LinePDF1();" style="float: right;">
                                <i class="fas fa-chart-line"></i> Export Chart </button>
                            <a id="download" download="chart.jpg">
                                <button type="button" style="float: right; margin: 1px;" class="btn btn-warning" onClick="downloadLine1()">
                                    <i class="fas fa-file-image"></i> Download </button></a>
                        </div>
                        <div class="cardbody"><canvas id="pmbLine" width="80%" height="30">
                            </canvas></div>
                        <div class="card-footer small text-muted"></div>
                    </div>
                    <!-- End Grafik Garis Pembelian -->
                    <!-- Start Grafik Batang Pembelian -->
                    <div class="card mb-4">
                        <div class="card-header font-weight-bold"><i class="fas fa-chart-bar">
                            </i> Grafik Batang Pembelian
                            <button class="btn btn-warning" onclick="BarPDF1();" style="float: right;">
                                <i class="fas fa-chart-bar"></i> Export Chart </button>
                            <a id="download1" download="chart.jpg">
                                <button type="button" style="float: right; margin: 1px;" class="btn btn-warning" onClick="downloadBar1()">
                                    <i class="fas fa-file-image"></i> Download </button></a>
                        </div>
                        <div class="cardbody"><canvas id="pmbBar" width="100%" height="30">
                            </canvas></div>
                        <div class="card-footer small text-muted"></div>
                    </div>
                    <!-- End Grafik Batang Pembelian -->
                    <!-- Start Tabel Data Pembelian -->
                    <div class="card mb-4">
                        <div class="card-header font-weight-bold"><i class="fas fa-table mr-1">
                            </i> Data Pembelian
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead style="text-align:center">
                                        <tr>
                                            <th width="10%">No.Nota</th>
                                            <th width="10%">Nama Kasir</th>
                                            <th width="20%">Supplier</th>
                                            <th width="10%">Tgl Beli</th>
                                            <th width="10%">Total Items</th>
                                            <th width="12%">Total Price</th>
                                            <th width="10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $x = 1;
                                        foreach ($find_date->result_array() as $i) :
                                            $kode_beli = $i['kode_beli'];
                                            $employee_name = $i['employee_name'];
                                            $supplier_name = $i['supplier_name'];
                                            $buy_date = $i['buy_date'];
                                            $pembelian_id = $i['pembelian_id'];
                                        ?>
                                            <tr style="text-align:center">
                                                <td><?php echo $kode_beli; ?></td>
                                                <td><?php echo $employee_name; ?></td>
                                                <?php
                                                if ($supplier_name == "") {
                                                    $supplier_name = '== Pembeli Bukan Member ==';
                                                } else {
                                                    $supplier_name;
                                                }
                                                ?>
                                                <td><?php echo $supplier_name; ?></td>
                                                <td><?php echo $buy_date; ?></td>
                                                <?php
                                                $amount = 0;
                                                foreach ($pembelian1->result_array() as $i) {
                                                    $pembelian_id1 = $i['pembelian_id'];
                                                    $jml = $i['amount'];
                                                    if ($pembelian_id == $pembelian_id1) {
                                                        $jml = $jml + $amount;
                                                        $amount = $jml;
                                                    }
                                                }
                                                ?>
                                                <td><?php echo number_format($amount); ?> Items
                                                </td>
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
                                                <td>Rp. <?php echo number_format($temp); ?>,-
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('admin/pembelian/detail_pembelian/' . $pembelian_id) ?>" class="btn btn-primary">View</a>
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
                    <!-- End Tabel Data Pembelian -->
                </div>
            </main>
            <?php $this->load->view("admin/_partials/footer.php"); ?>
        </div> <!-- End of layoutSidenav_content -->
    </div> <!-- End of layoutSidenav -->
    <?php $this->load->view("admin/_partials/modal.php"); ?>
    <?php $this->load->view("admin/_partials/js.php"); ?>
</body>

</html>
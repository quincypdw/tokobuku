<!DOCTYPE html>
<html><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laporan Penjualan</title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.
min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" cros sorigin="anonymous">
    <style>
        .line-title {
            border: 0;
            border-style: inset;
            border-top: 1px solid #000;
        }
    </style>
</head><body>
    <img src="assets/logo.png" style="position: absolute; width: 60px; height: auto;">
    <table style="width: 100%;">
        <tr>
            <td align="center">
                <span style="line-height: 1.6; font-weight: bold;">
                    Laporan Penjualan Tokobuku
                    <br>Toko Buku Suka
                    <br>Jl. Cik Di Tiro No.46 A
                    <br>"Buku adalah jendela dunia. Mari baca buku!"</span><br />
            </td>
        </tr>
        <br>
        <hr class="line-tittle">
    </table>
    <table class="table " width=" 100%" border="1" cellpadding="1">
        <tr>
            <th style="text-align: center; font-family:courier;">No.Nota</th>
            <th>Nama Kasir</th>
            <th>Pembeli</th>
            <th>Tanggal Jual</th>
            <th>Total Penjualan</th>
        </tr>
        <?php
        $x = 1;
        foreach ($penjualan1->result_array() as $i) :
            $penjualan_id = $i['penjualan_id'];
            $kode_jual = $i['kode_jual'];
            $customer_name = $i['customer_name'];
            $employee_name = $i['employee_name'];
            $sale_date = $i['sale_date'];
        ?>
            <tr>

                <td style="text-align:center;"><?php echo $kode_jual; ?></td>
                <td style="text-align:center;"><?php echo $employee_name; ?></td>
                <?php
                if ($customer_name == "") {
                    $customer_name = '==Pembeli Bukan Member==';
                } else {
                    $customer_name;
                }
                ?>
                <td style="text-align:center;"><?php echo $customer_name; ?></td>
                <td style="text-align:center;"><?php echo $sale_date; ?></td>
                <?php
                $temp = 0;
                foreach ($penjualan2->result_array() as $i) {
                    $penjualan_id1 = $i['penjualan_id'];
                    $total = $i['total_price'];
                    if ($penjualan_id == $penjualan_id1) {
                        $total = $total + $temp;
                        $temp = $total;
                    }
                }
                ?>
                <td>Rp. <?php echo number_format($temp); ?>,-</td>
            </tr>
        <?php
            $x++;
        endforeach; ?>
    </table>

</html>
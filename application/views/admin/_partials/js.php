<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url('js/scripts.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url('assets/demo/chart-area-demo.js') ?>"></script>
<script src="<?php echo base_url('assets/demo/chart-bar-demo.js') ?>"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url('assets/demo/datatables-demo.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src='https://www.google.com/recaptcha/api.js' async defer ></script>

<!-- Grafik Garis Penjualan Bulanan -->
<script>
    $(function() {
        Chart.defaults.global.defaultFontFamily = 'Monserrat'; // Mengatur default s eluruh font (style)pada chart
        Chart.defaults.global.defaultFontSize = 14; // Mengatur default seluruh size font pada chart

        //Get the Line chart canvas
        var cData = JSON.parse(`<?php echo $chart_data1; ?>`); // JSON.parse = fungs i untuk mengurai data menjadi objek JavaScript
        var ctx = $("#pnjLines"); // Target canvas id dari v_chart.php

        //Line chart data
        var data = {
            labels: cData.label_tanggal,
            datasets: [{
                label: 'Buku Terjual',
                data: cData.data_jml1,
                lineTension: 0.3, // Mengatur tingkat ketegangan garis, jika di set ke 0 maka garis semakin lurus.
                borderWidth: 3, // Mengatur lebar garis (pixels)
                backgroundColor: "rgba(2,117,216,0.2)", // Mengatur warna backgroun d pada isi grafik

                borderColor: "rgba(2,117,216,1)", // Mengatur warna garis
                pointStyle: 'circle', // Mengatur style point (triangle, star, cros s, dash, rect, rectRounded,etc)
                pointRadius: 3, // Mengatur besarnya point pada garis
                pointBackgroundColor: "rgba(2,117,216,1)", // Mengatur warna point
                pointBorderColor: "rgba(255,255,255,0.8)", // Mengatur warna border point
                pointHoverRadius: 5, // Mengatur besarnya point pada garis saat dis entuh pointer mouse
                pointHoverBackgroundColor: "rgba(2,117,216,1)", // Mengatur warna b ackground point saat disentuh pointer mouse
                pointHitRadius: 50, // Mengatur radius hit point di garis saat dis entuh pointer mouse
                pointBorderWidth: 2, // Mengatur besar border untuk point
            }]
        };

        //options
        var options = {
            responsive: true,
            title: {
                display: true,
                position: "top",
                text: "Grafik Penjualan Bulan " + cData.label_bulan +" "+ cData.label_tahun,
                fontSize: 18,
                fontColor: "#111"
            },
            legend: {
                display: true,
                position: "right",
                labels: {
                    fontColor: "#333",
                    fontSize: 16,

                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit : 'month',
                        displayFormats: {
                            quarter: 'MMM D'
                        }
                    },
                    gridLines: {
                        display: false
                    },
                    scaleLabel: {
                        display: true,
                        fontStyle: 'bold',
                        labelString: 'TANGGAL'
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 0,
                        max: 100,
                        maxTicksLimit: 15
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .150)",
                    },
                    scaleLabel: {
                        display: true,
                        fontStyle: 'bold',
                        labelString: 'JUMLAH PEMBELIAN'
                    }
                }],
            },
        };
        //Create Line Chart class object
        var chart1 = new Chart(ctx, {
            type: "line", // Mengatur tipe chart yang digunakan
            data: data,
            options: options
        });
    });
</script>
<!-- Grafik Garis Penjualan -->
<script>
    $(function() {
        Chart.defaults.global.defaultFontFamily = 'Monserrat'; // Mengatur default s eluruh font (style)pada chart
        Chart.defaults.global.defaultFontSize = 14; // Mengatur default seluruh size font pada chart

        //Get the Line chart canvas
        var cData = JSON.parse(`<?php echo $chart_data; ?>`); // JSON.parse = fungs i untuk mengurai data menjadi objek JavaScript
        var ctx = $("#pnjLine"); // Target canvas id dari v_chart.php

        //Line chart data
        var data = {
            labels: cData.label_bulan,
            datasets: [{
                label: 'Buku Terjual',
                data: cData.data_jml,
                lineTension: 0.3, // Mengatur tingkat ketegangan garis, jika di set ke 0 maka garis semakin lurus.
                borderWidth: 3, // Mengatur lebar garis (pixels)
                backgroundColor: "rgba(2,117,216,0.2)", // Mengatur warna backgroun d pada isi grafik

                borderColor: "rgba(2,117,216,1)", // Mengatur warna garis
                pointStyle: 'circle', // Mengatur style point (triangle, star, cros s, dash, rect, rectRounded,etc)
                pointRadius: 3, // Mengatur besarnya point pada garis
                pointBackgroundColor: "rgba(2,117,216,1)", // Mengatur warna point
                pointBorderColor: "rgba(255,255,255,0.8)", // Mengatur warna border point
                pointHoverRadius: 5, // Mengatur besarnya point pada garis saat dis entuh pointer mouse
                pointHoverBackgroundColor: "rgba(2,117,216,1)", // Mengatur warna b ackground point saat disentuh pointer mouse
                pointHitRadius: 50, // Mengatur radius hit point di garis saat dis entuh pointer mouse
                pointBorderWidth: 2, // Mengatur besar border untuk point
            }]
        };

        //options
        var options = {
            responsive: true,
            title: {
                display: true,
                position: "top",
                text: "Grafik Penjualan Tahun " + cData.label_tahun,
                fontSize: 18,
                fontColor: "#111"
            },
            legend: {
                display: true,
                position: "right",
                labels: {
                    fontColor: "#333",
                    fontSize: 16,

                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'month',
                    },
                    gridLines: {
                        display: false
                    },
                    scaleLabel: {
                        display: true,
                        fontStyle: 'bold',
                        labelString: 'BULAN'
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 0,
                        max: 1000,
                        maxTicksLimit: 15
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .150)",
                    },
                    scaleLabel: {
                        display: true,
                        fontStyle: 'bold',
                        labelString: 'JUMLAH PENJUALAN'
                    }
                }],
            },
        };
        //Create Line Chart class object
        var chart1 = new Chart(ctx, {
            type: "line", // Mengatur tipe chart yang digunakan
            data: data,
            options: options
        });
    });
</script>
<!-- Grafik Batang Penjualan -->
<script>
    $(function() {
        Chart.defaults.global.defaultFontFamily = 'Segoe UI';
        Chart.defaults.global.defaultFontSize = 14;

        //get the bar chart canvas
        var cData = JSON.parse(`<?php echo $chart_data; ?>`);
        var ctx = $("#pnjBar");

        //bar chart data
        var data = {
            labels: cData.label_bulan,
            datasets: [{
                label: 'Buku Terjual',
                data: cData.data_jml,
                backgroundColor: [ // Warna background pada batang grafik
                    "#DEB887",
                    "#A9A9A9",
                    "#DC143C",
                    "#F4A460",
                    "#2E8B57",
                    "#1D7A46",
                    "#CDA776",
                    "#CDA776",
                    "#989898",
                    "#CB252B",
                    "#E39371",
                ],
                borderColor: [ // Warna border pada batang grafik
                    "#CDA776",
                    "#989898",
                    "#CB252B",
                    "#E39371",
                    "#1D7A46",
                    "#F4A460",
                    "#CDA776",
                    "#DEB887",
                    "#A9A9A9",
                    "#DC143C",
                    "#F4A460",
                    "#2E8B57",
                ],
                borderWidth: [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1] // Lebar border pada batang grafik
            }]
        };
        //options
        var options = {
            responsive: true,
            title: {
                display: true,
                position: "top",
                text: "Grafik Penjualan Tahun " + cData.label_tahun,
                fontSize: 18,
                fontColor: "#111"
            },
            legend: {
                display: false,
                position: "right",
                labels: {
                    fontColor: "#333",
                    fontSize: 16
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'month'
                    },
                    gridLines: {
                        display: false
                    },
                    scaleLabel: {
                        display: true,
                        fontStyle: 'bold',
                        labelString: 'Bulan'
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 0,
                        max: 1000,
                        maxTicksLimit: 10
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .150)",
                    },
                    scaleLabel: {
                        display: true,
                        fontStyle: 'bold',
                        labelString: 'Jumlah Penjualan'
                    }
                }],
            },
        };

        //Create Bar Chart class object
        var chart1 = new Chart(ctx, {
            type: "bar",
            data: data,
            options: options
        });
    });
</script>

<!-- Download as Image - Line Chart -->
<script>
    function downloadLine() {
        var download = document.getElementById("download");
        var image = document.getElementById("pnjLine").toDataURL("image/jpg")
            .replace("image/jpg", "image/octet-stream");
        download.setAttribute("href", image);
    }
</script>
<!-- Download as Image - Line Chart -->
<script>
    function downloadLine3() {
        var download = document.getElementById("download");
        var image = document.getElementById("pnjLines").toDataURL("image/jpg")
            .replace("image/jpg", "image/octet-stream");
        download.setAttribute("href", image);
    }
</script>
<!-- Download as Image - Bar Chart -->
<script>
    function downloadBar() {
        var download = document.getElementById("download1");
        var image = document.getElementById("pnjBar").toDataURL("image/jpg", 1.0)
            .replace("image/jpg", "image/octet-stream");
        download.setAttribute("href", image);
    }
</script>

<!-- Download as PDF - Line Chart -->
<script type="text/javascript">
    function LinePDF() 
    {
        html2canvas(document.getElementById("pnjLine"), 
        {
            onrendered: function(canvas) 
            {
                var img = canvas.toDataURL("image/png", 1.0); // mengkonversi grafik di canvas menjadi image (png)
                var doc = new jsPDF('p', 'pt', 'a4'); // membuat dokumen pdf dengan jsPDF('orientation p = portrait', 'size unit', 'format kertas')
                // Mengatur size image agar sesuai format kertas a4[595.28,841.89] dalam size unit points (pt)
                var lebarKonten = canvas.width;
                var tinggiKonten = canvas.height;
                var tinggiPage = lebarKonten / 592.28 * 841.89;
                var leftHeight = tinggiKonten;
                var position = 0;
                var imgWidth = 595.28;
                var imgHeight = 592.28 / lebarKonten * tinggiKonten;
                if (leftHeight < tinggiPage) 
                {
                    doc.addImage(img, 'PNG', 0, 0, imgWidth, imgHeight);
                } else {
                    while (leftHeight > 0) {
                        doc.addImage(img, 'PNG', 0, position, imgWidth, imgHeight)
                        leftHeight -= tinggiPage;
                        position -= 841.89;
                        //Avoid adding blank pages
                        if (leftHeight > 0) {
                            pdf.addPage();
                        }
                    }
                }
                doc.save('LineChart_Penjualan.pdf'); //Download the rendered PDF.
            }
        });
    }
</script>
<!-- Download as PDF - Line Chart BULANAN -->
<script type="text/javascript">
    function LinesPDF() 
    {
        html2canvas(document.getElementById("pnjLines"), 
        {
            onrendered: function(canvas) 
            {
                var img = canvas.toDataURL("image/png", 1.0); // mengkonversi grafik di canvas menjadi image (png)
                var doc = new jsPDF('p', 'pt', 'a4'); // membuat dokumen pdf dengan jsPDF('orientation p = portrait', 'size unit', 'format kertas')
                // Mengatur size image agar sesuai format kertas a4[595.28,841.89] dalam size unit points (pt)
                var lebarKonten = canvas.width;
                var tinggiKonten = canvas.height;
                var tinggiPage = lebarKonten / 592.28 * 841.89;
                var leftHeight = tinggiKonten;
                var position = 0;
                var imgWidth = 595.28;
                var imgHeight = 592.28 / lebarKonten * tinggiKonten;
                if (leftHeight < tinggiPage) 
                {
                    doc.addImage(img, 'PNG', 0, 0, imgWidth, imgHeight);
                } else {
                    while (leftHeight > 0) {
                        doc.addImage(img, 'PNG', 0, position, imgWidth, imgHeight)
                        leftHeight -= tinggiPage;
                        position -= 841.89;
                        //Avoid adding blank pages
                        if (leftHeight > 0) {
                            pdf.addPage();
                        }
                    }
                }
                doc.save('LineChartBulanan_Penjualan.pdf'); //Download the rendered PDF.
            }
        });
    }
</script>
<!-- Download as PDF - Line Chart -->
<script type="text/javascript">
    function BarPDF() 
    {
        html2canvas(document.getElementById("pnjBar"), 
        {
            onrendered: function(canvas) 
            {
                var img = canvas.toDataURL("image/png", 1.0); // mengkonversi grafik di canvas menjadi image (png)
                var doc = new jsPDF('p', 'pt', 'a4'); // membuat dokumen pdf dengan jsPDF('orientation p = portrait', 'size unit', 'format kertas')
                // Mengatur size image agar sesuai format kertas a4[595.28,841.89] dalam size unit points (pt)
                var lebarKonten = canvas.width;
                var tinggiKonten = canvas.height;
                var tinggiPage = lebarKonten / 592.28 * 841.89;
                var leftHeight = tinggiKonten;
                var position = 0;
                var imgWidth = 595.28;
                var imgHeight = 592.28 / lebarKonten * tinggiKonten;
                if (leftHeight < tinggiPage) 
                {
                    doc.addImage(img, 'PNG', 0, 0, imgWidth, imgHeight);
                } else {
                    while (leftHeight > 0) {
                        doc.addImage(img, 'PNG', 0, position, imgWidth, imgHeight)
                        leftHeight -= tinggiPage;
                        position -= 841.89;
                        //Avoid adding blank pages
                        if (leftHeight > 0) {
                            pdf.addPage();
                        }
                    }
                }
                doc.save('BarChart_Penjualan.pdf'); //Download the rendered PDF.
            }
        });
    }
</script>
<!-- Grafik Garis Pembelian Bulanan -->
<script>
    $(function() {
        Chart.defaults.global.defaultFontFamily = 'Monserrat'; // Mengatur default seluruh font (style)pada chart
        Chart.defaults.global.defaultFontSize = 14; // Mengatur default seluruh size font pada chart

        //Get the Line chart canvas
        var cData = JSON.parse(`<?php echo $chart_data1; ?>`); // JSON.parse = fungsi untuk mengurai data menjadi objek JavaScript
        var ctx = $("#pmbLineBulan"); // Target canvas id dari v_chart.php

        //Line chart data
        var data = {
            labels: cData.label_tanggal,
            datasets: [{
                label: 'Buku Terkirim',
                data: cData.data_jml1,
                lineTension: 0.3, // Mengatur tingkat ketegangan garis, jika di set ke 0 maka garis semakin lurus.
                borderWidth: 3, // Mengatur lebar garis (pixels)
                backgroundColor: "rgba(2,117,216,0.2)", // Mengatur warna backgroun d pada isi grafik

                borderColor: "rgba(2,117,216,1)", // Mengatur warna garis
                pointStyle: 'circle', // Mengatur style point (triangle, star, cros s, dash, rect, rectRounded,etc)
                pointRadius: 3, // Mengatur besarnya point pada garis
                pointBackgroundColor: "rgba(2,117,216,1)", // Mengatur warna point
                pointBorderColor: "rgba(255,255,255,0.8)", // Mengatur warna border point
                pointHoverRadius: 5, // Mengatur besarnya point pada garis saat dis entuh pointer mouse
                pointHoverBackgroundColor: "rgba(2,117,216,1)", // Mengatur warna b ackground point saat disentuh pointer mouse
                pointHitRadius: 50, // Mengatur radius hit point di garis saat dis entuh pointer mouse
                pointBorderWidth: 2, // Mengatur besar border untuk point
            }]
        };

        //options
        var options = {
            responsive: true,
            title: {
                display: true,
                position: "top",
                text: "Grafik Pembelian Bulan " + cData.label_bulan +" "+ cData.label_tahun,
                fontSize: 18,
                fontColor: "#111"
            },
            legend: {
                display: true,
                position: "right",
                labels: {
                    fontColor: "#333",
                    fontSize: 16,

                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit : 'month',
                        displayFormats: {
                            quarter: 'MMM D'
                        }
                    },
                    gridLines: {
                        display: false
                    },
                    scaleLabel: {
                        display: true,
                        fontStyle: 'bold',
                        labelString: 'TANGGAL'
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 0,
                        max: 100,
                        maxTicksLimit: 15
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .150)",
                    },
                    scaleLabel: {
                        display: true,
                        fontStyle: 'bold',
                        labelString: 'JUMLAH PEMBELIAN'
                    }
                }],
            },
        };
        //Create Line Chart class object
        var chart1 = new Chart(ctx, {
            type: "line", // Mengatur tipe chart yang digunakan
            data: data,
            options: options
        });
    });
</script>
<!-- Grafik Garis Pembelian -->
<script>
    $(function() {
        Chart.defaults.global.defaultFontFamily = 'Monserrat'; // Mengatur default s eluruh font (style)pada chart
        Chart.defaults.global.defaultFontSize = 14; // Mengatur default seluruh size font pada chart

        //Get the Line chart canvas
        var cData = JSON.parse(`<?php echo $chart_data; ?>`); // JSON.parse = fungs i untuk mengurai data menjadi objek JavaScript
        var ctx = $("#pmbLine"); // Target canvas id dari v_chart.php

        //Line chart data
        var data = {
            labels: cData.label_bulan,
            datasets: [{
                label: 'Buku Terkirim',
                data: cData.data_jml,
                lineTension: 0.3, // Mengatur tingkat ketegangan garis, jika di set ke 0 maka garis semakin lurus.
                borderWidth: 3, // Mengatur lebar garis (pixels)
                backgroundColor: "rgba(2,117,216,0.2)", // Mengatur warna backgroun d pada isi grafik

                borderColor: "rgba(2,117,216,1)", // Mengatur warna garis
                pointStyle: 'circle', // Mengatur style point (triangle, star, cros s, dash, rect, rectRounded,etc)
                pointRadius: 3, // Mengatur besarnya point pada garis
                pointBackgroundColor: "rgba(2,117,216,1)", // Mengatur warna point
                pointBorderColor: "rgba(255,255,255,0.8)", // Mengatur warna border point
                pointHoverRadius: 5, // Mengatur besarnya point pada garis saat dis entuh pointer mouse
                pointHoverBackgroundColor: "rgba(2,117,216,1)", // Mengatur warna b ackground point saat disentuh pointer mouse
                pointHitRadius: 50, // Mengatur radius hit point di garis saat dis entuh pointer mouse
                pointBorderWidth: 2, // Mengatur besar border untuk point
            }]
        };

        //options
        var options = {
            responsive: true,
            title: {
                display: true,
                position: "top",
                text: "Grafik Pembelian Tahun " + cData.label_tahun,
                fontSize: 18,
                fontColor: "#111"
            },
            legend: {
                display: true,
                position: "right",
                labels: {
                    fontColor: "#333",
                    fontSize: 16,

                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'month',
                    },
                    gridLines: {
                        display: false
                    },
                    scaleLabel: {
                        display: true,
                        fontStyle: 'bold',
                        labelString: 'BULAN'
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 0,
                        max: 1000,
                        maxTicksLimit: 15
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .150)",
                    },
                    scaleLabel: {
                        display: true,
                        fontStyle: 'bold',
                        labelString: 'JUMLAH PEMBELIAN'
                    }
                }],
            },
        };
        //Create Line Chart class object
        var chart1 = new Chart(ctx, {
            type: "line", // Mengatur tipe chart yang digunakan
            data: data,
            options: options
        });
    });
</script>
<!-- Grafik Batang Pembelian -->
<script>
    $(function() {
        Chart.defaults.global.defaultFontFamily = 'Segoe UI';
        Chart.defaults.global.defaultFontSize = 14;

        //get the bar chart canvas
        var cData = JSON.parse(`<?php echo $chart_data; ?>`);
        var ctx = $("#pmbBar");

        //bar chart data
        var data = {
            labels: cData.label_bulan,
            datasets: [{
                label: 'Buku Terkirim',
                data: cData.data_jml,
                backgroundColor: [ // Warna background pada batang grafik
                    "#DEB887",
                    "#A9A9A9",
                    "#DC143C",
                    "#F4A460",
                    "#2E8B57",
                    "#1D7A46",
                    "#CDA776",
                    "#CDA776",
                    "#989898",
                    "#CB252B",
                    "#E39371",
                ],
                borderColor: [ // Warna border pada batang grafik
                    "#CDA776",
                    "#989898",
                    "#CB252B",
                    "#E39371",
                    "#1D7A46",
                    "#F4A460",
                    "#CDA776",
                    "#DEB887",
                    "#A9A9A9",
                    "#DC143C",
                    "#F4A460",
                    "#2E8B57",
                ],
                borderWidth: [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1] // Lebar border pada batang grafik
            }]
        };
        //options
        var options = {
            responsive: true,
            title: {
                display: true,
                position: "top",
                text: "Grafik Pembelian Tahun " + cData.label_tahun,
                fontSize: 18,
                fontColor: "#111"
            },
            legend: {
                display: false,
                position: "right",
                labels: {
                    fontColor: "#333",
                    fontSize: 16
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'month'
                    },
                    gridLines: {
                        display: false
                    },
                    scaleLabel: {
                        display: true,
                        fontStyle: 'bold',
                        labelString: 'Bulan'
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 0,
                        max: 1000,
                        maxTicksLimit: 10
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .150)",
                    },
                    scaleLabel: {
                        display: true,
                        fontStyle: 'bold',
                        labelString: 'Jumlah Pembelian'
                    }
                }],
            },
        };

        //Create Bar Chart class object
        var chart1 = new Chart(ctx, {
            type: "bar",
            data: data,
            options: options
        });
    });
</script>
<!-- Download as Image - Line Chart Month-->
<script>
    function downloadLine2() {
        var download = document.getElementById("download2");
        var image = document.getElementById("pmbLineBulan").toDataURL("image/jpg", 1.0)
            .replace("image/jpg", "image/octet-stream");
        download.setAttribute("href", image);
    }
</script>
<!-- Download as Image - Line Chart -->
<script>
    function downloadLine1() {
        var download = document.getElementById("download");
        var image = document.getElementById("pmbLine").toDataURL("image/jpg", 1.0)
            .replace("image/jpg", "image/octet-stream");
        download.setAttribute("href", image);
    }
</script>
<!-- Download as Image - Bar Chart -->
<script>
    function downloadBar1() {
        var download = document.getElementById("download1");
        var image = document.getElementById("pmbBar").toDataURL("image/jpg", 1.0)
            .replace("image/jpg", "image/octet-stream");
        download.setAttribute("href", image);
    }
</script>

<!-- Download as PDF - Line Chart BUlan -->
<script type="text/javascript">
    function LinePDF2() 
    {
        html2canvas(document.getElementById("pmbLineBulan"), 
        {
            onrendered: function(canvas) 
            {
                var img = canvas.toDataURL("image/png", 1.0); // mengkonversi grafik di canvas menjadi image (png)
                var doc = new jsPDF('p', 'pt', 'a4'); // membuat dokumen pdf dengan jsPDF('orientation p = portrait', 'size unit', 'format kertas')
                // Mengatur size image agar sesuai format kertas a4[595.28,841.89] dalam size unit points (pt)
                var lebarKonten = canvas.width;
                var tinggiKonten = canvas.height;
                var tinggiPage = lebarKonten / 592.28 * 841.89;
                var leftHeight = tinggiKonten;
                var position = 0;
                var imgWidth = 595.28;
                var imgHeight = 592.28 / lebarKonten * tinggiKonten;
                if (leftHeight < tinggiPage) 
                {
                    doc.addImage(img, 'PNG', 0, 0, imgWidth, imgHeight);
                } else {
                    while (leftHeight > 0) {
                        doc.addImage(img, 'PNG', 0, position, imgWidth, imgHeight)
                        leftHeight -= tinggiPage;
                        position -= 841.89;
                        //Avoid adding blank pages
                        if (leftHeight > 0) {
                            pdf.addPage();
                        }
                    }
                }
                doc.save('LineChartBulanan_Pembelian.pdf'); //Download the rendered PDF.
            }
        });
    }
</script>
<!-- Download as PDF - Line Chart -->
<script type="text/javascript">
    function LinePDF1() 
    {
        html2canvas(document.getElementById("pmbLine"), 
        {
            onrendered: function(canvas) 
            {
                var img = canvas.toDataURL("image/png", 1.0); // mengkonversi grafik di canvas menjadi image (png)
                var doc = new jsPDF('p', 'pt', 'a4'); // membuat dokumen pdf dengan jsPDF('orientation p = portrait', 'size unit', 'format kertas')
                // Mengatur size image agar sesuai format kertas a4[595.28,841.89] dalam size unit points (pt)
                var lebarKonten = canvas.width;
                var tinggiKonten = canvas.height;
                var tinggiPage = lebarKonten / 592.28 * 841.89;
                var leftHeight = tinggiKonten;
                var position = 0;
                var imgWidth = 595.28;
                var imgHeight = 592.28 / lebarKonten * tinggiKonten;
                if (leftHeight < tinggiPage) 
                {
                    doc.addImage(img, 'PNG', 0, 0, imgWidth, imgHeight);
                } else {
                    while (leftHeight > 0) {
                        doc.addImage(img, 'PNG', 0, position, imgWidth, imgHeight)
                        leftHeight -= tinggiPage;
                        position -= 841.89;
                        //Avoid adding blank pages
                        if (leftHeight > 0) {
                            pdf.addPage();
                        }
                    }
                }
                doc.save('LineChart_Pembelian.pdf'); //Download the rendered PDF.
            }
        });
    }
</script>

<!-- Download as PDF - Line Chart -->
<script type="text/javascript">
    function BarPDF1() 
    {
        html2canvas(document.getElementById("pmbBar"), 
        {
            onrendered: function(canvas) 
            {
                var img = canvas.toDataURL("image/png", 1.0); // mengkonversi grafik di canvas menjadi image (png)
                var doc = new jsPDF('p', 'pt', 'a4'); // membuat dokumen pdf dengan jsPDF('orientation p = portrait', 'size unit', 'format kertas')
                // Mengatur size image agar sesuai format kertas a4[595.28,841.89] dalam size unit points (pt)
                var lebarKonten = canvas.width;
                var tinggiKonten = canvas.height;
                var tinggiPage = lebarKonten / 592.28 * 841.89;
                var leftHeight = tinggiKonten;
                var position = 0;
                var imgWidth = 595.28;
                var imgHeight = 592.28 / lebarKonten * tinggiKonten;
                if (leftHeight < tinggiPage) 
                {
                    doc.addImage(img, 'PNG', 0, 0, imgWidth, imgHeight);
                } else {
                    while (leftHeight > 0) {
                        doc.addImage(img, 'PNG', 0, position, imgWidth, imgHeight)
                        leftHeight -= tinggiPage;
                        position -= 841.89;
                        //Avoid adding blank pages
                        if (leftHeight > 0) {
                            pdf.addPage();
                        }
                    }
                }
                doc.save('BarChart_Pembelian.pdf'); //Download the rendered PDF.
            }
        });
    }
</script>
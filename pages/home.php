<?php 
require_once './koneksi.php';

$jp = mysqli_query($conn,"SELECT * FROM tb_penumpang");
$hitung = mysqli_num_rows($jp);
$ja = mysqli_query($conn,"SELECT * FROM tb_data_maskapai");
$hitunga = mysqli_num_rows($ja);
$jb = mysqli_query($conn,"SELECT * FROM tb_detail_keberangkatan");
$hitungb = mysqli_num_rows($jb);

$bulan = mysqli_query($conn, "SELECT tgl_keberangkatan FROM tb_detail_keberangkatan GROUP by MONTH(tgl_keberangkatan) Order BY year(tgl_keberangkatan)");
$perbulan=mysqli_query($conn,"SELECT COUNT(*) AS jumlah_bulanan FROM tb_detail_keberangkatan GROUP BY MONTH(tgl_keberangkatan) Order By year(tgl_keberangkatan) ");



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="row g-3 my-2">

        <div class="col-md-3 mx-auto" data-tilt>
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2"><?= $hitunga ?></h3>
                    <p class="fs-5">Jumlah Maskapai</p>
                </div>
                <i class="fas fa-plane fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>

        <div class="col-md-3 mx-auto" data-tilt>
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2"><?= $hitung ?></h3>
                    <p class="fs-5">Total Penumpang</p>
                </div>
                <i
                    class="fas fa-users fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>

        <div class="col-md-3 mx-auto" data-tilt>
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2"><?= $hitungb ?></h3>
                    <p class="fs-5">Jumlah Keberangkatan</p>
                </div>
                <i class="fas fa-plane-departure fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>
    </div>
    <div class="row g-3 my-2 mx-5 bg-white shadow-sm rounded" style="width:65%;" data-tilt>
        <canvas id="myChart" ></canvas>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
    <script>
        const labels =  [<?php while ($b = mysqli_fetch_array($bulan)) { 
            echo '"' . $b['tgl_keberangkatan'] . '",';
            }?>];
        const data = {
        labels: labels,
        datasets: [{
            label: 'Statistik Keberangkatan 4Group Airport',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [
                <?php while ($p = mysqli_fetch_array($perbulan)) { echo '"' . $p['jumlah_bulanan'] . '",';} ?>
            ],
            borderColor: 'rgb(75, 192, 192)',
            backgroundColor:'white'
        }]
        };
        const config = {
        type: 'line',
        data: data,
        options: {
            plugins:{
                legend:{
                    display:false
                },
                title:{
                    display:true,
                    text : 'Statistik Keberangkatan 4Group Airport'
                }
            }
        }
        };
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );  
    </script>
    <script type="text/javascript" src="./assets/vanilla-tilt.min.js"></script>
</body>
</html>


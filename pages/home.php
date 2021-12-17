<?php 
require_once './koneksi.php';

$jp = mysqli_query($conn,"SELECT * FROM tb_penumpang");
$hitung = mysqli_num_rows($jp);


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
                    <h3 class="fs-2">0</h3>
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
                    <h3 class="fs-2">0</h3>
                    <p class="fs-5">Jumlah Keberangkatan</p>
                </div>
                <i class="fas fa-plane-departure fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>
    </div>
    <div class="row g-3 my-2 mx-5 bg-white shadow-sm rounded" style="width:65%;" data-tilt>
        <canvas id="myChart"></canvas>

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
            echo '"' . $b['tanggal'] . '",';
            }?>];
        const data = {
        labels: labels,
        datasets: [{
            label: 'Statistik Portal Berita STMIK Palangkaraya',
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
                    text : 'Statistik Portal Berita STMIK Palangkaraya'
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


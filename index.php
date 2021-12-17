<?php 
require_once 'pages/fungsi-login.php';
error_reporting(0);
session_start();

if(!isset($_SESSION["submit"])) {
    header("Location:pages/index.php");
    exit;
}

$result = mysqli_query($conn,"SELECT nama_pengguna FROM user WHERE username = '$_SESSION[username]'");
$data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="assets/package/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="css/style.css" />
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white shadow" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fas fa-plane me-2"></i>4Group Airport</div>
            <div class="list-group list-group-flush my-3">
                <a href="index.php" id="active" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="index.php?p=tb-keberangkatan" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-plane-departure me-2"></i>Keberangkatan</a>
                <a href="index.php?p=tb-penumpang"  <?php if ($_GET["p"] == "tb-penumpang") echo "id ='active'";?> class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-users me-2"></i>Penumpang</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-plane me-2"></i>Maskapai</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-user-secret me-2"></i> Pilot</a>
                <a href="index.php?p=tb-login" <?php if ($_GET["p"] == "tb-login") echo "id ='active'";?>  class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-user me-2"></i> Pengguna</a>
                <a href="pages/logout.php" onclick="return confirm('Apakah anda ingin Keluar ??');" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link text-danger  fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">Selamat Datang, 
                                <?php echo $data['nama_pengguna']; ?>
                            </a>
                            <!-- <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="login/logout.php" onclick="return confirm('Apakah anda ingin Keluar ??');">Logout</a></li>
                            </ul> -->
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4">
            <?php
                $page_dir = 'pages';
                if(!empty ($_GET ['p'])) {
                    $page = scandir ($page_dir, 0);
                    unset($page[0], $page[1]);
                    $p = $_GET['p'];
                    if (in_array($p. '.php', $page)) {
                    include($page_dir . '/' . $p . '.php');
                    } else {
                    include($page_dir . '/error.php');
                    }
                }else{
                    include($page_dir . '/home.php');
                }
            ?>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
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
    <script type="text/javascript" src="assets/vanilla-tilt.min.js"></script>

</body>

</html>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
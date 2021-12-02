<?php 
require 'fungsi.php';
if(isset($_POST["submit"])) {
    if(regis($_POST) > 0) {
        echo "
                <script>
                    alert('Registrasi Berhasil');
                    document.location.href = 'index.php';
                </script>
            ";
    }else{
        echo "
                <script>
                    alert(Registrasi Gagal);
                </script>
            ";
    }

}
?>

<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Registrasi</title>
    </head>
    <body>
        <div class="global-container">
            <div class="card login-form">
                <div class="card-body">
                    <h1 class="card-title text-center">R E G I S T R A S I</h1>
                </div>
                <div class="card-text">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="exampleInputText" class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" id="exampleInputText" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Username</label>
                            <input type="username" name="username" class="form-control" id="exampleInputUsername1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Konfirmasi Password</label>
                            <input type="password" name="password2" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" name="submit" class="btn btn-primary">Registrasi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </body>
</html>
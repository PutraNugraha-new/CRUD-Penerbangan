<?php 
session_start();
require_once 'fungsi-login.php';

if(isset($_SESSION["submit"])) {
    header("Location:../index.php");
}

if(isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username'");
    $data = mysqli_fetch_array($result);
    $nama[] = $data;
    if($data){
        if(($username == $data['username']) && ($password == $data['password'])) {
            $_SESSION["username"] = $username;
            $_SESSION["submit"] = true;
            header("Location:../index.php");
        }else{
            echo "
                    <script>
                        alert('Username atau Password salah');
                    </script>
                ";
        }
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

    <title>Login</title>
    </head>
    <body>
        <div class="global-container">
            <div class="card login-form shadow">
                <div class="card-body">
                    <h1 class="card-title text-center">STMIK AIRPORT</h1>
                </div>
                <div class="card-text">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Username</label>
                            <input type="username" name="username" class="form-control" id="exampleInputUsername1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" name="submit" class="btn btn-primary">L O G I N</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </body>
</html>
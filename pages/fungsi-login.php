<?php 
$conn = mysqli_connect("localhost","root","","tiket_pesawat");

// function login
function regis($isi) {
    global $conn;

    $username = strtolower(stripslashes($isi["username"]));
    $password = mysqli_real_escape_string($conn,$isi["password"]);
    $password2 = mysqli_real_escape_string($conn,$isi["password2"]);
    $nama = htmlspecialchars($isi["nama_pengguna"]);

    // cek kesamaan username yang ada di database
    $result = mysqli_query($conn,"SELECT username FROM user WHERE username='$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "
                <script>
                    alert ('Username Telah Dipakai');
                </script>
            ";
        return false;
    }
        // cek konfirmasi password
        if($password !== $password2) {
            echo "
                    <script>
                        alert('Konfirmasi Password Salah !!');
                    </script>
                ";
            return false;
        }
         // enkripsi password
        // $password = password_hash($password,PASSWORD_DEFAULT);

    // insert data ke datbase
    mysqli_query($conn,"INSERT INTO user VALUES
                ('$username','$password','$nama')");
    
    return mysqli_affected_rows($conn);
}

function tampil($data) {
    global $conn;

    $result = mysqli_query($conn,$data);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}



?>
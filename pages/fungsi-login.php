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

if (isset($_POST['edit-akun'])) {
	$username = $_POST['username'];
	$nama					= $_POST['nama_pengguna'];
	$password				= $_POST['password'];
	$queryEdit = mysqli_query($conn, "UPDATE user SET nama_pengguna='$nama', password='$password' WHERE username = '$username' ");

	$_SESSION["sukses-edit"] = 'Data Berhasil Diedit';

	if ($queryEdit) {
		header("location: index.php?p=tb-login");
	} else {
		echo "ERROR, Tidak Berhasil Edit Data " . mysqli_error($koneksi);
	}
}

if (isset($_GET['username'])) {
	$username = $_GET['username'];

	$queryHapus = mysqli_query($conn, "DELETE FROM user WHERE username = '$username'");

	$_SESSION["sukses-hapus"] = 'Data Berhasil Dihapus';

	if ($queryHapus == true) {
		header("location: index.php?p=tb-login");
	} else {
		echo "ERROR, Tidak Berhasil Hapus Data " . mysqli_error($koneksi);
	}
}


?>
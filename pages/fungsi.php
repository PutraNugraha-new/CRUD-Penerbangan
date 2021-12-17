<?php
session_start();
include '../koneksi.php';


$id_penumpang       =$_POST['id_penumpang'];
$nama_penumpang     =$_POST['nama_penumpang'];
$email_penumpang    =$_POST['email_penumpang'];
$kelas_penerbangan  =$_POST['kelas_penerbangan'];
$jumlah_bagasi      =$_POST['jumlah_bagasi'];
$tgl_keberangkatan  =$_POST['tgl_keberangkatan'];


function tampilkan($data) {
    global $conn;

    $result =mysqli_query($conn,$data);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// fungsi penumpang
if ($_POST['tambah-penumpang']) {
	$queryTambah = mysqli_query($conn, "INSERT INTO tb_penumpang VALUES('', '$nama_penumpang', '$email_penumpang', '$kelas_penerbangan','$jumlah_bagasi','$tgl_keberangkatan')");

	$_SESSION["sukses-tambah"] = 'Data Berhasil Disimpan';

	if ($queryTambah) {
		echo "
            <script> window.location='index.php?p=tb-penumpang';</script>
            ";
	} else {
		echo "ERROR, Tidak Berhasil Tambah Data " . mysqli_error($conn);
	}
}

if(isset($_POST['edit-penumpang'])){
    $queryEdit = mysqli_query($conn,"UPDATE tb_penumpang SET nama_penumpang='$nama_penumpang',email_penumpang='$email_penumpang',kelas_penerbangan='$kelas_penerbangan'
     WHERE id_penumpang='$id_penumpang'") ;

    $_SESSION["sukses-edit"]='yey,data anda berhasil diedit!';
    
    if($queryEdit){
        echo "
            <script> window.location.href='index.php?p=tb-penumpang';</script>
            ";
    }else{
        echo "ERROR,yah data anda tidak berhasil diedit".mysqli_error($conn);
    }
}

if(isset($_GET['id-penumpang'])){
    $id_penumpang=$_GET['id-penumpang'];
    $queryHapus=mysqli_query($conn,"DELETE FROM tb_penumpang WHERE id_penumpang='$id_penumpang'");
    $_SESSION["sukses-hapus"]='yey,data anda berhasil dihapus!';
    if($queryHapus){
        echo "
            <script> window.location.href='index.php?p=tb-penumpang';</script>
            ";
    }else{
        echo "ERROR,yah data anda tidak berhasil dihapus".mysqli_error($conn);
    }
}

function cari($keyword) {
    $query = "SELECT * FROM tb_penumpang WHERE
                nama_penumpang LIKE '%$keyword%' OR
                email_penumpang LIKE '%$keyword%' OR
                kelas_penerbangan LIKE '%$keyword%' OR
                jumlah_bagasi LIKE '%$keyword%' OR
                tgl_keberangkatan LIKE '%$keyword%'
    ";
    return tampil($query);  
}

// fungsi keberangkatan
function cari_keberangkatan($keyword) {
    $query = "SELECT * FROM tb_detail_keberangkatan WHERE
                nama_maskapai LIKE '%$keyword%' OR
                tgl_keberangkatan LIKE '%$keyword%'
    ";
    return tampil($query);  
}

?>
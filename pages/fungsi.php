<?php
session_start();
include '../koneksi.php';


$id_penumpang       =$_POST['id_penumpang'];
$nama_penumpang     =$_POST['nama_penumpang'];
$email_penumpang    =$_POST['email_penumpang'];
$kelas_penerbangan  =$_POST['kelas_penerbangan'];
$jumlah_bagasi      =$_POST['jumlah_bagasi'];
$tgl_keberangkatan  =$_POST['tgl_keberangkatan'];

$id_keberangkatan   =$_POST['id_keberangkatan'];
$nama_maskapai      =$_POST['nama_maskapai'];
$tgll_keberangkatan  =$_POST['tgl_keberangkatan'];

$id_pilot               = $_POST['id_pilot'];
$nama_pilot             = $_POST['nama_pilot'];
$asal_maskapai          = $_POST['asal_maskapai'];


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

if ($_POST['tambah-keberangkatan']) {
    $queryTambah = mysqli_query($conn, "INSERT INTO tb_detail_keberangkatan VALUES('','$nama_maskapai','$tgll_keberangkatan')");

    $_SESSION["sukses-tambah"] = 'Data Berhasil Disimpan';

    if ($queryTambah) {
        echo " <script>
                    window.location='index.php?p=tb-keberangkatan';
                </script>
            ";
    } else {
        echo "ERROR, Tidak Berhasil Tambah Data " . mysqli_error($conn);
    }
}

if (isset($_POST['edit-keberangkatan'])) {
    $queryEdit = mysqli_query($conn, " UPDATE tb_detail_keberangkatan SET nama_maskapai='$nama_maskapai', tgl_keberangkatan='$tgll_keberangkatan' WHERE id_keberangkatan= '$id_keberangkatan' ");

    $_SESSION["sukses-edit"]='yey,data anda berhasil diedit!';
    
    if ($queryEdit) {
        echo " <script>
                    window.location='index.php?p=tb-keberangkatan';
                </script>
            ";
    } else {
        echo "ERROR, Tidak Berhasil edit Data " . mysqli_error($conn);
    }
}

if (isset($_GET['id-keberangkatan'])) {
    $id_keberangkatan =  $_GET['id-keberangkatan'];

    $queryHapus = mysqli_query($conn, "DELETE FROM tb_detail_keberangkatan WHERE id_keberangkatan= '$id_keberangkatan' ");
    $_SESSION["sukses-hapus"]='yey,data anda berhasil dihapus!';
    
    if ($queryHapus) {
        echo " <script>
                    window.location='index.php?p=tb-keberangkatan';
                </script>
            ";
    } else {
        echo "ERROR, Tidak Berhasil Tambah Data " . mysqli_error($conn);
    }
} 

// fungsi pilot
function cari_pilot($keyword) {
    $query = "SELECT * FROM tb_data_pilot WHERE
                nama_pilot LIKE '%$keyword%' OR
                asal_maskapai LIKE '%$keyword%'
    ";
    return tampil($query);  
}

if ($_POST['tambah-pilot']) {
    $queryTambah = mysqli_query($conn, "INSERT INTO tb_data_pilot VALUES('','$nama_pilot','$asal_maskapai')");
    
    $_SESSION["sukses-tambah"] = 'Data Berhasil Disimpan';

    if ($queryTambah) {
        echo " <script>
                    window.location='index.php?p=tb-pilot';
                </script>
            ";
    } else {
        echo "ERROR, Tidak Berhasil Tambah Data " . mysqli_error($conn);
    }
}
if (isset($_POST['edit-pilot'])) {
    $queryEdit = mysqli_query($conn, " UPDATE tb_data_pilot SET nama_pilot='$nama_pilot', asal_maskapai='$asal_maskapai' WHERE id_pilot= '$id_pilot' ");

    $_SESSION["sukses-edit"]='yey,data anda berhasil diedit!';
    
    if ($queryEdit) {
        echo " <script>
                    window.location='index.php?p=tb-pilot';
                </script>
            ";
    } else {
        echo "ERROR, Tidak Berhasil edit Data " . mysqli_error($conn);
    }
}
if (isset($_GET['id-pilot'])) {
    $id_pilot =  $_GET['id-pilot'];

    $queryHapus = mysqli_query($conn, "DELETE FROM tb_data_pilot WHERE id_pilot= '$id_pilot' ");
    $_SESSION["sukses-hapus"]='yey,data anda berhasil dihapus!';
    
    if ($queryHapus) {
        echo " <script>
                    window.location='index.php?p=tb-pilot';
                </script>
            ";
    } else {
        echo "ERROR, Tidak Berhasil Tambah Data " . mysqli_error($conn);
    }
}


?>
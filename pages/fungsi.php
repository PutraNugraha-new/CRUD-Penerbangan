<?php
include '../koneksi.php';

$id_penumpang       =$_POST['id_penumpang'];
$nama_penumpang     =$_POST['nama_penumpang'];
$email_penumpang    =$_POST['email_penumpang'];
$kelas_penerbangan  =$_POST['kelas_penerbangan'];
$jumlah_bagasi      =$_POST['jumlah_bagasi'];
$tgl_keberangkatan  =$_POST['tgl_keberangkatan'];

// fungsi penumpang



function tampilkan($data) {
    global $conn;

    $result =mysqli_query($conn,$data);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


if($_POST['tambah-penumpang']){
    $queryTambah = mysqli_query($conn,"INSERT INTO tb_data_penumpang VALUES('','$nama_penumpang','$email_penumpang',
    '$kelas_penerbangan','$jumlah_bagasi','$tgl_keberangkatan')");
    // $_SESSION["sukses-tambah"]='yey,data anda berhasil disimpan!';

    if($queryTambah){
        header("location:index.php?p=tb-data-penumpang");
    }else{
        echo "ERROR,yah data anda tidak berhasil ditambahkan".mysqli_error($conn);
    }
}

if(isset($_POST['edit-penumpang'])){
    $queryEdit = mysqli_query($conn,"UPDATE tb_data_penumpang SET nama_penumpang='$nama_penumpang',email_penumpang='$email_penumpang',kelas_penerbangan='$kelas_penerbangan'
     WHERE id_penumpang='$id_penumpang'") ;
    $_SESSION["sukses-edit"]='yey,data anda berhasil diedit!';
    if($queryEdit){
        header("location:index.php?p=tb_data_penumpang");
    }else{
        echo "ERROR,yah data anda tidak berhasil diedit".mysqli_error($conn);
    }
}

if(isset($_GET['id'])){
    $id_penumpang=$_GET['id'];
    $queryHapus=mysqli_query($conn,"DELETE FROM tb_data_penumpang WHERE id_penumpang='$id_penumpang'");
    $_SESSION["sukses-hapus"]='yey,data anda berhasil dihapus!';
    if($queryHapus){
        header("location:index.php?p=tb-data-penumpang");
    }else{
        echo "ERROR,yah data anda tidak berhasil dihapus".mysqli_error($conn);
    }
}




?>
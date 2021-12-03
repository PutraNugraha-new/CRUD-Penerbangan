<?php 
require_once 'fungsi-login.php';

// session_start();

if(!isset($_SESSION["submit"])) {
    header("Location:index.php");
    exit;
}

// konfigur paginasi
$jumlahdataperhalaman = 5;
$jumlahdata = count(tampil("SELECT * FROM user"));
$jumlahhalaman = ceil($jumlahdata / $jumlahdataperhalaman);
$halamanaktf = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awaldata = ($jumlahdataperhalaman * $halamanaktf) - $jumlahdataperhalaman;

$konten = tampil("SELECT * FROM user LIMIT $awaldata,$jumlahdataperhalaman");

if (isset($_POST["cari"])) {
    $konten = cari($_POST["keyword"]);
}



?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
<!-- <?php session_start(); ?> -->

<div class="container-fluid-post px-4">
                <div class="row g-3 my-2">
                    <form action="" method="post">
                    <a class="float-start btn btn-primary" href="index.php?p=regis"><i class="fa fa-plus-circle"></i> Tambah Data</a>
                    <!-- <button type="submit" name="cari" class="float-end tombol-cari bg-success fas fa-search"></button> -->
                    <!-- <input type="text" name="keyword" placeholder="Cari" class="float-end me-3 cari"> -->
                    </form>
                    <table class="table  table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pengguna</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            <?php foreach ($konten as $akun) : ?>
                            <tr>
                                <td><?= $i + $awaldata; ?></td>
                                <td><?= $akun["nama_pengguna"]; ?></td>
                                <td><?= $akun["username"]; ?></td>
                                <td><?= $akun["password"]; ?></td>
                                <td>
                                <!-- <a class="fa fa-edit btn btn-warning mx-1" href="index.php?p=edit-akun&username=<?php echo $akun['username']; ?>"></a> -->
                                <a class="hapus fa fa-trash btn btn-danger" name="hapus-akun" href="index.php?p=fungsi-login&username=<?php echo $akun['username']; ?>" onclick="return confirm('Apakah ingin di hapus ?');" ></a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!-- paginasi -->
                    <?php if(!isset($_POST["cari"])) : ?>
                        <nav class="paginasi" aria-label="Page navigation example">
                        <ul class="pagination">
                                <?php if ($halamanaktf > 1) : ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?halaman=<?= $halamanaktf - 1 ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php for($i =1;$i <= $jumlahhalaman; $i++) : ?>
                                    <?php if($i == $halamanaktf) : ?>
                                        <li class="page-item "><a class="page-link bg-primary text-white" href="?halaman=<?= $i;?>"><?= $i; ?></a></li>
                                    <?php else : ?>
                                        <li class="page-item"><a class="page-link" href="?halaman=<?= $i;?>"><?= $i; ?></a></li>
                                    <?php endif; ?>
                                <?php endfor; ?>
                                <?php if($halamanaktf < $jumlahhalaman): ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?halaman=<?= $halamanaktf + 1 ?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                        </ul>
                    </nav>
                    <?php endif; ?>

                </div>
            </div>

        <!-- jika ada session sukses maka tampilkan sweet alert dengan pesan yang telah di set
    di dalam session sukses  -->
<!-- <?php if (@$_SESSION['sukses-tambah']) { ?>
	<script>
		swal("Tambah Data Berhasil", "<?php echo $_SESSION['sukses-tambah']; ?>", "success");
	</script>
	<!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
<?php unset($_SESSION['sukses-tambah']);
} ?>

<?php if (@$_SESSION['sukses-edit']) { ?>
	<script>
		swal("Edit Data Berhasil", "<?php echo $_SESSION['sukses-edit']; ?>", "info");
	</script>

<?php unset($_SESSION['sukses-edit']);
} ?>

<?php if (@$_SESSION['sukses-hapus']) { ?>
	<script>
		swal("Hapus Data Berhasil", "<?php echo $_SESSION['sukses-hapus']; ?>", "error");
	</script>

<?php unset($_SESSION['sukses-hapus']);
} ?> -->
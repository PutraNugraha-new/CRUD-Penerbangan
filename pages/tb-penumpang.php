<?php 
require_once 'fungsi-login.php';
include 'fungsi.php';
error_reporting(0);
session_start();

if(!isset($_SESSION["submit"])) {
    header("Location:index.php");
    exit;
}

// konfigur paginasi
$jumlahdataperhalaman = 5;
$jumlahdata = count(tampil("SELECT * FROM tb_data-penumpang"));
$jumlahhalaman = ceil($jumlahdata / $jumlahdataperhalaman);
$halamanaktf = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awaldata = ($jumlahdataperhalaman * $halamanaktf) - $jumlahdataperhalaman;

$konten = tampil("SELECT * FROM tb_data-penumpang LIMIT $awaldata,$jumlahdataperhalaman");

if (isset($_POST["cari"])) {
    $konten = cari($_POST["keyword"]);
}


?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>


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
                            <th>NO</th>
                            <th>NAMA PENUMPANG</th>
                            <th>EMAIL PENUMPANG</th>
                            <th>KELAS PENERBANGAN</th>
                            <th>JUMLAH BAGASI</th>
                            <th>TANGGAL KEBERANGKATAN</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            <?php foreach ($konten as $penumpang) : ?>
                            <tr>
                                <td><?= $i + $awaldata; ?></td>
                                <td><?= $penumpang['nama_penumpang']; ?></td>
                                <td><?= $penumpang['email_penumpang']; ?></td>
                                <td><?= $penumpang['kelas_penerbangan']; ?></td>
                                <td><?= $penumpang['jumlah_bagasi']; ?></td>
                                <td><?= $penumpang['tgl_keberangkatan']; ?></td>
                                <td>
                                <!-- <a class="fa fa-edit btn btn-warning mx-1" href="index.php?p=edit-penumpang&username=<?php echo $penumpang['username']; ?>"></a> -->
                                <a class="hapus fa fa-trash btn btn-danger remove" name="hapus-penumpang" href="index.php?p=fungsi-login&username=<?php echo $penumpang['username']; ?>" onclick="<?php $_SESSION["confirm-hapus"] = 'You wont be able to revert this!'; ?>" ></a>
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
<?php if (@$_SESSION['sukses-tambah']) { ?>
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
} ?>

<?php if (@$_SESSION['confirm-hapus']) { ?>
	<script>
		Swal.fire({
                title: 'Are you sure?',
                text: "<?php echo $_SESSION['confirm-hapus']; ?>",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).
                then((result) => {
                    if (result.value) {
                        Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                    }
                    })
	</script>

<?php unset($_SESSION['confirm-hapus']);
} ?>

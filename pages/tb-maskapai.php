<?php 
// require_once 'fungsi-login.php';
include 'fungsi.php';
// error_reporting(0);
session_start();

if(!isset($_SESSION["submit"])) {
    header("Location:index.php");
    exit;
}

// // konfigur paginasi
// $jumlahdataperhalaman = 5;
// $jumlahdata = count(tampilkan("SELECT * FROM tb_penumpang"));
// $jumlahhalaman = ceil($jumlahdata / $jumlahdataperhalaman);
// $halamanaktf = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
// $awaldata = ($jumlahdataperhalaman * $halamanaktf) - $jumlahdataperhalaman;

$konten = tampilkan("SELECT * FROM tb_data_maskapai ");

if (isset($_POST["cari"])) {
    $konten = cari_maskapai($_POST["keyword"]);
}



?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>



<div class="container-fluid-post px-4">
                <div class="row g-3 my-2">
                    <form action="" method="post">
                    <a class="float-start btn btn-primary" href="index.php?p=tambah-maskapai"><i class="fa fa-plus-circle"></i> Tambah Data</a>
                    <button type="submit" name="cari" class="float-end tombol-cari bg-success fas fa-search"></button>
                    <input type="text" name="keyword" placeholder="Cari" class="float-end me-3 cari">
                    </form>
                    <table class="table  table-striped table-hover">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Maskapai</th>
                            <th scope="col">Tanggal Pembuatan Pesawat</th>
                            <th scope="col">Jadwal Keberangkatan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            <?php foreach ($konten as $penump) : ?>
                            <tr>
                                <td><?= $i + $awaldata; ?></td>
                                <td><?= $penump['nama_maskapai']; ?></td>
                                <td><?= $penump['tgl_pembuatan_pesawatan']; ?></td>
                                <td><?= $penump['jadwal_keberangkatan']; ?></td>
                                <td>
                                <a class="fa fa-edit btn btn-warning my-2" href="index.php?p=edit-maskapai&id-maskapai=<?php echo $penump['id_maskapai']; ?>"></a>
                                <a class="hapus fa fa-trash btn btn-danger" name="hapus-maskapai" href="index.php?p=fungsi&id-maskapai=<?php echo $penump['id_maskapai']; ?>" id="btn" onclick="return confirm ('Yakin ingin menghapus data?');" ></a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!-- paginasi -->
                    <!-- <?php if(!isset($_POST["cari"])) : ?>
                        <nav class="paginasi" aria-label="Page navigation example">
                        <ul class="pagination">
                                <?php if ($halamanaktf > 1) : ?>
                                    <li class="page-item">
                                        <a class="page-link" href="index.php?p=tb-penumpang?halaman=<?= $halamanaktf - 1 ?>" aria-label="Previous">
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
                                        <a class="page-link" href="/tb-penumpang.php?halaman=<?= $halamanaktf + 1 ?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                        </ul>
                    </nav>
                    <?php endif; ?> -->

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

	<!-- <script>
        const btn = document.getElementById('btn');
        btn.addEventListener('click',function(){
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            }
            })
        });
	</script> -->



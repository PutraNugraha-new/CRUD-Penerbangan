<?php 
    include './koneksi.php';
    $id_penumpang= $_GET['id-penumpang'];
    $query="SELECT * FROM tb_penumpang WHERE id_penumpang='$id_penumpang'";
    $result= mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($result)){
?>


<div class="container-fluid-post px-4">
                <div class="row g-3 my-2">
                    <!-- pebmuka -->
                    <form action="index.php?p=fungsi" method="post" enctype="multipart/form-data">
                        <h5>Form Edit Data</h5>
                        <input type="hidden" name="id_penumpang" value="<?php echo $row['id_penumpang']; ?>">
                        <div class="row justify-content-start py-3">
                            <div class="col-4">
                                <label for="nama">Nama Penumpang</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="nama" name="nama_penumpang" class="form-control" value="<?php echo $row['nama_penumpang']; ?>">
                            </div>
                        </div>
                        <div class="row justify-content-start py-3">
                            <div class="col-4">
                                <label for="email_penumpang">Email Penumpang</label>
                            </div>
                            <div class="col-8">
                                <input maxlength="61" value="<?php echo $row['email_penumpang']; ?>" type="email" id="email_penumpang" name="email_penumpang" class="form-control" placeholder="Masukan email penumpang">
                            </div>
                        </div>
                        <div class="row justify-content-start py-3">
                            <div class="col-4">
                                <label for="kelas_penerbangan">Kelas Penerbangan</label>
                            </div>
                            <div class="col-8">
                                <select class="form-select" name="kelas_penerbangan" style="height:40px !important;">
                                    <option value="kelas_penerbangan" selected="selected">--PILIH KELAS PENERBANGAN--
                                    <option value="EKSEKUTIF">EKSEKUTIF</option>
                                    <option value="BISNIS">BISNIS</option>
                                    <option value="EKONOMI">EKONOMI</option>
                                </select>
                            </div>
                        </div>
                        <div class="row justify-content-start py-3">
                            <div class="col-4">
                                <label for="jumlah_bagasi">Jumlah Bagasi</label>
                            </div>
                            <div class="col-8">
                                <input maxlength="61" value="<?php echo $row['jumlah_bagasi']; ?>" readonly type="number" step="0.01" id="jumlah_bagasi" name="jumlah_bagasi" class="form-control" placeholder="Masukan Jumlah Bagasi">
                            </div>
                        </div>
                        <div class="row justify-content-start py-3">
                            <div class="col-4">
                                <label for="tgl_keberangkatan">Tanggal Keberangkatan</label>
                            </div>
                            <div class="col-8">
                                <input maxlength="61" readonly value="<?php echo $row['tgl_keberangkatan']; ?>" type="text" id="tgl_keberangkatan" name="tgl_keberangkatan" class="form-control" placeholder="Masukan Tanggal Keberangkatan">
                            </div>
                        </div>
                        <div class="row justify-content-end py-3">
                            <div class="col-2">
                                <!-- <a class="btn btn-primary" name="submit" href="#">+Tambah Berita</a> -->
                                <button class="btn btn-primary fas fa-edit" name="edit-penumpang" type="submit"> Ubah Data</button>
                            </div>
                        </div>
                    </form>
                    <!-- penutup -->
                </div>
            </div>
            <?php } ?>
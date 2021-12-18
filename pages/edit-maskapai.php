<?php 
    include './koneksi.php';
    $id_maskapai= $_GET['id-maskapai'];
    $query="SELECT * FROM tb_data_maskapai WHERE id_maskapai='$id_maskapai'";
    $result= mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($result)){
?>


<div class="container-fluid-post px-4">
                <div class="row g-3 my-2">
                    <!-- pebmuka -->
                    <form action="index.php?p=fungsi" method="post" enctype="multipart/form-data">
                        <h5>Form Edit Data</h5>
                        <input type="hidden" name="id_maskapai" value="<?php echo $row['id_maskapai']; ?>">
                        <div class="row justify-content-start py-3">
                            <div class="col-4">
                                <label for="nama">Nama Maskapai</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="nama" name="nama_maskapai" class="form-control" value="<?php echo $row['nama_maskapai']; ?>">
                            </div>
                        </div>
                        <div class="row justify-content-start py-3">
                            <div class="col-4">
                                <label for="tgl_pembuatan_pesawat">Tanggal Pembuatan Pesawat</label>
                            </div>
                            <div class="col-8">
                                <input maxlength="61" value="<?php echo $row['tgl_pembuatan_pesawat']; ?>" type="datetime-local" id="tgl_pembuatan_pesawatan" name="tgl_pembuatan_pesawatan" class="form-control" placeholder="Masukan Tanggal Pembuatan Pesawat">
                            </div>
                        </div>
                        <div class="row justify-content-start py-3">
                            <div class="col-4">
                                <label for="jadwal_keberangkatan">Jadwal Keberangakatan</label>
                            </div>
                            <div class="col-8">
                                <select name="jadwal_keberangkatan" class="form-control" style="height:40px !important;" value="" required>
                                    <option value="jadwal_keberangkatan" selected="selected">-- PILIH JADWAL KEBERANGKATAN -- 
                                    <option value="SENIN-SELASA">SENIN-SELASA</option>
                                    <option value="RABU-KAMIS">RABU-KAMIS</option>
                                    <option value="JUMAT-SABTU-MINGGU">JUMAT-SABTU-MINGGU</option>
                                </select>
                            </div>
                        </div>
                        <div class="row justify-content-end py-3">
                            <div class="col-2">
                                <!-- <a class="btn btn-primary" name="submit" href="#">+Tambah Berita</a> -->
                                <button class="btn btn-primary fas fa-edit" name="edit-maskapai" type="submit"> Ubah Data</button>
                            </div>
                        </div>
                    </form>
                    <!-- penutup -->
                </div>
            </div>
            <?php } ?>
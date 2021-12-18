<?php 
    include './koneksi.php';
    $id_keberangkatan= $_GET['id-pilot'];
    $query="SELECT * FROM tb_data_pilot WHERE id_pilot='$id_keberangkatan'";
    $result= mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($result)){
?>


<div class="container-fluid-post px-4">
                <div class="row g-3 my-2">
                    <!-- pebmuka -->
                    <form action="index.php?p=fungsi" method="post" >
                        <h5>Form Edit Data</h5>
                        <input type="hidden" name="id_pilot" value="<?php echo $row['id_pilot']; ?>">
                        <div class="row justify-content-start py-3">
                            <div class="col-4">
                                <label for="nama_pilot">Nama Pilot</label>
                            </div>
                            <div class="col-8">
                                <input maxlength="61"  value="<?php echo $row['nama_pilot']; ?>" type="text" id="nama_pilot" name="nama_pilot" class="form-control" placeholder="Masukan Nama Pilot">
                            </div>
                        </div>
                        <div class="row justify-content-start py-3">
                            <div class="col-4">
                                <label for="asal_maskapai">Asal Maskapai</label>
                            </div>
                            <div class="col-8">
                                <input maxlength="61" value="<?php echo $row['asal_maskapai']; ?>" type="text" id="asal_maskapai" name="asal_maskapai" class="form-control" placeholder="Masukan Asal Maskapai">
                            </div>
                        </div>
                        <div class="row justify-content-end py-3">
                            <div class="col-2">
                                <!-- <a class="btn btn-primary" name="submit" href="#">+Tambah Berita</a> -->
                                <button class="btn btn-primary fas fa-edit" name="edit-pilot" type="submit"> Ubah Data</button>
                            </div>
                        </div>
                    </form>
                    <!-- penutup -->
                </div>
            </div>
            <?php } ?>
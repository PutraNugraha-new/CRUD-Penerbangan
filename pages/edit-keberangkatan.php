<?php 
    include './koneksi.php';
    $id_keberangkatan= $_GET['id-keberangkatan'];
    $query="SELECT * FROM tb_detail_keberangkatan WHERE id_keberangkatan='$id_keberangkatan'";
    $result= mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($result)){
?>


<div class="container-fluid-post px-4">
                <div class="row g-3 my-2">
                    <!-- pebmuka -->
                    <form action="index.php?p=fungsi" method="post" >
                        <h5>Form Edit Data</h5>
                        <input type="hidden" name="id_keberangkatan" value="<?php echo $row['id_keberangkatan']; ?>">
                        <div class="row justify-content-start py-3">
                            <div class="col-4">
                                <label for="nama">Nama Maskapai</label>
                            </div>
                            <div class="col-8">
                            <select name="nama_maskapai" class="form-control" style="height:40px !important;" value="" required>
                                <option value="nama_maskapai" selected="selected">-- PILIH Maskapai -- 
                                <option value="Aviastar">Aviastar</option>
                                <option value="Batik Air">Batik Air</option>
                                <option value="Citilink">Citilink</option>
                                <option value="Garuda Indonesia">Garuda Indonesia</option>
                                <option value="Lion Air">Lion Air</option>
                                <option value="Nam Air">Nam Air</option>
                                <option value="Sriwijaya Air">Sriwijaya Air</option>
                            </select>
                            </div>
                        </div>
                        <div class="row justify-content-start py-3">
                            <div class="col-4">
                                <label for="tgl_keberangkatan">Tanggal Keberangkatan</label>
                            </div>
                            <div class="col-8">
                                <input maxlength="61" readonly value="<?php echo $row['tgl_keberangkatan']; ?>" type="text" id="tgl_keberangkatan" readonly name="tgl_keberangkatan" class="form-control" placeholder="Masukan Tanggal Keberangkatan">
                            </div>
                        </div>
                        <div class="row justify-content-end py-3">
                            <div class="col-2">
                                <!-- <a class="btn btn-primary" name="submit" href="#">+Tambah Berita</a> -->
                                <button class="btn btn-primary fas fa-edit" name="edit-keberangkatan" type="submit"> Ubah Data</button>
                            </div>
                        </div>
                    </form>
                    <!-- penutup -->
                </div>
            </div>
            <?php } ?>
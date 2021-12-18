<?php include '../koneksi.php'; ?>
<div class="container-fluid-post px-4">
                <div class="row g-3 my-2">
                    <!-- pebmuka -->
                    <form action="index.php?p=fungsi" method="POST">
                    <h5>Form Tambah Data</h5>
                        <div class="row justify-content-start py-3">
                            <div class="col-4">
                                <label for="nama_maskapai" >Nama Maskapai</label>
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
                                <label for="tgl_keberangkatan" >Masukan Tanggal Keberangkatan</label>
                            </div>
                            <div class="col-8">
                                <input required maxlength="61" type="datetime-local" id="tgl_keberangkatan" name="tgl_keberangkatan" class="form-control" placeholder="Masukan Tanggal">
                            </div>
                        </div>
                        
                        <div class="row justify-content-end py-3">
                            <div class="col-2">
                            <button type="submit" class="btn btn-primary fas fa-plus" name="tambah-keberangkatan" value="submit"> Tambah Data</button>
                            </div>
                        </div>
                        </form>
                    <!-- penutup -->
                </div>
            </div>
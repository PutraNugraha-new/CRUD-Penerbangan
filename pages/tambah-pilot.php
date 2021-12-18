<?php include '../koneksi.php'; ?>
<div class="container-fluid-post px-4">
                <div class="row g-3 my-2">
                    <!-- pebmuka -->
                    <form action="index.php?p=fungsi" method="POST">
                    <h5>Form Tambah Data</h5>
                        <div class="row justify-content-start py-3">
                            <div class="col-4">
                                <label for="nama_pilot" >Nama Pilot</label>
                            </div>
                            <div class="col-8">
                            <input required maxlength="61" type="text" id="nama_pilot" name="nama_pilot" class="form-control" placeholder="Masukan Nama Pilot">
                            </div>
                        </div>
                        <div class="row justify-content-start py-3">
                            <div class="col-4">
                                <label for="asal_maskapai" >Asal Maskapai</label>
                            </div>
                            <div class="col-8">
                                <input required maxlength="61" type="Text" id="asal_maskapai" name="asal_maskapai" class="form-control" placeholder="Masukan Asal Maskapai">
                            </div>
                        </div>
                        
                        <div class="row justify-content-end py-3">
                            <div class="col-2">
                            <button type="submit" class="btn btn-primary fas fa-plus" name="tambah-pilot" value="submit"> Tambah Data</button>
                            </div>
                        </div>
                        </form>
                    <!-- penutup -->
                </div>
            </div>
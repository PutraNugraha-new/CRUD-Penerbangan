<?php include '../koneksi.php'; ?>
<div class="container-fluid-post px-4">
                <div class="row g-3 my-2">
                    <!-- pebmuka -->
                    <form action="index.php?p=fungsi" method="POST">
                    <h5>Form Tambah Data</h5>
                        <div class="row justify-content-start py-3">
                            <div class="col-4">
                                <label for="nama_penumpang" >Nama Penumpang</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="nama_penumpang" name="nama_penumpang" class="form-control" placeholder="Masukan Nama Lengkap" required>
                            </div>
                        </div>
                        <div class="row justify-content-start py-3">
                            <div class="col-4">
                                <label for="email_penumpang" >Masukan Email</label>
                            </div>
                            <div class="col-8">
                                <input required maxlength="61" type="email" id="email_penumpang" name="email_penumpang" class="form-control" placeholder="Masukan Email">
                            </div>
                        </div>
                        <div class="row justify-content-start py-3">
                            <div class="col-4">
                                <label for="kelas_penerbangan" >kelas Penerbangan</label>
                            </div>
                            <div class="col-8">
                            <select name="kelas_penerbangan" class="form-control" style="height:40px !important;" value="" required>
                                <option value="kelas_penerbangan" selected="selected">-- PILIH KELAS PENERBANGAN -- 
                                <option value="EKSEKUTIF">EKSEKUTIF</option>
                                <option value="BISNIS">BISNIS</option>
                                <option value="EKONOMI">EKONOMI</option>
                            </select>
                            </div>
                        </div>
                        <div class="row justify-content-start py-3">
                            <div class="col-4">
                                <label for="jumlah_bagasi" >Jumlah Berat Bagasi</label>
                            </div>
                            <div class="col-8">
                                <input required maxlength="61" type="number" step="0.01" id="jumlah_bagasi" name="jumlah_bagasi" class="form-control" placeholder="Masukan Berat Bagasi">
                            </div>
                        </div>
                        <div class="row justify-content-start py-3">
                            <div class="col-4">
                                <label for="tgl_keberangkatan" >Tanggal Keberangkatan</label>
                            </div>
                            <div class="col-8">
                                <input required maxlength="61" type="datetime-local" id="tgl_keberangkatan" name="tgl_keberangkatan" class="form-control" placeholder="Masukan Berat Bagasi">
                            </div>
                        </div>
                        
                        <div class="row justify-content-end py-3">
                            <div class="col-2">
                            <button type="submit" class="btn btn-primary fas fa-plus" name="tambah-penumpang" value="submit"> Tambah Data</button>
                            </div>
                        </div>
                        </form>
                    <!-- penutup -->
                </div>
            </div>
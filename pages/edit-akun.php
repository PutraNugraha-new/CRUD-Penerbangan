<?php
include './koneksi.php';

$username = $_GET['username'];
$query = "SELECT * FROM user WHERE username='$username'";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) {
?>


<div class="container-fluid-post px-4">
                <div class="row g-3 my-2">
                    <!-- pebmuka -->
                    <form action="index.php?p=fungsi-login" method="post">
                        <h5>Form Edit Data Akun</h5>
                        <div class="row justify-content-start py-3">
                            <div class="col-4">
                                <label for="nama_pengguna" required>Nama Pengguna</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="nama_pengguna" name="nama_pengguna" class="form-control" placeholder="Masukan Nama Lengkap" required value="<?= $row['nama_pengguna']; ?>">
                                <input required maxlength="61" type="hidden" id="username" name="username" class="form-control" placeholder="Masukan username">
                            </div>
                        </div>
                        <div class="row justify-content-start py-3">
                            <div class="col-4">
                                <label for="password" required>Password</label>
                            </div>
                            <div class="col-8">
                                <input required maxlength="61" type="password" id="password" name="password" class="form-control" placeholder="Masukan password" value="<?= $row['password']; ?>">
                            </div>
                        </div>
                        <div class="row justify-content-end py-3">
                            <div class="col-2">
                            <input type="submit" name="edit-akun" value="Update Data" class="btn btn-primary ">
                            </div>
                        </div>
                    </form>
                    <!-- penutup -->
                </div>
            </div>
            <?php } ?>
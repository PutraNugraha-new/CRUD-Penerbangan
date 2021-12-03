<?php 
require_once 'fungsi-login.php';
if(isset($_POST["submit"])) {
    if(regis($_POST) > 0) {
        echo "
                <script>
                    document.location.href = 'index.php?p=tb-login';
                </script>
            ";
            $_SESSION["sukses-tambah"] = 'Data Berhasil Disimpan';
    }else{
        echo "
                <script>
                    alert(Registrasi Gagal);
                </script>
            ";
    }

}
?>

<div class="container-fluid-post px-4">
                <div class="row g-3 my-2">
                    <!-- pebmuka -->
                    <form action="" method="post" enctype="multipart/form-data">
                        <h5>Form Registrasi</h5>
                        <div class="row justify-content-start py-3">
                            <div class="col-4">
                                <label for="nama_pengguna" required>Nama Pengguna</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="nama_pengguna" name="nama_pengguna" class="form-control" placeholder="Masukan Nama Lengkap" required>
                            </div>
                        </div>
                        <div class="row justify-content-start py-3">
                            <div class="col-4">
                                <label for="username" required>Username</label>
                            </div>
                            <div class="col-8">
                                <input required maxlength="61" type="text" id="username" name="username" class="form-control" placeholder="Masukan username">
                            </div>
                        </div>
                        <div class="row justify-content-start py-3">
                            <div class="col-4">
                                <label for="password" required>Password</label>
                            </div>
                            <div class="col-8">
                                <input required maxlength="61" type="password" id="password" name="password" class="form-control" placeholder="Masukan password">
                            </div>
                        </div>
                        <div class="row justify-content-start py-3">
                            <div class="col-4">
                                <label for="password2" required>Konfirmasi Password</label>
                            </div>
                            <div class="col-8">
                                <input required maxlength="61" type="password" id="password2" name="password2" class="form-control" placeholder="Konfirmasi password">
                            </div>
                        </div>
                        
                        <div class="row justify-content-end py-3">
                            <div class="col-2">
                                <!-- <a class="btn btn-primary" name="submit" href="#">+Tambah Berita</a> -->
                                <button class="btn btn-primary" name="submit">Registrasi</button>
                            </div>
                        </div>
                    </form>
                    <!-- penutup -->
                </div>
            </div>
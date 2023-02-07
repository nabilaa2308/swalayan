<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Registration Page</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="../../index2.html"><b>App</b> Swalayan </a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register a new membership</p>

                <form action="simpan_registrasi.php" method="post">

                <?php 
                include 'koneksi.php';
                // mengambil data user dengan kode paling besar
                $querykode = mysqli_query($koneksi, "SELECT max(id_user) as idterbesar FROM user");
                $data = mysqli_fetch_array($querykode);
                $id_user = $data['idterbesar'];
                // mengambil angka dari kode user terbesar, menggunakan fungsi substr
                // dan diubah ke integer dengan (int)
                $urutan = (int) substr($id_user, 3, 3);
                // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
                $urutan++;
                // membentuk kode user baru
                // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
                // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
                // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG
                $huruf = "USR";
                $iduser = $huruf . sprintf("%03s", $urutan);

                ?>
                
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="id_user" value="<?php echo $iduser ?>" readonly>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="nama_user" placeholder="Nama User">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <select class="form-control select2" name="jenis_kelamin">
                            <option value="Laki-laki">Laki - Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>                        
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="username" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="no_hp" placeholder="No HP">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">

                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>



                <a href="index.php" class="text-center">I already have a membership</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/dist/js/adminlte.min.js"></script>
</body>

</html>
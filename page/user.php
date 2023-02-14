        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">User Form</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="proses/proses_user.php?aksi=simpan" method="post" class="form-horizontal">
                <?php
                include 'koneksi.php';
                $querykode = mysqli_query($koneksi, "SELECT max(id_user) as idterbesar FROM user");
                $data = mysqli_fetch_array($querykode);
                $id_user = $data['idterbesar'];

                $urutan = (int) substr($id_user, 3, 3);
                $urutan++;

                $huruf = "USR";
                $iduser = $huruf . sprintf("%03s", $urutan);

                ?>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="id_user" class="col-sm-2 col-form-label">ID User</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="id_user" value="<?php echo $iduser ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_user" class="col-sm-2 col-form-label">Nama User</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_user" placeholder="Nama User">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select class="form-control select2" name="jenis_kelamin">
                                <option value="Laki-laki">Laki - Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="no_hp" class="col-sm-2 col-form-label">No HP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="no_hp" placeholder="No HP">
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Simpan</button>
                    <button class="btn btn-warning float-right">Cancel</button>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data User</h3>
            </div>

            <div class="card-body">
            <table class="table table-striped">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID User</th>
                            <th>Nama</th>
                            <th>username</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        include 'koneksi.php';
                        $query = mysqli_query($koneksi, "SELECT * FROM user");
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $data['id_user'] ?></td>
                                <td><?php echo $data['nama_user'] ?></td>
                                <td><?php echo $data['username'] ?></td>
                                <td>
                                    <a href="admin.php?page=edit_user&id_user=<?php echo $data['id_user'] ?>" class="btn btn-warning">Edit</a>
                                    <a href="proses/proses_user.php?aksi=delete&id_user=<?php echo $data['id_user'] ?>" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>

            </div>

        </div>
        <!-- /.form-box -->
<div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Pelanggan Form</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="proses/proses_pelanggan.php?aksi=simpan" method="post" class="form-horizontal">
                <?php
                include 'koneksi.php';
                $querykode = mysqli_query($koneksi, "SELECT max(id_pelanggan) as idterbesar FROM pelanggan");
                $data = mysqli_fetch_array($querykode);
                $id_pelanggan = $data['idterbesar'];

                $urutan = (int) substr($id_pelanggan, 3, 3);
                $urutan++;

                $huruf = "PLG";
                $idpelanggan = $huruf . sprintf("%03s", $urutan);

                ?>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="id_pelanggan" class="col-sm-2 col-form-label">ID Pelanggan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="id_pelanggan" value="<?php echo $idpelanggan ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_pelanggan" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_pelanggan" placeholder="Nama Pelanggan">
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
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="alamat" placeholder="Alamat">
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
                            <th>ID Pelanggan</th>
                            <th>Nama Pelanggan</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>No Hp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        include 'koneksi.php';
                        $query = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $data['id_pelanggan'] ?></td>
                                <td><?php echo $data['nama_pelanggan'] ?></td>
                                <td><?php echo $data['jenis_kelamin'] ?></td>
                                <td><?php echo $data['alamat'] ?></td>
                                <td><?php echo $data['no_hp'] ?></td>
                                <td>
                                    <a href="admin.php?page=edit_pelanggan&id_pelanggan=<?php echo $data['id_pelanggan'] ?>" class="btn btn-warning">Edit</a>
                                    <a href="proses/proses_pelanggan.php?aksi=delete&id_pelanggan=<?php echo $data['id_pelanggan'] ?>" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>

            </div>

        </div>
            <!-- /.form-box -->
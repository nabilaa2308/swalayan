        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Barang Form</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="proses/proses_barang.php?aksi=simpan" method="post" enctype="multipart/form-data" class="form-horizontal">
                <?php
                include 'koneksi.php';
                $querykode = mysqli_query($koneksi, "SELECT max(id_barang) as idterbesar FROM barang");
                $data = mysqli_fetch_array($querykode);
                $id_barang = $data['idterbesar'];

                $urutan = (int) substr($id_barang, 3, 3);
                $urutan++;

                $huruf = "BRG";
                $idbarang = $huruf . sprintf("%03s", $urutan);

                ?>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="id_barang" class="col-sm-2 col-form-label">ID Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="id_barang" value="<?php echo $idbarang ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="harga" placeholder="Harga">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="stok" placeholder="Stok">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-10">
                            <input type="file" onchange="readURL(this);" name="gambar" class="form-control" />
                            <img id="blah" src="#" alt="your image" width="300px" height="300px" />
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Simpan</button>
                    <button class="btn btn-default float-right">Cancel</button>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Barang</h3>
            </div>

            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Barang</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        include 'koneksi.php';
                        $query = mysqli_query($koneksi, "SELECT * FROM barang");
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $data['id_barang'] ?></td>
                                <td><?php echo $data['nama_barang'] ?></td>
                                <td><?php echo $data['harga'] ?></td>
                                <td><?php echo $data['stok'] ?></td>
                                <td><img src="gambar/<?php echo $data['gambar'] ?>" width="100px" height="100px"></td>
                                <td>
                                    <a href="admin.php?page=edit_barang&id_barang=<?php echo $data['id_barang'] ?>" class="btn btn-warning">Edit</a>
                                    <a href="proses/proses_barang.php?aksi=delete&id_barang=<?php echo $data['id_barang'] ?>" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>

            </div>

        </div>
        </div>
        <!-- /.form-box -->
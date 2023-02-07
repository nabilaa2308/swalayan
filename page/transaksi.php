<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">User Form</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="proses/proses_transaksi.php?aksi=simpan" method="post" class="form-horizontal">
        <?php
        include 'koneksi.php';
        $querykode = mysqli_query($koneksi, "SELECT max(id_transaksi) as idterbesar FROM transaksi");
        $data = mysqli_fetch_array($querykode);
        $id_transaksi = $data['idterbesar'];

        $urutan = (int) substr($id_transaksi, 3, 3);
        $urutan++;

        $huruf = "INV";
        $idtransaksi = $huruf . sprintf("%03s", $urutan);

        ?>
        <div class="card-body">
            <div class="form-group row">
                <label for="id_transaksi" class="col-sm-2 col-form-label">ID transaksi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="id_transaksi" value="<?php echo $idtransaksi ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="id_user" class="col-sm-2 col-form-label">ID User</label>
                <div class="col-sm-10">
                    <input type="text" name="id_user" class="form-control" value="<?php echo $_SESSION['id_user']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama_pelanggan" class="col-sm-2 col-form-label">ID Pelanggan</label>
                <div class="col-sm-10">
                    <select name="id_pelanggan" class="form-control">
                        <option value="">Pilih Pelanggan</option>
                        <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <option value="<?php echo $data['nama_pelanggan'] ?>"><?php echo $data['nama_pelanggan'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                    <input type="text" name="tanggal" <?php $Now = new DateTime('now', new DateTimeZone('Asia/Jakarta')); ?> value="<?php echo $Now->format('Y-m-d H:i:s'); ?>" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="id_barang" class="col-sm-2 col-form-label">ID Barang</label>
                <div class="col-sm-10">
                    <select name="id_barang" id="id_barang" onchange="changeValueBarang(this.value)" class="form-control">
                        <option disabled="" selected="">Pilih Barang</option>
                        <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM barang");
                        $jsBarang = "var dtBarang = new Array();\n";
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <option value="<?php echo $data['id_barang'] ?>"><?php echo $data['nama_barang'] ?></option>
                            <?php $jsBarang .= "dtBarang['" . $data['id_barang'] . "'] = {harga:'" . addslashes($data['harga']) . "'};\n" ?>

                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-10">
                    <input type="text" name="harga" id="harga" readonly class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jumlah</label>
                <div class="col-sm-10">
                    <input type="text" name="jumlah" id="jumlah" onkeyup="hitung()" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Total</label>
                <div class="col-sm-10">
                    <input type="text" name="total" id="total" readonly class="form-control">
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
        <h3 class="card-title">Data User</h3>
    </div>

    <div class="card-body">
        <table id="example1" class="table table-bordered table-stripped">

            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Transaksi</th>
                    <th>ID Pelanggan</th>
                    <th>Tanggal</th>
                    <th>ID Barang</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>ID User</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                include 'koneksi.php';
                $query = mysqli_query($koneksi, "SELECT * FROM transaksi");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $data['id_transaksi'] ?></td>
                        <td><?php echo $data['id_pelanggan'] ?></td>
                        <td><?php echo $data['tanggal'] ?></td>
                        <td><?php echo $data['id_barang'] ?></td>
                        <td><?php echo $data['jumlah'] ?></td>
                        <td><?php echo $data['total'] ?></td>
                        <td><?php echo $data['id_user'] ?></td>
                        <td>
                            <a href="proses/proses_transaksi.php?aksi=delete&id_transaksi=<?php echo $data['id_transaksi'] ?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>

    </div>

</div>
</div>
<!-- /.form-box -->
<script>
    function hitung() {
        var harga = document.getElementById('harga').value;
        var jumlah = document.getElementById('jumlah').value;
        var total = harga * jumlah;
        document.getElementById('total').value = total;
    }

    <?php echo $jsBarang; ?>

    function changeValueBarang(x) {
        document.getElementById('harga').value = dtBarang[x].harga;
    }
</script>
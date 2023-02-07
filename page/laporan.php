<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Laporan Transaksi</h3>
    </div>

    <div class="card-body">
        <form action="" method="POST">
            <div class="form-group row">
                <label for="id_pelanggan" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-2">
                    <input type="date" name="tanggal_awal" class="form-control">
                </div>
                <div class="col-sm-2">
                    <input type="date" name="tanggal_akhir" class="form-control">
                </div>
                <div class="col-sm-2">
                    <input type="submit" name="tampilkan" value="Tampilkan" class="btn btn-info">
                </div>
            </div>
        </form>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <td>ID Transaksi</td>
                    <td>Tanggal</td>
                    <td>Barang</td>
                    <td>Jumlah</td>
                    <td>Total</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'koneksi.php';
                if (isset($_POST["tampilkan"])) {
                    $tanggal_awal = $_POST['tanggal_awal'];
                    $tanggal_akhir = $_POST['tanggal_akhir'];
                    $query = mysqli_query($koneksi, "SELECT * FROM transaksi,barang WHERE transaksi.id_barang = barang.id_barang AND transaksi.tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ");
                } else {
                    $query = mysqli_query($koneksi, "SELECT * FROM transaksi,barang WHERE transaksi.id_barang = barang.id_barang");
                }
                while ($data = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><?php echo $data['id_transaksi'] ?></td>
                        <td><?php echo $data['tanggal'] ?></td>
                        <td><?php echo $data['nama_barang'] ?></td>
                        <td><?php echo $data['jumlah'] ?></td>
                        <td><?php echo $data['total'] ?></td>
                        <td><a href="admin.php?page=cetak&id_transaksi=<?php echo $data['id_transaksi'] ?>" class="btn btn-primary">Cetak</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
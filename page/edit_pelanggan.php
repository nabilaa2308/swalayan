<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Data User</h3>
    </div>
    <?php 
    include 'koneksi.php';
    $id_pelanggan = $_GET['id_pelanggan'];
    $query = mysqli_query($koneksi,"SELECT * FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'");
    $data = mysqli_fetch_array($query);
    ?>
    <form action="proses/proses_pelanggan.php?aksi=update" method="POST" class="form-horizontal">
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ID Pelanggan</label>
                <div class="col-sm-10">
                    <input type="text" name="id_pelanggan" value="<?php echo $data['id_pelanggan'] ?>" readonly class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Pelanggan</label>
                <div class="col-sm-10">
                    <input type="text" name="nama_pelanggan" value="<?php echo $data['nama_pelanggan'] ?>" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <select class="form-control" name="jenis_kelamin">
                        <option value="Laki-laki"<?php if ($data['jenis_kelamin'] == 'Laki-Laki') { echo 'selected';}?>>Laki-laki</option>
                        <option value="Perempuan"<?php if ($data['jenis_kelamin'] == 'Perempuan') { echo 'selected';}?>>Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" name="alamat" value="<?php echo $data['alamat'] ?>" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">No HP</label>
                <div class="col-sm-10">
                    <input type="text" name="no_hp" value="<?php echo $data['no_hp'] ?>" class="form-control">
                </div>
            </div>
            <div class="card-footer">
                <a href="admin.php?page=user" class="btn btn-warning">Back</a>
                <button type="submit" class="btn btn-info float-right">Update</button>
            </div>
        </div>
    </form>
</div>
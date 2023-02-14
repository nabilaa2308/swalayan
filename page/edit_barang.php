<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Data User</h3>
    </div>
    <?php 
    include 'koneksi.php';
    $id_barang = $_GET['id_barang'];
    $query = mysqli_query($koneksi,"SELECT * FROM barang WHERE id_barang = '$id_barang'");
    $data = mysqli_fetch_array($query);
    ?>
    <form action="proses/proses_barang.php?aksi=update" method="POST" enctype="multipart/form-data" class="form-horizontal">
        <div class="card-body">
        <div class="form-group row">
                        <label for="id_barang" class="col-sm-2 col-form-label">ID Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="id_barang" value="<?php echo $data['id_barang'] ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_barang" value="<?php echo $data['nama_barang'] ?>" placeholder="Nama Barang">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="harga" value="<?php echo $data['harga'] ?>" placeholder="Harga">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="stok" value="<?php echo $data['stok'] ?>" placeholder="Stok">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-10">
                            <input type="file" onchange="readURL(this);" name="gambar" class="form-control" />
                            <img id="blah" src="gambar/<?php echo $data['gambar'] ?>" alt="your image" width="300px" height="300px" />
                        </div>
                    </div>
            <div class="card-footer">
                <a href="admin.php?page=user" class="btn btn-warning">Back</a>
                <button type="submit" class="btn btn-info float-right">Update</button>
            </div>
        </div>
    </form>
</div>
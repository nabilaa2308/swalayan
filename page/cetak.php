<style>
    @media print {
        body * {
            visibility: hidden;
        }

        #content,
        #content * {
            visibility: visible;
        }

        #buttonprint {
            display: none;
        }
    }
</style>
<?php
include 'koneksi.php';
$id_transaksi = $_GET['id_transaksi'];
$query = mysqli_query($koneksi, "SELECT * FROM transaksi");
$row = mysqli_fetch_array($query);
$sql = mysqli_query($koneksi, "SELECT * FROM barang");
$row1 = mysqli_fetch_array($sql)

?>
<div class="card" id="content" style="width:40%;margin:auto;margin-top:30px;">
    <div class="card-body" style="margin:auto;">
        <h4 class="card-title">ANNRYX MART <img class="col-sm-6" src="assets/image/penjualan.png" width="100px" height="60px"></h4>
        <p class="card-text"><br>
            JL.MAWAR |
            No. Telp : 08XXXXXXXX
            <hr>
            <?php echo $id_transaksi ?>&nbsp; | &nbsp;
            MEMBER &nbsp; | &nbsp;
            BAYAR TUNAI <br>
            KASIR : ADMIN
            <hr>
        <table cellpadding="4">
            <tr>
                <th>Nama</th>
                <th>Qty</th>
                <th>Harga(pcs)</th>
                <th>Harga Total*</th>
            </tr>
            <?php
            $query2 = mysqli_query($koneksi, "SELECT * FROM transaksi INNER JOIN barang ON barang.id_barang = transaksi.id_barang INNER JOIN pelanggan on pelanggan.id_pelanggan = transaksi.id_pelanggan INNER JOIN user on user.id_user = transaksi.id_user WHERE transaksi.id_transaksi = '$id_transaksi'");
            while ($row2 = mysqli_fetch_array($query2)) { ?>
            <?php } ?>
            <tr>
                <td><?php echo $row['id_barang'] ?>&nbsp;&nbsp;</td>
                <td><?php echo $row['jumlah'] ?>&nbsp;&nbsp;</td>
                <td><?php echo $row1['harga'] ?>&nbsp;&nbsp;</td>
                <td><?php echo $row['total'] ?>&nbsp;</td>
                </p>
            </tr>
            <tr>
                <td colspan="3">Total : </td>
                <td>Rp. <?php echo $row['total'] ?></td>
            </tr>
        </table>
        <hr>
        Call Center : 028XXXXXXXXXX |
        Email : annryx_mart@gmail.com
    </div>
</div>
<center>
    <div class="btn btn-primary" id="buttonprint" onclick="window.print();">Print</div>
</center>
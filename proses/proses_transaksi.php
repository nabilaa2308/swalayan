<?php
include '../koneksi.php';

$aksi = $_GET['aksi'];
switch ($aksi) {

    case 'simpan':
        $id_transaksi = $_POST['id_transaksi'];
        $id_pelanggan = $_POST['id_pelanggan'];
        $tanggal = $_POST['tanggal'];
        $id_barang = $_POST['id_barang'];
        $jumlah = $_POST['jumlah'];
        $total = $_POST['total'];
        $id_user = $_POST['id_user'];
        $query = mysqli_query($koneksi, "INSERT INTO transaksi
    VALUES('$id_transaksi','$id_pelanggan','$tanggal','$id_barang','$jumlah','$total','$id_user')");
        header("location:../admin.php?page=transaksi");
        break;

    case 'delete':
        $id_transaksi = $_GET['id_transaksi'];
        $query = mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_transaksi = '$id_transaksi'");
        header("location:../admin.php?page=transaksi");
        break;
}
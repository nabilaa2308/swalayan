<?php
include '../koneksi.php';

$aksi = $_GET['aksi'];
switch ($aksi) {

    case 'simpan':
        $id_user = $_POST['id_user'];
        $nama_user = $_POST['nama_user'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $no_hp = $_POST['no_hp'];
        $query = mysqli_query($koneksi, "INSERT INTO user VALUES('$id_user','$nama_user','$jenis_kelamin','$username','$password','$no_hp')");
        header("location:../admin.php?page=user");
        break;

    case 'update':
        $id_user = $_POST['id_user'];
        $nama_user = $_POST['nama_user'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $no_hp = $_POST['no_hp'];
        $query = mysqli_query($koneksi, "UPDATE user SET nama_user = '$nama_user', jenis_kelamin = '$jenis_kelamin',
    username = '$username', password = '$password', no_hp = '$no_hp' WHERE id_user = '$id_user'");
        header("location:../admin.php?page=user");
        break;
    case 'delete':
        $id_user = $_GET['id_user'];
        $query = mysqli_query($koneksi, "DELETE FROM user WHERE id_user = '$id_user'");
        header("location:../admin.php?page=user");
        break;
}

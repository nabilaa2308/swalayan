<?php 
include 'koneksi.php';

$id_user = $_POST['id_user'];
$nama_user = $_POST['nama_user'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$username = $_POST['username'];
$password = $_POST['password'];
$no_hp = $_POST['no_hp'];

$queryinput = mysqli_query($koneksi,"INSERT INTO user
VALUES('$id_user','$nama_user','$jenis_kelamin','$username','$password','$no_hp')");

header("location:index.php");

?>
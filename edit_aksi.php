<?php
// koneksi datbase

include 'koneksi.php';

//menangkap data yang di kirim dari form
$id= $_POST['id'];
$alamat = $_POST['alamat'];
$nama_anggota = $_POST['nama_anggota'];
$no_hp = $_POST['no_hp'];
$status = $_POST['status'];

mysqli_query($koneksi,"UPDATE anggota SET nama_anggota='$nama_anggota',no_hp='$no_hp',status='$status',alamat='$alamat' WHERE id='$id'");

echo "<script>alert('Data Berhasil Disimpan!');</script>";
echo "<script>location='index.php?halaman=user';</script>";
//update data ke data base
header("location:index.php");

?>
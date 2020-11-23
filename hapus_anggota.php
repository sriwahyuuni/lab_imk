<?php
// koneksi datbase
include 'koneksi.php';

//menangkap data id yang di krim dari url

$id= $_GET['id'];

//menghapus data dari database

$data= mysqli_query($koneksi, "DELETE FROM anggota WHERE id=$id");

echo "<script>alert('Data Anggota Dihapus!');</script>";
echo "<script>location='index.php?halaman=user';</script>";


?>
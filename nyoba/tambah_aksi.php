<?php 
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$id_kategori = $_POST ['id_kategori'];
$nama = $_POST['nama'];
$satuan = $_POST['satuan'];
$jumlah = $_POST['jumlah'];
$harga = $_POST['harga'];

// menginput data ke database
mysqli_query($koneksi,"insert into barang values('','$id_kategori', '$nama','$satuan','$jumlah', '$harga')");

// mengalihkan halaman kembali ke index.php
header("location:index.php");

?>
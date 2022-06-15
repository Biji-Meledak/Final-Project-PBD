<?php 
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$id = $_POST['id'];
$id_kategori = $_POST['id_kategori'];
$nama = $_POST['nama'];
$satuan = $_POST['satuan'];
$jumlah = $_POST['jumlah'];
$harga = $_POST['harga'];

// update data ke database
mysqli_query($koneksi,"update barang set id_kategori='$id_kategori', nama='$nama', satuan='$satuan', jumlah='$jumlah', harga='$harga' where id='$id'");

// mengalihkan halaman kembali ke index.php
header("location:index.php");

?>
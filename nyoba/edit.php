<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" type="text/css" href="style.css">
 
    <title>Final Project</title>
</head>
<body>

	<?php
	include 'koneksi.php';
	$id = $_GET['id'];
	$data = mysqli_query($koneksi,"select * from barang where id='$id'");
	while($d = mysqli_fetch_array($data)){
	?>

	<div class="container">
		<form method="post" action="update.php" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Edit Data Barang</p>
            <div class="input-group">
                <td>Id Kategori</td>
                <input type="text" name="id_kategori" value="<?php echo $d['id_kategori']; ?>">
            </div>
			<div class="input-group">
                <td>Nama Barang</td>
                <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                <input type="text" name="nama" value="<?php echo $d['nama']; ?>">
            </div>
            <div class="input-group">
                <td>Satuan</td>
                <input type="text" name="satuan" value="<?php echo $d['satuan']; ?>">
            </div>
            <div class="input-group">
                <td>Jumlah Barang</td>
                <input type="text" name="jumlah" value="<?php echo $d['jumlah']; ?>">
            </div>
             <div class="input-group">
                <td>Harga Barang</td>
                <input type="text" name="harga" value="<?php echo $d['harga']; ?>">
            </div>
            <div class="input-group">
                <button type="submit" name="submit" class="btn">Submit</button>
            </div>		
		</form>

		<?php 
		}
		?>

</body>
</html>
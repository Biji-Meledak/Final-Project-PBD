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
	<div class="container">
		<form method="post" action="tambah_aksi.php" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Tambah Barang</p>
            <div class="input-group">
                <input type="number" placeholder="Id Kategori" name="id_kategori" required>
            </div>
		    <div class="input-group">
                <input type="text" placeholder="Nama Barang" name="nama" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Satuan" name="satuan" required>
            </div>
            <div class="input-group">
                <input type="number" placeholder="Jumlah Barang" name="jumlah" required>
            </div>
            <div class="input-group">
                <input type="number" placeholder="Harga Barang" name="harga" required>
            </div>
            <div class="input-group">
                <button type="submit" name="submit" class="btn">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
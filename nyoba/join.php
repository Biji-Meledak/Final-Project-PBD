<?php 
 
session_start();
 
if (!isset($_SESSION['nama'])) {
    header("Location: login.php");
}
?> 

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <title>Inventory</title>
</head>
<body>

<style type="text/css">
:root{
    --main-bg-color:#8ecae6;
    --main-text-color:#8ecae6;
    --second-text-color:#ced4da;
    --second-bg-color:#f8f9fa;
}

.input-group .btn {
    display: block;
    width: 100%;
    padding: 5px 5px;
    text-align: center;
    border: none;
    background: #8ecae6;
    outline: none;
    border-radius: 30px;
    font-size: 1.2rem;
    color: black;
    cursor: pointer;
    transition: .3s;
}

.primary-text{
    color: var(--main-text-color);
}

.second-text{
    color: var(--second-text-color);
}

.primary-bg{
    background-color: var(--main-bg-color);
}

.second-bg{
    background-color: var(--second-bg-color);
}

.rounded-full{
    border-radius: 100%;
}
#wrapper{
    overflow-x: hidden;
    background-image: linear-gradient(
        to right,
        #90e0ef,
        #caf0f8
    );
}

#sidebar-wrapper{
    min-height: 100vh;
    margin-left: -15rem;
    transition: margin 0.25s ease-out;
}

#sidebar-wrapper .sidebar-heading{
    padding: 0.875rem 1.25rem;
    font-size: 1.2rem;
}

#sidebar-wrapper .list-group{
    width: 15rem;
}

#page-content-wrapper{
    min-width: 100vh;
}

#wrapper.toggled #sidebar-wrapper{
    margin-left: 0;
}

#menu-toggle{
    cursor: pointer;
}

.list-group-item{
    border: none;
    padding: 20px 30px;
}

.list-group-item.active{
    background-color: transparent;
    color: var(--main-text-color);
    font-weight: bold;
    border: none;
}

.text-navbar{
    font-family: Arial, Helvetica, sans-serif;
    font-weight: bold;
}

@media  (min-width:768px){
    #sidebar-wrapper{
        margin-left: 0;
    }
    #page-content-wrapper{
        min-width: 0;
        width: 100%;
    }
    #wrapper.toggled #sidebar-wrapper{
        margin-left: -15rem;
    }
}

</style>

	<div class="d-flex" id="wrapper">

		<!-- Sidebar Awal-->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
                <p>Inventory</p>
            </div>

            <div class="list-group list-group-flush my-3">
                <a href="dashboard.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <p>Dashboard</p>
                </a>
                
                <a href="dataadmin.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i>About US</i>
                </a>

                <a href="cari.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i>Cari Barang</i>
                </a>
                <a href="index.php" class="list-group-item list-group-item-action bg-transparent second-text active">
                    <i>Data Barang</i>
                </a>
            </div>

        </div>

        
        <!-- Sidebar Akhir -->


        <div id="page-content-wrapper">

        	<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-item-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                        <h2 class="fs-4 m-0 text-navbar">Data Barang</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" 
                            id="navbarDropdown" role="button" data-bs-toggle="dropdown" 
                            aria-expanded="false">
                                <i class="fas fa-user me-2"><?php echo $_SESSION['nama']; ?></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="logout.php"">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

    <!-- Isi Content -->        
        <div class="container-fluid px-4">
            <div row g-3 my-2>
                <div class="row my-3">
                    <td>
                        <h3 class="fs-2 mb-3">Barang Saat Ini</h3>
                        <div class="container">
                            <a href="tambah.php"><button class="btn"><i class="bi bi-plus"></i></a></button>
                            <a href="sort.php"><button class="btn"><i class="bi bi-chevron-expand"></i></button></a>
                            <a href="group.php"><button type="button" class="btn btn-outline"><i class="bi bi-filter"></i></button></a>
                            <a href="having.php"><button type="button" class="btn btn-outline"><i class="bi bi-filter-circle"></i></button></a>
                            <a href="index.php"><button type="button" class="btn btn-outline"><i class="bi bi-filter-square"></i></button></a>      
                        </div>
                        <br>
                    </td>
                    <br>
                    </tbody>
                        <div class="col-12">
                            <table class="table bg-white rounded shadow-sm table-hover">
                                <thead class="table-primary">
                                    <tr>
                                        <th scope="col" width="50">ID</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Kategori Barang</th>
                                    </tr>
                                </thead>
		<?php 
		include 'koneksi.php';
		$data = mysqli_query($koneksi,"select barang.id_kategori, nama, kategori.kategori from barang inner join kategori on barang.id_kategori = kategori.id_kategori");
		while($d = mysqli_fetch_array($data)){
			?>
			<tbody>
			<tr>
                <td><?php echo $d['id_kategori']; ?></td>
				<td><?php echo $d['nama']; ?></td>
				<td><?php echo $d['kategori']; ?></td>
			</tr>
			<?php 
			}
			?>
		</tbody>
	</table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        var el = document.getElementById("wrapper")
        var toggleButton = document.getElementById("menu-toggle")

        toggleButton.onclick = function(){
            el.classList.toggle("toggled")
        }
    </script>
</body>
</html>
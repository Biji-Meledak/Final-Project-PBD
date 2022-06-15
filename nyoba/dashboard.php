<?php 

include 'koneksi.php';

session_start();
 
if (!isset($_SESSION['nama'])) {
    header("Location: login.php");
}
?> 

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <title>Final Project</title>
</head>
<body>

<style type="text/css">
:root{
    --main-bg-color:#8ecae6;
    --main-text-color:#8ecae6;
    --second-text-color:#ced4da;
    --second-bg-color:#f8f9fa;
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
                <a href="dashboard.php" class="list-group-item list-group-item-action bg-transparent second-text active">
                    <i>Dashboard</i>
                </a>
                
                <a href="dataadmin.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i>About US</i>
                </a>

                <a href="cari.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i>Cari Barang</i>
                </a>
                <a href="index.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i>Data Barang</i>
                </a>
            </div>

        </div>

        
        <!-- Sidebar Akhir -->


        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-item-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-4 m-0 text-navbar">Dashboard</h2>
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
        <?php 
        include 'koneksi.php';
        $no = 1;
        $data = mysqli_query($koneksi,"select sum(jumlah) as jumlah_stok from barang");
        while($d = mysqli_fetch_array($data)){
            ?>
        <div class="container-fluid px-4">
                
            <div class="row g-3 my-2">
                <div class="col-md-3">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <p class="fs-5">Stok saat ini</p>
                            <h3 class="fs-2"><?php echo $d['jumlah_stok']; ?></h3>
                        </div>
                        <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>
                <?php 
                }
                ?>
                
                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Produk Terlaris</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm table-hover">
                            <thead class="table-primary">
                                <tr>
                                        <th scope="col" width="50">ID</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Satuan</th>
                                        <th scope="col">Jumlah Barang</th>
                                        <th scope="col">Harga Barang</th>
                                </tr>
                            </thead>
                            <tbody>
        <?php 
            include 'koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi,"select * from barang where jumlah between 0 and 5 order by jumlah asc");
            while($d = mysqli_fetch_array($data)){
                ?>
                <tbody>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['nama']; ?></td>
                    <td><?php echo $d['satuan']; ?></td>
                    <td><?php echo $d['jumlah']; ?></td>
                    <td><?php echo $d['harga']; ?></td>
                </tr>
            <?php 
            }
            ?>
        </tbody>
    </table>  
                    </div>
                </div>
            </div>
        </div>
        </div>


    </div>

    



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
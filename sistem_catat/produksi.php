<?php
require 'database.php';

$message = '';

if (isset($_POST['simpan'])) {
    $produk = trim($_POST['produk']);
    $tanggal = trim($_POST['tanggal']);
    $jumlah = trim($_POST['jumlah']);

    if ($produk != '' && $tanggal != '' && $jumlah != '') {
        $kueri = "INSERT INTO tb_produksi (nama_produk, tanggal_produksi, jumlah_hasil) VALUES ('$produk', '$tanggal', '$jumlah')";
        mysqli_query($conn, $kueri);
        $message = '<div class="alert alert-success">Data produksi berhasil disimpan.</div>';
    } else {
        $message = '<div class="alert alert-danger">Semua field wajib diisi.</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tahu Tempe Dua Putri - Produksi</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Tahu Tempe Dua Putri</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Halaman Utama</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Operasional</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Pencatatan
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="beli.php">Pembelian Bahan Baku</a>
                                    <a class="nav-link" href="produksi.php">Produksi</a>
                                    <a class="nav-link" href="jual.php">Penjualan</a>
                                    <a class="nav-link" href="operasional.php">Operasional</a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Admin</div>
                            <a class="nav-link" href="laporan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Laporan
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Produksi Harian</h1>
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="card shadow-sm">
                                    <div class="card-header bg-success text-white">
                                        <h5 class="mb-0">Catat Hasil Produksi</h5>
                                    </div>
                                    <div class="card-body">
                                        <?php echo $message; ?>
                                        <form method="POST" action="">
                                            <div class="form-group">
                                                <label>Tanggal Produksi</label>
                                                <input type="date" name="tanggal" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Produk</label>
                                                <select name="produk" class="form-control" required>
                                                    <option value="Tahu Goreng">Tahu Goreng</option>
                                                    <option value="Tempe">Tempe</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Jumlah Hasil (Papan, Ancak, Rinjing)</label>
                                                <input type="number" name="jumlah" class="form-control" required>
                                            </div>
                                            <button type="submit" name="simpan" class="btn btn-success btn-block btn-lg">Simpan Produksi</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
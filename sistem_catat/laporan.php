<?php
require 'database.php';
require 'cek.php';
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tahu Tempe Dua Putri - Laporan</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Tahu Tempe Dua Putri</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
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
                        <h1 class="mt-4">Laporan</h1>
                        
                        <!-- LAPORAN PENJUALAN -->
                        <div class="card shadow-sm mb-4">
                            <div class="card-header">
                                <i class="fas fa-shopping-cart mr-1"></i>
                                Laporan Penjualan
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tabelPenjualan" class="table table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Kategori</th>
                                                <th>Produk</th>
                                                <th>Jumlah</th>
                                                <th>Pendapatan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = mysqli_query($conn, "SELECT tanggal_jual, kategori_pembeli, nama_produk, jumlah_jual, total_pendapatan FROM tb_penjualan ORDER BY tanggal_jual DESC");
                                            while ($data = mysqli_fetch_assoc($query)) {
                                            ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($data['tanggal_jual']); ?></td>
                                                <td><?php echo htmlspecialchars($data['kategori_pembeli']); ?></td>
                                                <td><?php echo htmlspecialchars($data['nama_produk']); ?></td>
                                                <td><?php echo htmlspecialchars($data['jumlah_jual']); ?></td>
                                                <td>Rp <?php echo number_format($data['total_pendapatan'], 0, ',', '.'); ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- LAPORAN PRODUKSI -->
                        <div class="card shadow-sm mb-4">
                            <div class="card-header">
                                <i class="fas fa-industry mr-1"></i>
                                Laporan Produksi
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tabelProduksi" class="table table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Nama Produk</th>
                                                <th>Jumlah Hasil</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = mysqli_query($conn, "SELECT tanggal_produksi, nama_produk, jumlah_hasil FROM tb_produksi ORDER BY tanggal_produksi DESC");
                                            while ($data = mysqli_fetch_assoc($query)) {
                                            ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($data['tanggal_produksi']); ?></td>
                                                <td><?php echo htmlspecialchars($data['nama_produk']); ?></td>
                                                <td><?php echo htmlspecialchars($data['jumlah_hasil']); ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- LAPORAN PEMBELIAN BAHAN BAKU -->
                        <div class="card shadow-sm mb-4">
                            <div class="card-header">
                                <i class="fas fa-truck mr-1"></i>
                                Laporan Pembelian Bahan Baku
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tabelPembelian" class="table table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Nama Supplier</th>
                                                <th>Nama Bahan</th>
                                                <th>Jumlah Beli</th>
                                                <th>Total Bayar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = mysqli_query($conn, "SELECT tanggal_beli, nama_supplier, nama_bahan, jumlah_beli, total_bayar FROM tb_pembelian ORDER BY tanggal_beli DESC");
                                            while ($data = mysqli_fetch_assoc($query)) {
                                            ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($data['tanggal_beli']); ?></td>
                                                <td><?php echo htmlspecialchars($data['nama_supplier']); ?></td>
                                                <td><?php echo htmlspecialchars($data['nama_bahan']); ?></td>
                                                <td><?php echo htmlspecialchars($data['jumlah_beli']); ?></td>
                                                <td>Rp <?php echo number_format($data['total_bayar'], 0, ',', '.'); ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- LAPORAN OPERASIONAL -->
                        <div class="card shadow-sm mb-4">
                            <div class="card-header">
                                <i class="fas fa-coins mr-1"></i>
                                Laporan Operasional
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tabelOperasional" class="table table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Keterangan</th>
                                                <th>Nominal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = mysqli_query($conn, "SELECT tanggal, keterangan, nominal FROM tb_operasional ORDER BY tanggal DESC");
                                            while ($data = mysqli_fetch_assoc($query)) {
                                            ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($data['tanggal']); ?></td>
                                                <td><?php echo htmlspecialchars($data['keterangan']); ?></td>
                                                <td>Rp <?php echo number_format($data['nominal'], 0, ',', '.'); ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </main>
            </div>
        </div>

        <!-- JQUERY -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        
        <!-- DataTables -->
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        
        <!-- DataTables Buttons -->
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.bootstrap4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
        
        <script>
            $(document).ready(function () {
                // Inisialisasi semua tabel
                $('#tabelPenjualan').DataTable({
                    dom: 'Bfrtip',
                    buttons: ['copy', 'excel', 'pdf', 'print']
                });
                
                $('#tabelProduksi').DataTable({
                    dom: 'Bfrtip',
                    buttons: ['copy', 'excel', 'pdf', 'print']
                });
                
                $('#tabelPembelian').DataTable({
                    dom: 'Bfrtip',
                    buttons: ['copy', 'excel', 'pdf', 'print']
                });
                
                $('#tabelOperasional').DataTable({
                    dom: 'Bfrtip',
                    buttons: ['copy', 'excel', 'pdf', 'print']
                });
            });
        </script>
    </body>
</html>
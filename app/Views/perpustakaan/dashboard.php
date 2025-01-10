<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Perpustakaan</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar {

            height: 100vh;
            background-color: #2c3e50;
            color: white;
            position: fixed;
            width: 250px;
        }

        .sidebar img {
            width: 50px;
            /* Atur ukuran logo */
            height: auto;
            /* Menjaga proporsi gambar */
        }

        .main-content {
            margin-left: 250px;
        }

        .nav-link {
            color: white;
            padding: 10px 20px;
        }

        .nav-link:hover {
            background-color: #34495e;
            color: white;
        }

        .stat-card {
            border-radius: 5px;
            color: white;
        }

        .bg-info-custom {
            background-color: #17a2b8;
        }

        .bg-success-custom {
            background-color: #28a745;
        }

        .bg-warning-custom {
            background-color: #ffc107;
        }

        .bg-danger-custom {
            background-color: #dc3545;
        }

        .more-info {
            position: absolute;
            bottom: 0;
            right: 0;
            padding: 5px 10px;
            color: rgba(255, 255, 255, 0.8);
        }

        .stat-icon {
            font-size: 50px;
            opacity: 0.5;
            position: absolute;
            right: 20px;
            top: 10px;
        }

        .sidebar .dropdown-menu {
            background-color: #34495e;
            border: none;
            margin-left: 20px;
            width: 90%;
        }

        .sidebar .dropdown-item {
            color: white;
            padding: 8px 20px;
        }

        .sidebar .dropdown-item:hover {
            background-color: #2c3e50;
            color: white;
        }

        .nav-link[data-bs-toggle="collapse"] {
            position: relative;
        }

        .nav-link[data-bs-toggle="collapse"]::after {
            content: '\f107';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            position: absolute;
            right: 20px;
        }

        .nav-link.active, .dropdown-item.active {
            background-color: #007bff;
            color: #fff !important;
}

        
    </style>
</head>

<body>
   
    
    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light"></nav>
        <div class="p-3">
            <div class="d-flex align-items-center mb-4">
                <img src="STMIK PLK.jpg" alt="stmik" class="rounded-circle me-2">
                <div>
                    <h6 class="mb-0">Admin</h6>
                </div>
            </div>

            <div class="mb-4">
                <small class="text-muted">MAIN MENU</small>
                <nav class="nav flex-column">
                <a class="nav-link <?= ($activeMenu == 'dashboard') ? 'active' : '' ?>" href="/dashboard">
                    <i class="fas fa-tachometer-alt me-2"></i> 
                        Dashboard
                </a>
                    <!-- Master Data Dropdown -->
                    <a class="nav-link" data-bs-toggle="collapse" href="#masterDataCollapse">
                        <i class="fas fa-database me-2"></i> Master Data
                    </a>
                    <div class="collapse" id="masterDataCollapse">
                        <div class="nav flex-column">
                        <a class="dropdown-item <?= ($activeMenu == 'anggota') ? 'active' : '' ?>" href="/dashboard/anggota">
                                <i class="fas fa-users me-2"></i> Data Anggota
                            </a>

                            <a class="dropdown-item" href="#"><i class="fas fa-user-tie me-2"></i> Data Admin</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-building me-2"></i> Data Penerbit</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-tags me-2"></i> Data Kategori</a>
                        </div>
                    </div>
                    <!-- Katalog Buku Dropdown -->
                    <a class="nav-link" data-bs-toggle="collapse" href="#katalogBukuCollapse">
                        <i class="fas fa-book me-2"></i> Katalog Buku
                    </a>
                    <div class="collapse" id="katalogBukuCollapse">
                        <div class="nav flex-column">
                            <a class="dropdown-item" href="#"><i class="fas fa-book me-2"></i> Data Buku</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-exchange-alt me-2"></i> Transaksi</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-history me-2"></i> Riwayat Transaksi</a>
                        </div>
                    </div>
                </nav>
            </div>
            <div>
                <small class="text-muted">LANJUTAN</small>
                <nav class="nav flex-column">
                    <a class="nav-link" href="logout"><i class="fas fa-sign-out-alt me-2"></i> Keluar</a>
                </nav>
            </div>
        </div>
    </div>
    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom px-2">
            <div class="container-fluid">
                 <h5 class="mb-0"><?= esc($pageTitle); ?></h5>
                 <div class="navbar-text">
                    <?= strftime('%A, %d %B %Y', time()); ?>
                 </div>

            </div>
        </nav>

        <!-- Welcome Message -->
        <div class="p-3 bg-light border-bottom">
            <p class="mb-0">Selamat Datang, Administrator di Administrator Perpustakaan </p>
        </div>

        <!-- Dynamic Content -->
        <div class="p-4">
            <?= isset($content) ? $content : view('perpustakaan/dashboard-cnt', ['stats' => $stats ?? []]) ?>
        </div>
    </div>
            <!-- ... (rest of the content remains the same) ... -->

            <!-- Update Bootstrap JS to version 5 -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>
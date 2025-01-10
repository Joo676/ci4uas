 <!-- Statistics Cards -->
 <div class="p-4">
            <div class="row">
                <div class="col-md-3">
                    <div class="card stat-card bg-info-custom position-relative mb-4">
                        <div class="card-body">
                            <h1 class="mb-1"><?= $stats['anggota'] ?></h1>
                            <p class="mb-0">Anggota</p>
                            <i class="fas fa-users stat-icon"></i>
                            <a href="dashboard/anggota" class="more-info text-white text-decoration-none">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card stat-card bg-success-custom position-relative mb-4">
                        <div class="card-body">
                            <h1 class="mb-1"><?= $stats['buku'] ?></h1>
                            <p class="mb-0">Buku</p>
                            <i class="fas fa-book stat-icon"></i>
                            <a href="#" class="more-info text-white text-decoration-none">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card stat-card bg-warning-custom position-relative mb-4">
                        <div class="card-body">
                            <h1 class="mb-1"><?= $stats['peminjaman'] ?></h1>
                            <p class="mb-0">Peminjaman</p>
                            <i class="fas fa-upload stat-icon"></i>
                            <a href="#" class="more-info text-white text-decoration-none">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card stat-card bg-danger-custom position-relative mb-4">
                        <div class="card-body">
                            <h1 class="mb-1"><?= $stats['pengembalian'] ?></h1>
                            <p class="mb-0">Pengembalian</p>
                            <i class="fas fa-download stat-icon"></i>
                            <a href="#" class="more-info text-white text-decoration-none">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
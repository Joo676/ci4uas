<section id="books" class="pt-3">
    <h2>Manajemen Buku</h2>
    <button class="btn btn-primary mb-3" onclick="window.location.href='/dashboard/tambahBukuForm'">Tambah Buku</button>
    <table class="table table-striped">
        <thead>
            <tr>
                
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($buku)): ?>
                <?php foreach ($buku as $row): ?>
                <tr>
                    
                    <td><?= $row['judul']; ?></td>
                    <td><?= $row['penulis']; ?></td>
                    <td><?= $row['penerbit']; ?></td>
                    <td><?= $row['tahun_terbit']; ?></td>
                    <td><?= $row['jumlah_eksemplar']; ?></td>
                    <td>
                        <a href="/dashboard/editBuku/<?= $row['kode_buku']; ?>" class="btn btn-warning">Edit</a>
                        <a href="/dashboard/hapusBuku/<?= $row['kode_buku']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data buku</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</section>

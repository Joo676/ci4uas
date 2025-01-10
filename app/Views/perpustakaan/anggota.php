<section id="members" class="pt-3">
    <h2>Manajemen Anggota</h2>
    <button class="btn btn-primary mb-3" onclick="window.location.href='/dashboard/tambahAnggotaForm'">Tambah Anggota</button>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID Anggota</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Nomor Telepon</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($anggota)): ?>
            <?php foreach ($anggota as $row): ?>
            <tr>
                <td><?= $row['id_anggota']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['alamat']; ?></td>
                <td><?= $row['nomor_telepon']; ?></td>
                <td><?= $row['email']; ?></td>
                <td>
                    <a href="/dashboard/editAnggota/<?= $row['id_anggota']; ?>" class="btn btn-warning">Edit</a>
                    <a href="/dashboard/hapusAnggota/<?= $row['id_anggota']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus anggota ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td colspan="6" class="text-center">Tidak ada data anggota</td>
            </tr>
            <?php endif; ?> 
        </tbody>
    </table>
</section>


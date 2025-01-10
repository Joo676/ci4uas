<section id="add-book" class="pt-3">
    <h2><?= isset($editMode) && $editMode ? 'Edit Buku' : 'Tambah Buku'; ?></h2>
    <form method="post" action="<?= isset($editMode) && $editMode ? "/dashboard/updateBuku/" . $buku['kode_buku'] : "/dashboard/tambahBuku"; ?>">
        <div class="mb-3">
            <label for="kode_buku" class="form-label">Kode Buku</label>
            <input type="text" class="form-control" id="kode_buku" name="kode_buku" value="<?= isset($buku) ? esc($buku['kode_buku']) : ''; ?>" required <?= isset($editMode) ? 'readonly' : ''; ?>>
        </div>
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="<?= isset($buku) ? esc($buku['judul']) : ''; ?>" required>
        </div>
        <div class="mb-3">
            <label for="penulis" class="form-label">Penulis</label>
            <input type="text" class="form-control" id="penulis" name="penulis" value="<?= isset($buku) ? esc($buku['penulis']) : ''; ?>" required>
        </div>
        <div class="mb-3">
            <label for="penerbit" class="form-label">Penerbit</label>
            <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= isset($buku) ? esc($buku['penerbit']) : ''; ?>" required>
        </div>
        <div class="mb-3">
            <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
            <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" value="<?= isset($buku) ? esc($buku['tahun_terbit']) : ''; ?>" required>
        </div>
        <div class="mb-3">
            <label for="jumlah_eksemplar" class="form-label">Jumlah Eksemplar</label>
            <input type="number" class="form-control" id="jumlah_eksemplar" name="jumlah_eksemplar" value="<?= isset($buku) ? esc($buku['jumlah_eksemplar']) : ''; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary"><?= isset($editMode) && $editMode ? 'Update' : 'Simpan'; ?></button>
        <a href="/dashboard/buku" class="btn btn-secondary">Kembali</a>
    </form>
</section>

<section id="add-member" class="pt-3">
    <h2><?= isset($editMode) && $editMode ? 'Edit Anggota' : 'Tambah Anggota'; ?></h2>
    <form method="post" action="<?= isset($editMode) && $editMode ? "/dashboard/updateAnggota/" . $anggota['id_anggota'] : "/dashboard/tambahAnggota"; ?>">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= isset($anggota) ? esc($anggota['nama']) : ''; ?>" required>
            
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= isset($anggota) ? esc($anggota['alamat']) : ''; ?>" required>
        
        </div>
        <div class="mb-3">
            <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
            <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="<?= isset($anggota) ? esc($anggota['nomor_telepon']) : ''; ?>" required>
      
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= isset($anggota) ? esc($anggota['email']) : ''; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary"><?= isset($editMode) && $editMode ? 'Update' : 'Simpan'; ?></button>
        <a href="/dashboard/anggota" class="btn btn-secondary">Kembali</a>
    </form>
</section>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            
            <div class="row">
                <div class="col-12">
                    <?php Flasher::flash(); ?>
                </div>
            </div>

            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    Edit Profil & Ganti Password
                </div>
                <div class="card-body">
                    <form action="<?= BASEURL; ?>/profil/update" method="post">
                        
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" value="<?= $data['user']['nama_lengkap']; ?>" readonly>
                        </div>
                        
                        <hr>
                        <p class="text-muted">Ganti Password</p>

                        <div class="form-group">
                            <label>Password Lama</label>
                            <input type="password" name="password_lama" class="form-control" required>
                            <small class="text-muted">Masukkan password saat ini untuk verifikasi.</small>
                        </div>

                        <div class="form-group">
                            <label>Password Baru</label>
                            <input type="password" name="password_baru" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Ulangi Password Baru</label>
                            <input type="password" name="password_ulangi" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Simpan Perubahan</button>
                        <a href="<?= BASEURL; ?>/dashboard" class="btn btn-secondary btn-block">Kembali ke Dashboard</a>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        
        <?php Flasher::flash(); ?>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Nasabah</h6>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambah">
                    + Tambah Nasabah
                </button>
            </div>
            
            <div class="card-body">
                
                <div class="table-responsive">
                    
                    <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Username</th>
                                <th>Saldo</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty($data['nasabah'])) : ?>
                                <tr>
                                    <td colspan="5" class="text-center text-muted">
                                        <i>Belum ada data nasabah.</i>
                                    </td>
                                </tr>
                            <?php else : ?>
                                <?php $no = 1; ?>
                                <?php foreach($data['nasabah'] as $usr) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td style="min-width: 150px;"><?= $usr['nama_lengkap']; ?></td>
                                    <td><?= $usr['username']; ?></td>
                                    <td class="font-weight-bold">Rp <?= number_format($usr['saldo'], 0, ',', '.'); ?></td>
                                    <td style="min-width: 100px;"> <a href="<?= BASEURL; ?>/nasabah/hapus/<?= $usr['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?');">Hapus</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>

                </div> </div>
        </div>

    </div>
</div>

<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Nasabah Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= BASEURL; ?>/nasabah/tambah" method="post">
      <div class="modal-body">
          <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" class="form-control" name="nama_lengkap" required>
          </div>
          <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" name="username" required>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>
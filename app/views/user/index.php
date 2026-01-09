<div class="container">

    <div class="row">
        <div class="col-12">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="jumbotron bg-info text-white pt-4 pb-4">
        <h1 class="display-5">Halo, <?= $data['nasabah']['nama_lengkap']; ?>!</h1>
        <p class="lead">Saldo Tabungan Anda:</p>
        <h2 class="font-weight-bold">Rp <?= number_format($data['nasabah']['saldo'], 0, ',', '.'); ?></h2>
    </div>

    <div class="row mb-4">
        
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-success text-white">Setor Tunai</div>
                <div class="card-body">
                    <form action="<?= BASEURL; ?>/transaksi/tambah" method="post">
                        <input type="hidden" name="user_id" value="<?= $data['nasabah']['id']; ?>">
                        <input type="hidden" name="saldo_saat_ini" value="<?= $data['nasabah']['saldo']; ?>">
                        <input type="hidden" name="jenis_transaksi" value="setor">
                        
                        <div class="form-group">
                            <label>Jumlah Setor (Rp)</label>
                            <input type="number" name="jumlah" class="form-control" required min="1000">
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" placeholder="Misal: Nabung harian">
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Setor Uang</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-warning text-white">Tarik Tunai</div>
                <div class="card-body">
                    <form action="<?= BASEURL; ?>/transaksi/tambah" method="post">
                        <input type="hidden" name="user_id" value="<?= $data['nasabah']['id']; ?>">
                        <input type="hidden" name="saldo_saat_ini" value="<?= $data['nasabah']['saldo']; ?>">
                        <input type="hidden" name="jenis_transaksi" value="tarik">
                        
                        <div class="form-group">
                            <label>Jumlah Tarik (Rp)</label>
                            <input type="number" name="jumlah" class="form-control" required min="1000">
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" placeholder="Misal: Beli pulsa">
                        </div>
                        <button type="submit" class="btn btn-warning btn-block text-white">Tarik Uang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        
        <div class="card-header d-flex justify-content-between align-items-center">
            <span class="font-weight-bold">Riwayat Transaksi Terakhir</span>
            <a href="<?= BASEURL; ?>/laporan" target="_blank" class="btn btn-primary btn-sm">
                🖨️ Cetak Laporan
            </a>
        </div>

        <div class="card-body">
            
            <div class="table-responsive">
                
                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Jenis</th>
                            <th>Keterangan</th>
                            <th class="text-right">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($data['transaksi'])) : ?>
                            <tr>
                                <td colspan="4" class="text-center text-muted">Belum ada transaksi.</td>
                            </tr>
                        <?php else : ?>
                            <?php foreach($data['transaksi'] as $t) : ?>
                            <tr>
                                <td><?= date('d-m-Y H:i', strtotime($t['tanggal'])); ?></td>
                                
                                <td>
                                    <?php if($t['jenis_transaksi'] == 'setor') : ?>
                                        <span class="badge badge-success">Setor</span>
                                    <?php else : ?>
                                        <span class="badge badge-warning">Tarik</span>
                                    <?php endif; ?>
                                </td>
                                
                                <td style="min-width: 150px;"><?= $t['keterangan']; ?></td>
                                
                                <td class="text-right font-weight-bold">
                                    Rp <?= number_format($t['jumlah'], 0, ',', '.'); ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>

            </div> </div>
    </div>

</div>
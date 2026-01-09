<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Laporan Transaksi</title>
    <style>
        /* CSS Sederhana untuk Tampilan Kertas */
        body { font-family: sans-serif; padding: 20px; }
        .header { text-align: center; margin-bottom: 20px; border-bottom: 2px solid #333; padding-bottom: 10px; }
        .info { margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #333; padding: 8px; text-align: left; }
        th { background-color: #eee; }
        .text-right { text-align: right; }
    </style>
</head>
<body>

    <div class="header">
        <h2>TABUNGANKU</h2>
        <p>Laporan Riwayat Transaksi Nasabah</p>
    </div>

    <div class="info">
        <p><strong>Nama Nasabah :</strong> <?= $data['nasabah']['nama_lengkap']; ?></p>
        <p><strong>Tanggal Cetak :</strong> <?= date('d-m-Y H:i:s'); ?></p>
        <p><strong>Sisa Saldo :</strong> Rp <?= number_format($data['nasabah']['saldo'], 0, ',', '.'); ?></p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jenis</th>
                <th>Keterangan</th>
                <th class="text-right">Jumlah (Rp)</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach($data['transaksi'] as $t) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= date('d-m-Y H:i', strtotime($t['tanggal'])); ?></td>
                <td><?= strtoupper($t['jenis_transaksi']); ?></td>
                <td><?= $t['keterangan']; ?></td>
                <td class="text-right"><?= number_format($t['jumlah'], 0, ',', '.'); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script>
        window.print();
    </script>

</body>
</html>
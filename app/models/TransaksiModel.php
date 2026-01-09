<?php 

class TransaksiModel {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Ambil Riwayat Transaksi per User
    public function getAllTransaksi($id_user)
    {
        $this->db->query('SELECT * FROM transaksi WHERE user_id = :id ORDER BY tanggal DESC');
        $this->db->bind('id', $id_user);
        return $this->db->resultSet();
    }

    // Proses Tambah Transaksi (Setor/Tarik)
    public function tambahTransaksi($data)
    {
        $jenis = $data['jenis_transaksi'];
        $jumlah = $data['jumlah'];
        $id_user = $data['user_id'];
        $saldo_sekarang = $data['saldo_saat_ini'];

        // Cek Saldo Cukup gak kalau mau Tarik?
        if($jenis == 'tarik' && $saldo_sekarang < $jumlah) {
            return 0; // Gagal, saldo kurang
        }

        // 1. INPUT KE TABEL TRANSAKSI
        $query1 = "INSERT INTO transaksi (user_id, jenis_transaksi, jumlah, keterangan) 
                   VALUES (:user_id, :jenis, :jumlah, :ket)";
        
        $this->db->query($query1);
        $this->db->bind('user_id', $id_user);
        $this->db->bind('jenis', $jenis);
        $this->db->bind('jumlah', $jumlah);
        $this->db->bind('ket', $data['keterangan']);
        $this->db->execute();

        // 2. UPDATE SALDO DI TABEL USERS
        if($jenis == 'setor') {
            $query2 = "UPDATE users SET saldo = saldo + :jumlah WHERE id = :id";
        } else {
            $query2 = "UPDATE users SET saldo = saldo - :jumlah WHERE id = :id";
        }

        $this->db->query($query2);
        $this->db->bind('jumlah', $jumlah);
        $this->db->bind('id', $id_user);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
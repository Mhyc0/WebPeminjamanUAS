<?php

class Laporan extends Controller {
    public function index()
    {
        // 1. Cek Login
        if(!isset($_SESSION['user_session'])) {
            header('Location: ' . BASEURL . '/auth');
            exit;
        }

        // 2. Ambil Data User
        $id_user = $_SESSION['user_session']['id'];
        $data['judul'] = 'Laporan Transaksi';
        
        // Ambil Data Nasabah & Transaksi (Sama seperti Dashboard)
        $data['nasabah'] = $this->model('UserModel')->getUserById($id_user);
        $data['transaksi'] = $this->model('TransaksiModel')->getAllTransaksi($id_user);

        // 3. Tampilkan View KHUSUS Laporan (Tanpa Header/Footer Website)
        $this->view('laporan/index', $data);
    }
}
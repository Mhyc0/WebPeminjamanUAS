<?php 

class Dashboard extends Controller {
    
    public function index()
    {
        // 1. CEK KEAMANAN
        // Jika session kosong, berarti belum login. Tendang ke Auth.
        if(!isset($_SESSION['user_session'])) {
            header('Location: ' . BASEURL . '/auth');
            exit;
        }

        // 2. AMBIL DATA DASAR DARI SESSION
        $data['judul'] = 'Dashboard Tabungan';
        $data['nama_user'] = $_SESSION['user_session']['nama']; 
        $data['role'] = $_SESSION['user_session']['role']; 

        // 3. TAMPILKAN HEADER
        $this->view('templates/header', $data);

        // 4. LOGIKA PEMISAH ADMIN & USER
        if ($data['role'] == 'admin') {
            
            // --- BAGIAN ADMIN ---
            // Ambil semua data nasabah dari database untuk tabel admin
            $data['nasabah'] = $this->model('UserModel')->getAllNasabah();
            
            // Tampilkan view admin
            $this->view('admin/index', $data);
            
        } else {
            
            // --- BAGIAN USER (NASABAH) --- [SUDAH DIUPDATE]
            
            // A. Ambil ID User yang sedang login
            $id_user = $_SESSION['user_session']['id'];
            
            // B. Ambil Data User Terbaru (Agar Saldo Realtime)
            // Menggunakan method getUserById dari UserModel
            $data['nasabah'] = $this->model('UserModel')->getUserById($id_user);
            
            // C. Ambil Riwayat Transaksi
            // Menggunakan method getAllTransaksi dari TransaksiModel
            $data['transaksi'] = $this->model('TransaksiModel')->getAllTransaksi($id_user); 

            // Tampilkan view user
            $this->view('user/index', $data);
        }

        $this->view('templates/footer');
    }
}
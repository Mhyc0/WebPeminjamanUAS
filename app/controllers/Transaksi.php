<?php 

class Transaksi extends Controller {

    public function tambah()
    {
        // Cek Login
        if(!isset($_SESSION['user_session'])) {
            header('Location: ' . BASEURL . '/auth');
            exit;
        }

        // Panggil Model
        if( $this->model('TransaksiModel')->tambahTransaksi($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'dilakukan', 'success');
        } else {
            // Bisa jadi gagal karena saldo kurang
            Flasher::setFlash('gagal', 'dilakukan (Saldo tidak cukup)', 'danger');
        }

        header('Location: ' . BASEURL . '/dashboard');
        exit;
    }
}
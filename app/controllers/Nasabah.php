<?php 

class Nasabah extends Controller {

    // Method untuk Tambah (Dipanggil saat tombol Simpan diklik)
    public function tambah()
    {
        // Cek apakah Admin?
        if($_SESSION['user_session']['role'] != 'admin') {
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        }

        // Panggil Model tambahDataUser
        if( $this->model('UserModel')->tambahDataUser($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        }
    }

    // Method untuk Hapus
    public function hapus($id)
    {
        // Cek Admin
        if($_SESSION['user_session']['role'] != 'admin') {
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        }

        if( $this->model('UserModel')->hapusDataUser($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        }
    }
}
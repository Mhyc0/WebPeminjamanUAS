<?php

class Profil extends Controller {
    
    public function index()
    {
        // 1. Cek Login
        if(!isset($_SESSION['user_session'])) {
            header('Location: ' . BASEURL . '/auth');
            exit;
        }

        // 2. Siapkan Data
        $data['judul'] = 'Edit Profil';
        
        // [BARIS INI PENTING] - Tambahkan ini agar header tidak error
        $data['nama_user'] = $_SESSION['user_session']['nama']; 

        // Ambil data user lengkap untuk diisi di form
        $data['user'] = $this->model('UserModel')->getUserById($_SESSION['user_session']['id']);

        // 3. Tampilkan View
        $this->view('templates/header', $data);
        $this->view('profil/index', $data);
        $this->view('templates/footer');
    }

    public function update()
    {
        if( count($_POST) > 0 ) {
            $id_user = $_SESSION['user_session']['id'];
            $pass_lama = $_POST['password_lama'];
            $pass_baru = $_POST['password_baru'];
            $pass_ulangi = $_POST['password_ulangi'];

            // 1. Ambil data user saat ini
            $user = $this->model('UserModel')->getUserById($id_user);

            // 2. Cek apakah Password Lama Benar?
            if( password_verify($pass_lama, $user['password']) ) {
                
                // 3. Cek apakah Password Baru dan Ulangi sama?
                if( $pass_baru == $pass_ulangi ) {
                    
                    // 4. Lakukan Update
                    if( $this->model('UserModel')->ubahPasswordUser($id_user, $pass_baru) > 0 ) {
                        Flasher::setFlash('berhasil', 'diubah', 'success');
                    } else {
                        // Kalau password baru sama persis dengan lama
                        Flasher::setFlash('berhasil', 'diubah (Password sama)', 'info');
                    }
                } else {
                    Flasher::setFlash('gagal', 'Password baru tidak cocok', 'danger');
                }

            } else {
                Flasher::setFlash('gagal', 'Password lama salah', 'danger');
            }

            header('Location: ' . BASEURL . '/profil');
            exit;
        }
    }
}
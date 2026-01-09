<?php

class Auth extends Controller {
    
    public function index()
    {
        $data['judul'] = 'Login - Project Tabungan';
        $this->view('auth/index', $data);
    }

    public function login()
    {
        // 1. Cek apakah ada kiriman data POST
        if( count($_POST) > 0 ) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // 2. Ambil data user dari Database berdasarkan Username
            $user = $this->model('UserModel')->getUserByUsername($username);

            // 3. Cek apakah User ditemukan?
            if( $user ) {
                // 4. Cek Password (Hash Verification)
                if( password_verify($password, $user['password']) ) {
                    
                    // LOGIN SUKSES: Buat Session
                    $_SESSION['user_session'] = [
                        'id' => $user['id'],
                        'nama' => $user['nama_lengkap'],
                        'role' => $user['role']
                    ];

                    // Redirect ke Dashboard (Nanti kita buat)
                    header('Location: ' . BASEURL . '/dashboard');
                    exit;
                }
            }

            // LOGIN GAGAL: Set Pesan Error & Kembali ke Login
            Flasher::setFlash('Gagal', 'Username atau Password salah', 'danger');
            header('Location: ' . BASEURL . '/auth');
            exit;
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: ' . BASEURL . '/auth');
        exit;
    }
}
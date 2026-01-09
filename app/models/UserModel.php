<?php 

class UserModel {
    private $table = 'users';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // 1. Cek Login (Cari user by username)
    public function getUserByUsername($username)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE username = :username');
        $this->db->bind('username', $username);
        return $this->db->single();
    }

    // 2. Ambil Semua Nasabah (Untuk Tabel Admin)
    public function getAllNasabah()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE role = :role ORDER BY nama_lengkap ASC');
        $this->db->bind('role', 'user');
        return $this->db->resultSet();
    }

    // 3. Tambah Nasabah Baru (Logic Insert)
    public function tambahDataUser($data)
    {
        $query = "INSERT INTO users (nama_lengkap, username, password, role, saldo) 
                  VALUES (:nama, :user, :pass, 'user', 0)";
        
        $this->db->query($query);
        $this->db->bind('nama', $data['nama_lengkap']);
        $this->db->bind('user', $data['username']);
        $this->db->bind('pass', password_hash($data['password'], PASSWORD_DEFAULT));

        $this->db->execute();
        return $this->db->rowCount();
    }

    // 4. Hapus Nasabah (Logic Delete)
    public function hapusDataUser($id)
    {
        $query = "DELETE FROM users WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        
        $this->db->execute();
        return $this->db->rowCount();
    }

    // 5. Ambil Data User Berdasarkan ID (Untuk Dashboard User & Profil)
    public function getUserById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    // --- [INI BAGIAN BARU] ---
    // 6. Update Password User (Fitur Edit Profil)
    public function ubahPasswordUser($id, $password_baru)
    {
        $query = "UPDATE users SET password = :pass WHERE id = :id";
        
        $this->db->query($query);
        // Kita hash password baru sebelum disimpan
        $this->db->bind('pass', password_hash($password_baru, PASSWORD_DEFAULT));
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
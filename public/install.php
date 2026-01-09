<?php
// File: public/install.php
// Buka di browser: localhost/project-tabungan/public/install.php

require_once '../app/config/Config.php';
require_once '../app/core/Database.php';

$db = new Database;

// Data Admin
$username = 'admin';
$password = 'admin123'; // <--- Password admin nanti ini
$nama = 'Administrator';
$role = 'admin';

// Hash Password
$pass_hash = password_hash($password, PASSWORD_DEFAULT);

try {
    $query = "INSERT INTO users (nama_lengkap, username, password, role, saldo) 
              VALUES (:nama, :user, :pass, :role, 0)";
    
    $db->query($query);
    $db->bind('nama', $nama);
    $db->bind('user', $username);
    $db->bind('pass', $pass_hash);
    $db->bind('role', $role);
    $db->execute();

    echo "<h1>Sukses!</h1>";
    echo "Akun Admin berhasil dibuat.<br>";
    echo "Username: <b>$username</b><br>";
    echo "Password: <b>$password</b><br>";
    echo "<br><a href='index.php'>Ke Halaman Utama</a>";

} catch (PDOException $e) {
    echo "<h1>Gagal / Sudah Ada</h1>";
    echo "Pesan Error: " . $e->getMessage();
}
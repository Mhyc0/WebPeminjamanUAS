<?php
// File: public/reset.php
// Buka di browser: localhost/project-tabungan/public/reset.php

require_once '../app/config/Config.php';
require_once '../app/core/Database.php';

$db = new Database;

// Kita set password baru yang benar
$username = 'admin';
$password_baru = 'admin123';
$password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

try {
    // Update password user admin
    $query = "UPDATE users SET password = :pass WHERE username = :user";
    
    $db->query($query);
    $db->bind('pass', $password_hash);
    $db->bind('user', $username);
    $db->execute();

    echo "<h1>SUKSES!</h1>";
    echo "Password untuk user <b>$username</b> sudah diubah menjadi: <b>$password_baru</b><br>";
    echo "Silakan coba login lagi.";
    echo "<br><br><a href='auth'>Ke Halaman Login</a>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
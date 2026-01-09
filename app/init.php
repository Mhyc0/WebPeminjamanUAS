<?php 

// 1. Panggil Konfigurasi (BASEURL & DB)
require_once 'config/Config.php';

// 2. Panggil Core MVC
require_once 'core/App.php';
require_once 'core/Controller.php';

// 3. Panggil Database Wrapper
require_once 'core/Database.php';

// 4. Panggil Flasher (Pesan Notifikasi)
// Pastikan file app/core/Flasher.php sudah ada, meski isinya masih kosong/dasar
require_once 'core/Flasher.php';
# 🏦 TabunganKu - Aplikasi Tabungan Digital (PHP MVC)

**TabunganKu** adalah aplikasi web simulasi perbankan sederhana (mini-banking) yang dibangun menggunakan **PHP Native** dengan arsitektur **MVC (Model-View-Controller)**.

Project ini dirancang untuk mendemonstrasikan pengelolaan data nasabah, transaksi keuangan (setor/tarik), dan pelaporan dengan tampilan antarmuka (UI/UX) yang modern serta **Fully Responsive** (tampilan menyesuaikan HP dan Desktop).

## 📸 Galeri Aplikasi

Berikut adalah tampilan antarmuka aplikasi **TabunganKu**:

### 1. Halaman Login & Keamanan
Tampilan login dengan desain modern, gradasi warna, dan validasi keamanan.

![Halaman Login](assets/login.jpg)

### 2. Dashboard Nasabah (Mobile View)
Aplikasi sangat responsif saat dibuka di HP. Nasabah bisa melihat saldo, melakukan setor/tarik tunai, dan mengecek riwayat transaksi dengan tabel yang bisa digeser (scrollable).

![Mobile Dashboard](assets/mobile-user.jpg)

### 3. Dashboard Admin
Administrator dapat melihat, menambah, dan mengelola daftar nasabah dengan mudah. Tabel otomatis menyesuaikan lebar layar.

![Admin Dashboard](assets/admin-list.jpg)

---

## ✨ Fitur Utama

### 🔐 Multi-Level User
- **Administrator:** Mengelola data master nasabah (CRUD).
- **Nasabah:** Melakukan transaksi keuangan pribadi.

### 📱 Responsive Design
- Menggunakan **Bootstrap 4** yang dimodifikasi.
- Tampilan tabel otomatis menjadi *scrollable* saat dibuka di layar kecil (HP/Tablet).
- Tombol dan input form didesain ramah sentuhan jari (touch-friendly).

### 💸 Fitur Transaksi
- **Real-time Saldo:** Saldo otomatis bertambah/berkurang setelah transaksi.
- **Validasi:** Mencegah penarikan jika saldo tidak cukup.
- **Riwayat:** Mencatat tanggal, jenis transaksi, dan keterangan.
- **Cetak Laporan:** Fitur print otomatis ke PDF untuk bukti transaksi.

### ⚙️ Profil & Keamanan
- Password dienkripsi menggunakan `password_hash()` (Bcrypt).
- Nasabah dapat mengganti password mereka sendiri melalui menu **Edit Profil**.

## 🚀 Teknologi

- **Backend:** PHP 8 (Native MVC)
- **Frontend:** Bootstrap 4, CSS3 Custom, Google Fonts (Poppins)
- **Database:** MySQL
- **Server:** Apache (XAMPP/Laragon)

## 📂 Struktur MVC

```text
project-tabungan/
├── app/
│   ├── config/       # Konfigurasi DB & BaseURL
│   ├── controllers/  # Logika (Auth, Dashboard, Transaksi)
│   ├── models/       # Query Database (User, Transaksi)
│   └── views/        # Tampilan (HTML/PHP)
├── public/
│   ├── css/          # Style.css (Desain Kustom)
│   ├── assets/       # Gambar/Screenshot
│   └── index.php     # Routing Utama
└── db_tabungan.sql   # File Database

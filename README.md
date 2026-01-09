# 🏦 TabunganKu - Aplikasi Tabungan Digital 

Project ini dirancang untuk mendemonstrasikan pengelolaan data nasabah, transaksi keuangan (setor/tarik), dan pelaporan dengan tampilan antarmuka (UI/UX) yang modern serta **Fully Responsive** (tampilan menyesuaikan HP dan Desktop).

## 📸 Galeri Aplikasi

Berikut adalah tampilan antarmuka aplikasi **TabunganKu**:

### 1. Halaman Login & Keamanan
Tampilan login dengan desain modern, gradasi warna, dan validasi keamanan.

<img width="1901" height="1037" alt="image" src="https://github.com/user-attachments/assets/1b1da566-6f30-4bfe-95f6-d6b28cb5d7aa" />


### 2. Dashboard Nasabah (Mobile View)
Aplikasi sangat responsif saat dibuka di HP. Nasabah bisa melihat saldo, melakukan setor/tarik tunai, dan mengecek riwayat transaksi dengan tabel yang bisa digeser (scrollable).


<img src="https://github.com/user-attachments/assets/32c10163-7e32-4287-869d-e4a3ecb6550b" width="250" alt="Tampilan Mobile VibeCheck">  <img width="1897" height="1073" alt="image" src="https://github.com/user-attachments/assets/82e7b2f7-a33f-44a5-9bc4-7d3852406083" />



### 3. Dashboard Admin
Administrator dapat melihat, menambah, dan mengelola daftar nasabah dengan mudah. Tabel otomatis menyesuaikan lebar layar.

<img width="1915" height="1071" alt="image" src="https://github.com/user-attachments/assets/035e3bcf-7fa1-4cef-aca4-2493ce6ab2c4" />

<img src="https://github.com/user-attachments/assets/26302790-fb3a-4764-90b9-5e2fe206a976" width="250" alt="Tampilan Mobile VibeCheck">
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

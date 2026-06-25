# Aplikasi CRUD Data Mahasiswa

Aplikasi berbasis web sederhana untuk mengelola data mahasiswa, dibangun menggunakan framework **Laravel**. Aplikasi ini dibuat untuk memenuhi tugas pemrograman web yang mengimplementasikan fungsi Create, Read, Update, dan Delete (CRUD) dengan arsitektur MVC.

## 🚀 Fitur Utama
- **Manajemen Data Mahasiswa:** Tambah, lihat, ubah, dan hapus data mahasiswa.
- **Relasi Database (ORM):** Implementasi relasi *One-to-Many* antara tabel `jurusans` dan `mahasiswas` menggunakan Eloquent ORM.
- **Server-Side Validation:** Validasi input formulir secara ketat dari sisi server (contoh: NIM wajib angka & unik, nama tidak boleh kosong).
- **Desain Responsif:** Tampilan antarmuka (*User Interface*) dibangun menggunakan framework CSS **Bootstrap 5**.

## 🛠️ Teknologi yang Digunakan
- **Backend:** Laravel 11 (PHP)
- **Database:** MySQL
- **Frontend:** HTML, Blade Templating, Bootstrap 5 (via CDN)
- **Environment:** Laragon / XAMPP

## 📋 Persyaratan (Prerequisites)
Pastikan komputer Anda sudah terinstal perangkat lunak berikut:
- PHP (minimal versi 8.2)
- Composer
- MySQL (bisa melalui Laragon/XAMPP)
- Git

## ⚙️ Langkah Instalasi
Ikuti langkah-langkah berikut untuk menjalankan aplikasi ini di komputer lokal Anda:

1. **Clone repositori ini**
   git clone [https://github.com/nabilmiftah/Mhsiswa-Laravel.git]
   cd Mhsiswa-Laravel

2. Instal dependasi
    - composer install

3. Salin file environment
    - cp .env.example .env

4. Generate Application Key
    - php artisan key:generate

5. Konfigurasi database
    Buka file .env, lalu sesuaikan konfigurasi database dengan milik Anda: (Pastikan Anda sudah membuat database kosong bernama db_tugas_mahasiswa di MySQL)

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=db_tugas_mahasiswa
    DB_USERNAME=root
    DB_PASSWORD=

6. Jalankan Migrasi Database
    - php artisan migrate
7. Jalankan server lokal
    - php artisan serve
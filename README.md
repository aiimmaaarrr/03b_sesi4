# Praktikum Pemrograman Web Lanjut - Sesi 4 (Modul 3b)

Repositori ini berisi hasil praktikum mengenai implementasi **Sistem Autentikasi**, **Middleware**, dan **Keamanan Aplikasi** menggunakan Laravel Breeze di Laravel 12. Proyek ini fokus pada pengamanan fitur CRUD Mahasiswa dan Matakuliah yang telah dibuat sebelumnya.

## 🚀 Fitur Utama
- **Autentikasi User**: Fitur Login, Register, dan Logout menggunakan Laravel Breeze.
- **Middleware Protection**: Mengamankan route `mahasiswa` dan `matakuliah` sehingga hanya bisa diakses setelah login.
- **Audit Trail (Ownership)**: Setiap data mahasiswa yang disimpan otomatis mencatat ID user yang menginputnya (`user_id`).
- **Custom Middleware**: Pembatasan hak akses hapus data hanya untuk pengguna dengan domain email `@ikmi.ac.id`.
- **Dashboard Ringkasan**: Menampilkan total data mahasiswa dan mata kuliah menggunakan Eloquent Count.

---

## 📊 Analisis Alur Kerja Middleware
Berdasarkan bantuan AI dan panduan modul, alur kerja middleware dalam proyek ini adalah:
1. **Pre-Processor**: Middleware bertindak sebagai filter antara request user dan controller.
2. **Layer Autentikasi**: Middleware `auth` mengecek apakah session user tersedia. Jika tidak, user diarahkan ke halaman login.
3. **Layer Otorisasi (Custom)**: Middleware `CheckEmailIkmi` melakukan validasi spesifik pada string email user sebelum mengizinkan aksi `destroy` (hapus data) dijalankan.

---

## 📸 Cuplikan Layar (Screenshots)

### 1. Halaman Login & Register
Sistem masuk dan pendaftaran user menggunakan Laravel Breeze (Tailwind CSS).
<img width="1907" height="829" alt="Screenshot 2026-02-17 234604" src="https://github.com/user-attachments/assets/9bd03a1b-330f-48ad-a6f4-53cb663424ca" />

### 2. Dashboard Statistik (Tugas Mandiri 1)
Menampilkan jumlah total Mahasiswa dan Mata Kuliah secara dinamis dari database.
<img width="1910" height="589" alt="Screenshot 2026-02-17 234934" src="https://github.com/user-attachments/assets/d6735226-0658-4742-a78a-d14d7f84f71b" />

### 3. Keamanan Middleware 403 (Tugas Mandiri 2
Tampilan error "403 Forbidden" saat mencoba menghapus data menggunakan email selain `@ikmi.ac.id`.
<img width="1919" height="657" alt="Screenshot 2026-02-17 235107" src="https://github.com/user-attachments/assets/c541961d-539c-4eb8-9584-1b8286fd3f02" />

---

## 🛡️ Etika & Keamanan Data
- **Hashing Password**: Sistem menggunakan enkripsi `bcrypt` secara otomatis untuk menjaga kerahasiaan data user.
- **Privasi Admin**: Mengikuti prinsip etika dimana admin tidak boleh melihat password user secara langsung di database.
- **Validasi Input**: Menggunakan aturan `required|email|lowercase` untuk menjaga konsistensi data.

## 🛠️ Teknologi yang Digunakan
- **Framework:** Laravel 12
- **Starter Kit:** Laravel Breeze (Blade & Tailwind)
- **Database:** MySQL (XAMPP)
- **Tools:** VS Code & GitHub

## 📝 Cara Menjalankan Secara Lokal
1. Clone repositori ini.
2. Jalankan `composer install` & `npm install`.
3. Atur `.env` (pastikan DB_DATABASE=db_mahasiswa).
4. Jalankan `php artisan migrate`.
5. Jalankan `npm run dev` dan `php artisan serve`.

---
**Disusun oleh:** Aimar Trophy Sudrajat - 43240335

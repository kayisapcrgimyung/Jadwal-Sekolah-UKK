# Konsep Web
Website untuk membuat jadwal pelajaran

# Fitur Web
- Login dan Logout
- Halaman dashboard Admin dan User
- Halaman jadwal (untuk isi jadwal)
- Halaman guru dan murid (untuk isi data guru dan murid)
- Halaman kelas (untuk membuat data kelas)
- Halaman lihat jadwal
- Halaman lihat kelas
- Print jadwal

# Multi User
## Admin
- Dapat menambahkan data guru
- Dapat menambahkan data siswa
- Dapat membuat data kelas
- Dapat menambahkan jadwal
- Dapat melihat jadwal
- Dapat melihat kelas
- Dapat print jadwal

## User
- Dapat melihat jadwal
- Dapat print jadwal

# Akun Default Untuk Pengujian
## Admin
- Username: ADM000
- Password: admin123

## User
Untuk user bisa di buatkan terlebih dahulu akunnya di halaman admin

Untuk admin dapat Login di URL /admin/login. Sedangkan untuk user sendiri dapat login di URL /login. Di sini juga user ada 2 yakni guru dan murid akan tetapi halamannya tetap sama, yang berbeda hanya halaman login admin, karena admin hanya ada satu.

# Teknologi Yang Digunakan
- Laravel 12
- CSS
- Java Script
- Tailwind CSS
- Laravel Excel
- Laravel PDF

# Persyaratan Instalasi
- Menggunakan php versi 8.2.12
- Web Browser

# Entity Relationship Diagram
![Image](https://github.com/user-attachments/assets/fe275963-d118-4016-a6a9-416efcdd9565)

# Use Case Diagram 
<img width="2090" height="188" alt="Image" src="https://github.com/user-attachments/assets/4d7cf8f0-ba4e-4fae-8e56-6aed1769265f" />

# Instalasi

### 1. Clone Repository
git clone https://github.com/kayisapcrgimyung/Jadwal-Sekolah-UKK.git

composer install

cp .env.example .env

### 2. Konfigurasi Database Pada File .env
DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=ukk-jadwal

DB_USERNAME=root

DB_PASSWORD=

### 3. Migrasi dan Menyambungkan Storage
php artisan key:generate

php artisan storage:link

php artisan migrate --seed

### 4. Mulai Website
php artisan serve / php artisan ser

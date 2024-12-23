# Toni Kroos Academy Website

Selamat datang di **Toni Kroos Academy**! Website ini dibuat sebagai platform untuk memungkinkan penggemar sepak bola mendaftar dan bergabung dengan akademi, mendapatkan informasi tentang Toni Kroos, dan melihat data peserta yang terdaftar.

## Struktur Proyek

Proyek ini terdiri dari beberapa file utama yang berfungsi untuk menangani tampilan, interaksi, dan penyimpanan data pengguna.

### Struktur Direktori


### Deskripsi Halaman

#### 1. **index.html**
   - Halaman utama yang menyambut pengguna dengan logo dan informasi tentang akademi.
   - Berisi navigasi menuju halaman formulir pendaftaran dan tabel data.

#### 2. **form.html**
   - Halaman formulir untuk pengguna yang ingin bergabung dengan Toni Kroos Academy.
   - Formulir ini berisi input untuk nama, email, tanggal lahir, pemain favorit, dan posisi pemain (midfielder, forward, defender).
   - Formulir ini menggunakan validasi HTML5 dan JavaScript untuk memastikan input valid sebelum disubmit.

#### 3. **table.php**
   - Halaman untuk menampilkan data peserta yang terdaftar di akademi.
   - Menggunakan PHP untuk mengambil data dari database dan menampilkannya dalam tabel yang responsif.
   - Fitur: Penyaringan pesan sukses dan error setelah data berhasil disimpan atau ada kesalahan.

#### 4. **koneksi.php**
   - Berfungsi untuk menghubungkan website dengan database MySQL.
   - Menggunakan kelas `Koneksi` yang menyediakan fungsi `getConnection()` untuk mendapatkan koneksi database.
   - Pastikan untuk mengonfigurasi kredensial database (host, username, password, nama database).

#### 5. **mahasiswa_controller.php**
   - Kelas `MahasiswaController` yang menangani logika untuk mendapatkan data mahasiswa dari database dan menyimpan data baru.
   - Fungsi `getMahasiswa()` mengambil semua data dari tabel `users`.
   - Fungsi `saveMahasiswa()` menyimpan data peserta baru ke database menggunakan prepared statements untuk mencegah SQL injection.

#### 6. **style.css**
   - File CSS untuk styling halaman-halaman website, termasuk tabel, formulir, dan elemen-elemen lainnya.
   - Menambahkan fitur sticky header untuk tabel dan membuat tabel scrollable jika data terlalu panjang.

### Penggunaan

1. **Menjalankan Website**:
   - Pastikan Anda memiliki server lokal seperti XAMPP atau LAMP yang sudah terinstal.
   - Tempatkan semua file di folder root server lokal Anda (misalnya `htdocs` untuk XAMPP).
   - Akses halaman `index.html` melalui browser.

2. **Database**:
   - Buatlah database dengan nama `toni_kroos_academy` dan buat tabel `users` dengan perintah SQL berikut:

   ```sql
   CREATE TABLE users (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(255) NOT NULL,
       email VARCHAR(255) NOT NULL,
       dob DATE NOT NULL,
       favorite_player VARCHAR(255) NOT NULL,
       position ENUM('Midfielder', 'Forward', 'Defender') NOT NULL
   );

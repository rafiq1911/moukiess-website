# 📖 Panduan Instalasi Lengkap - Moukiess Website

Panduan step-by-step untuk menginstall dan menjalankan website Moukiess di komputer Anda.

## 📋 Persiapan

### 1. Install Software yang Diperlukan

#### Windows:
1. **Download XAMPP** (sudah include PHP, MySQL, Apache)
   - Link: https://www.apachefriends.org/download.html
   - Pilih versi PHP 8.1 atau lebih tinggi
   - Install di `C:\xampp`

2. **Download Composer**
   - Link: https://getcomposer.org/download/
   - Jalankan installer
   - Pastikan PHP sudah di PATH

#### Mac:
1. **Install Homebrew** (jika belum ada)
   ```bash
   /bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"
   ```

2. **Install PHP**
   ```bash
   brew install php@8.1
   ```

3. **Install MySQL**
   ```bash
   brew install mysql
   ```

4. **Install Composer**
   ```bash
   brew install composer
   ```

#### Linux (Ubuntu/Debian):
```bash
sudo apt update
sudo apt install php8.1 php8.1-mysql php8.1-xml php8.1-curl php8.1-mbstring php8.1-zip
sudo apt install mysql-server
sudo apt install composer
```

## 🚀 Instalasi Project

### Langkah 1: Prepare Project Files

1. Pastikan semua file project sudah ada di folder yang Anda inginkan
2. Buka terminal/command prompt
3. Navigasi ke folder project:
   ```bash
   cd path/to/moukiess
   ```

### Langkah 2: Install Dependencies

```bash
composer install
```

**Catatan:** Proses ini akan download semua package Laravel yang diperlukan. Tunggu hingga selesai.

### Langkah 3: Setup Environment

1. Copy file environment:
   ```bash
   # Windows
   copy .env.example .env
   
   # Mac/Linux
   cp .env.example .env
   ```

2. Generate application key:
   ```bash
   php artisan key:generate
   ```

### Langkah 4: Setup Database

#### Menggunakan XAMPP (Windows):

1. Buka XAMPP Control Panel
2. Start **Apache** dan **MySQL**
3. Klik tombol **Admin** di samping MySQL (akan buka phpMyAdmin)
4. Klik tab **SQL**
5. Jalankan query ini:
   ```sql
   CREATE DATABASE moukiess_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```

#### Menggunakan MySQL Command Line:

1. Buka terminal/command prompt
2. Login ke MySQL:
   ```bash
   # Windows (XAMPP)
   C:\xampp\mysql\bin\mysql -u root
   
   # Mac/Linux
   mysql -u root -p
   ```

3. Buat database:
   ```sql
   CREATE DATABASE moukiess_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   exit;
   ```

### Langkah 5: Konfigurasi File .env

1. Buka file `.env` dengan text editor
2. Edit bagian database:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=moukiess_db
   DB_USERNAME=root
   DB_PASSWORD=
   ```

   **Catatan:**
   - Jika menggunakan XAMPP, password biasanya kosong
   - Jika ada password, isi di `DB_PASSWORD`

3. Edit informasi social media:
   ```env
   INSTAGRAM_URL=https://instagram.com/moukiess
   WHATSAPP_NUMBER=6281234567890
   WHATSAPP_MESSAGE="Halo, saya tertarik dengan produk Moukiess"
   ```

   **Penting:**
   - Ganti `moukiess` dengan username Instagram Anda
   - Ganti `6281234567890` dengan nomor WhatsApp Anda (format: 62xxx tanpa +)

### Langkah 6: Jalankan Migration & Seeder

```bash
php artisan migrate --seed
```

Perintah ini akan:
- Membuat tabel `products` di database
- Mengisi database dengan 8 produk sample

**Output yang benar:**
```
Migration table created successfully.
Migrating: 2024_01_01_000000_create_products_table
Migrated:  2024_01_01_000000_create_products_table
Seeding: Database\Seeders\ProductSeeder
Seeded:  Database\Seeders\ProductSeeder
Database seeding completed successfully.
```

### Langkah 7: Jalankan Server

```bash
php artisan serve
```

**Output:**
```
Starting Laravel development server: http://127.0.0.1:8000
```

### Langkah 8: Buka Website

1. Buka browser (Chrome, Firefox, Safari, dll)
2. Akses URL: `cara` atau `http://127.0.0.1:8000`
3. Website Moukiess akan tampil dengan 8 produk cookies! 🎉

## ✅ Checklist Verifikasi

Pastikan semua ini sudah berhasil:

- [ ] Server Laravel running tanpa error
- [ ] Website bisa diakses di browser
- [ ] Tampilan website colorful dan modern
- [ ] Menampilkan 8 produk cookies
- [ ] Icon Instagram dan WhatsApp muncul di header
- [ ] Klik icon Instagram membuka halaman Instagram
- [ ] Klik icon WhatsApp membuka WhatsApp
- [ ] Tombol "Pesan Sekarang" berfungsi
- [ ] Animasi background bergerak smooth

## 🐛 Troubleshooting

### Error: "Access denied for user 'root'@'localhost'"

**Solusi:**
1. Pastikan MySQL running (di XAMPP atau service)
2. Cek username dan password di file `.env`
3. Jika ada password MySQL, tambahkan di `DB_PASSWORD`

### Error: "Database [moukiess_db] does not exist"

**Solusi:**
```sql
CREATE DATABASE moukiess_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### Error: "Class 'Composer\...' not found"

**Solusi:**
```bash
composer install
composer dump-autoload
```

### Error: "The stream or file ... could not be opened"

**Solusi:**
```bash
# Windows
mkdir storage\logs
mkdir bootstrap\cache

# Mac/Linux
mkdir -p storage/logs
mkdir -p bootstrap/cache
chmod -R 775 storage bootstrap/cache
```

### Website Tidak Muncul / Error 404

**Solusi:**
1. Pastikan server running: `php artisan serve`
2. Akses URL yang benar: `http://localhost:8000`
3. Clear cache: `php artisan cache:clear`

### WhatsApp/Instagram Link Tidak Berfungsi

**Solusi:**
1. Cek file `.env` sudah di-save
2. Restart server: Stop (Ctrl+C) dan jalankan lagi `php artisan serve`
3. Clear config cache: `php artisan config:clear`

## 🔄 Restart Server

Jika melakukan perubahan pada file `.env` atau konfigurasi:

1. Stop server: Tekan `Ctrl + C` di terminal
2. Clear cache:
   ```bash
   php artisan config:clear
   php artisan cache:clear
   ```
3. Start server lagi:
   ```bash
   php artisan serve
   ```

## 📊 Akses Database

### Via phpMyAdmin (XAMPP):
1. Buka browser
2. Akses: `http://localhost/phpmyadmin`
3. Klik database `moukiess_db`
4. Klik tabel `products`

### Via MySQL Command Line:
```bash
# Login
mysql -u root -p

# Pilih database
USE moukiess_db;

# Lihat produk
SELECT * FROM products;

# Update harga produk
UPDATE products SET price = 50000 WHERE id = 1;

# Tambah stok
UPDATE products SET stock = stock + 10 WHERE id = 1;
```

## 🎨 Customize Website

### Ganti Warna Theme:

Edit file `resources/views/layouts/app.blade.php`, cari bagian:
```css
:root {
    --primary: #FF6B9D;    /* Ganti dengan warna favorit */
    --secondary: #C06C84;
    --accent: #F67280;
    /* dst... */
}
```

Setelah edit, refresh browser (Ctrl+F5).

### Ganti Nama Brand:

1. Edit `.env`: Ubah `APP_NAME`
2. Edit `resources/views/layouts/app.blade.php`: Cari "Moukiess" dan ganti

## 📱 Testing Social Media Links

### Test Instagram:
1. Klik icon Instagram di header
2. Harus membuka halaman Instagram Anda di tab baru

### Test WhatsApp:
1. Klik icon WhatsApp di header
2. Harus membuka WhatsApp dengan pesan otomatis terisi
3. Klik tombol "Pesan Sekarang via WhatsApp"
4. Harus membuka WhatsApp dengan pesan pemesanan

## 🎉 Selesai!

Website Moukiess Anda sudah siap digunakan! 

Jika ada pertanyaan atau masalah, silakan hubungi developer atau cek dokumentasi Laravel di https://laravel.com/docs

---

**Happy Selling! 🍪✨**

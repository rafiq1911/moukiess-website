# 🚀 Quick Start Guide - Moukiess

Panduan cepat untuk menjalankan website Moukiess dalam 5 menit!

## 📦 Yang Anda Butuhkan

1. **XAMPP** (sudah include PHP & MySQL) - [Download](https://www.apachefriends.org/download.html)
2. **Composer** - [Download](https://getcomposer.org/download/)

## ⚡ 5 Langkah Instalasi

### 1️⃣ Install Composer Dependencies
```bash
composer install
```

### 2️⃣ Setup Environment
```bash
# Windows
copy .env.example .env

# Mac/Linux  
cc
```

Kemudian generate key:
```bash
php artisan key:generate
```

### 3️⃣ Konfigurasi Database

Edit file `.env` dan sesuaikan:
```env
DB_DATABASE=moukiess_db
DB_USERNAME=root
DB_PASSWORD=
```

**Jangan lupa ganti Instagram & WhatsApp:**
```env
INSTAGRAM_URL=https://instagram.com/username_anda
WHATSAPP_NUMBER=6281234567890
```

### 4️⃣ Buat Database & Jalankan Migration

**Via phpMyAdmin:**
1. Buka http://localhost/phpmyadmin
2. Klik "New" atau "SQL"
3. Jalankan: `CREATE DATABASE moukiess_db;`

**Via Command Line:**
```bash
# Buat database
mysql -u root -e "CREATE DATABASE moukiess_db;"

# Jalankan migration & seeder
php artisan migrate --seed
```

### 5️⃣ Jalankan Server
```bash
php artisan serve
```

Buka browser: **http://localhost:8000** 🎉

---

## 🎨 Fitur Website

✅ **Katalog Produk** - 8 jenis cookies dengan deskripsi lengkap  
✅ **Desain Modern** - Warna-warni colorful & animated background  
✅ **Responsive** - Tampil sempurna di HP & Desktop  
✅ **Instagram Integration** - Klik langsung ke IG  
✅ **WhatsApp Integration** - Tombol order via WA  

## 📱 Customize Social Media

Edit file `.env`:
```env
INSTAGRAM_URL=https://instagram.com/moukiess
WHATSAPP_NUMBER=6281234567890
WHATSAPP_MESSAGE="Halo, saya tertarik dengan produk Moukiess"
```

**Restart server setelah edit .env:**
```bash
# Tekan Ctrl+C untuk stop
# Jalankan lagi:
php artisan serve
```

## 🍪 Menambah Produk

**Via MySQL:**
```sql
INSERT INTO products (name, description, price, category, stock, is_available, created_at, updated_at) 
VALUES (
    'Nama Cookies Baru',
    'Deskripsi cookies yang menarik',
    45000,
    'Premium',
    50,
    1,
    NOW(),
    NOW()
);
```

**Via Tinker:**
```bash
php artisan tinker
```
```php
App\Models\Product::create([
    'name' => 'Nama Cookies Baru',
    'description' => 'Deskripsi cookies',
    'price' => 45000,
    'category' => 'Premium',
    'stock' => 50
]);
```

## 🔧 Troubleshooting

### Server tidak jalan?
```bash
# Clear cache
php artisan config:clear
php artisan cache:clear
php artisan view:clear

# Jalankan lagi
php artisan serve
```

### Database error?
- Pastikan MySQL di XAMPP sudah running
- Cek username/password di `.env`
- Pastikan database `moukiess_db` sudah dibuat

### WhatsApp/Instagram tidak berfungsi?
- Edit `.env` dengan nomor/username yang benar
- Restart server (Ctrl+C, lalu `php artisan serve` lagi)

## 📚 Dokumentasi Lengkap

- **README.md** - Dokumentasi lengkap
- **INSTALLATION_GUIDE.md** - Panduan instalasi detail
- **SQL_QUERIES.sql** - Kumpulan query SQL berguna

## 💡 Tips

1. **Port 8000 sudah dipakai?**
   ```bash
   php artisan serve --port=8080
   ```

2. **Akses dari HP di jaringan yang sama:**
   ```bash
   php artisan serve --host=0.0.0.0
   ```
   Akses dari HP: `http://IP-KOMPUTER:8000`

3. **Update produk via phpMyAdmin:**
   - Buka http://localhost/phpmyadmin
   - Pilih database `moukiess_db`
   - Klik tabel `products`
   - Edit data langsung

## 🎉 Selesai!

Website Moukiess sudah siap digunakan!

Butuh bantuan? Lihat file:
- `INSTALLATION_GUIDE.md` - Panduan lengkap
- `SQL_QUERIES.sql` - Query database

**Happy Selling! 🍪**

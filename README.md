# 🍪 Moukiess - Website Katalog Cookies Premium

Website katalog produk cookies modern dengan tampilan colorful dan interaktif menggunakan Laravel & MySQL.

## ✨ Fitur

- 🎨 **Desain Modern & Colorful** - Tampilan yang eye-catching dengan animasi smooth
- 📱 **Responsive Design** - Tampil sempurna di semua perangkat
- 🍪 **Katalog Produk** - Menampilkan berbagai jenis cookies dengan detail lengkap
- 💬 **WhatsApp Integration** - Langsung chat untuk pemesanan
- 📸 **Instagram Integration** - Link langsung ke akun Instagram
- 🎭 **Animated Background** - Background dengan floating shapes yang bergerak
- 💰 **Harga & Stok** - Informasi harga dan ketersediaan stok real-time

## 🚀 Instalasi

### Prerequisites
- PHP >= 8.1
- Composer
- MySQL >= 5.7
- Node.js & NPM (opsional, untuk asset compilation)

### Langkah-langkah Instalasi

1. **Clone atau download project ini**
   ```bash
   cd moukiess
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Setup environment**
   ```bash
   cp .env.example .env
   ```

4. **Generate application key**
   ```bash
   php artisan key:generate
   ```

5. **Konfigurasi Database**
   
   Edit file `.env` dan sesuaikan dengan konfigurasi database Anda:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=moukiess_db
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. **Buat Database**
   
   Buat database MySQL dengan nama `moukiess_db`:
   ```sql
   CREATE DATABASE moukiess_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```

7. **Jalankan Migration & Seeder**
   ```bash
   php artisan migrate --seed
   ```

8. **Konfigurasi Social Media**
   
   Edit file `.env` untuk menambahkan link Instagram dan WhatsApp:
   ```env
   INSTAGRAM_URL=https://instagram.com/moukiess
   WHATSAPP_NUMBER=6281234567890
   WHATSAPP_MESSAGE="Halo, saya tertarik dengan produk Moukiess"
   ```
   
   **Catatan:** 
   - Untuk `WHATSAPP_NUMBER`, gunakan format internasional tanpa tanda + (contoh: 6281234567890)
   - Ganti dengan nomor WhatsApp bisnis Anda
   - Ganti `INSTAGRAM_URL` dengan username Instagram Anda

9. **Jalankan Server**
   ```bash
   php artisan serve
   ```

10. **Akses Website**
    
    Buka browser dan akses: `http://localhost:8000`

## 📁 Struktur Database

### Tabel: products

| Kolom | Tipe | Deskripsi |
|-------|------|-----------|
| id | BIGINT | Primary key |
| name | VARCHAR(255) | Nama produk |
| description | TEXT | Deskripsi produk |
| price | DECIMAL(10,2) | Harga produk |
| image | VARCHAR(255) | Nama file gambar (nullable) |
| category | VARCHAR(255) | Kategori produk |
| is_available | BOOLEAN | Status ketersediaan |
| stock | INTEGER | Jumlah stok |
| created_at | TIMESTAMP | Waktu dibuat |
| updated_at | TIMESTAMP | Waktu diupdate |

## 🎨 Kustomisasi

### Mengganti Warna Theme

Edit file `resources/views/layouts/app.blade.php` di bagian CSS variables:

```css
:root {
    --primary: #FF6B9D;      /* Warna utama */
    --secondary: #C06C84;    /* Warna sekunder */
    --accent: #F67280;       /* Warna aksen */
    --yellow: #FEC260;       /* Warna kuning */
    --purple: #B565D8;       /* Warna ungu */
    --blue: #6C5CE7;         /* Warna biru */
    --green: #00D2A0;        /* Warna hijau */
    --orange: #FF8A5B;       /* Warna orange */
}
```

### Menambah Produk Baru

Ada beberapa cara untuk menambah produk:

1. **Via Database Seeder** (untuk development)
   
   Edit `database/seeders/ProductSeeder.php` dan tambahkan produk baru

2. **Via MySQL Direct** (untuk production)
   ```sql
   INSERT INTO products (name, description, price, category, stock, is_available, created_at, updated_at) 
   VALUES ('Nama Cookies', 'Deskripsi cookies', 45000, 'Premium', 50, 1, NOW(), NOW());
   ```

3. **Via Laravel Tinker** (untuk testing)
   ```bash
   php artisan tinker
   ```
   ```php
   App\Models\Product::create([
       'name' => 'Nama Cookies',
       'description' => 'Deskripsi cookies',
       'price' => 45000,
       'category' => 'Premium',
       'stock' => 50,
       'is_available' => true,
   ]);
   ```

## 📱 Social Media Integration

### Instagram
- Icon Instagram di header akan membuka halaman Instagram bisnis Anda di tab baru
- Konfigurasi URL di file `.env`

### WhatsApp
- Icon WhatsApp di header untuk chat langsung
- Tombol "Pesan Sekarang" di halaman produk
- Pesan otomatis terisi sesuai konfigurasi di `.env`

## 🎯 Fitur Desain

1. **Animated Background** - Shapes yang bergerak smooth di background
2. **Hover Effects** - Card produk akan terangkat saat di-hover
3. **Gradient Colors** - Setiap produk memiliki gradient warna berbeda
4. **Responsive Layout** - Grid otomatis menyesuaikan dengan ukuran layar
5. **Smooth Animations** - Transisi dan animasi yang halus
6. **Modern Typography** - Menggunakan Google Fonts (Poppins & Pacifico)

## 🛠️ Teknologi

- **Backend:** Laravel 10
- **Database:** MySQL
- **Frontend:** Blade Templates, CSS3, HTML5
- **Fonts:** Google Fonts (Poppins, Pacifico)
- **Icons:** SVG (Instagram, WhatsApp)

## 📝 Query SQL Berguna

### Melihat semua produk
```sql
SELECT * FROM products;
```

### Update harga produk
```sql
UPDATE products SET price = 50000 WHERE id = 1;
```

### Update stok produk
```sql
UPDATE products SET stock = stock - 1 WHERE id = 1;
```

### Mencari produk berdasarkan kategori
```sql
SELECT * FROM products WHERE category = 'Premium';
```

### Menampilkan produk yang tersedia
```sql
SELECT * FROM products WHERE is_available = 1 AND stock > 0;
```

## 🎉 Sample Data

Seeder sudah menyediakan 8 produk sample:
1. Chocolate Chip Cookies - Rp 35.000
2. Red Velvet Cookies - Rp 45.000
3. Matcha Green Tea Cookies - Rp 42.000
4. Double Chocolate Cookies - Rp 38.000
5. Oatmeal Raisin Cookies - Rp 32.000
6. Peanut Butter Cookies - Rp 36.000
7. Rainbow Sprinkles Cookies - Rp 33.000
8. Cookies & Cream - Rp 40.000

## 📞 Support

Jika ada pertanyaan atau masalah, silakan hubungi melalui:
- 📧 Email: support@moukiess.com
- 💬 WhatsApp: [Nomor Anda]
- 📸 Instagram: @moukiess

## 📄 License

Project ini dibuat untuk keperluan bisnis Moukiess.

---

**Dibuat dengan ❤️ dan 🍪 untuk Moukiess**

-- =====================================================
-- SQL QUERIES UNTUK MOUKIESS DATABASE
-- =====================================================

-- 1. MEMBUAT DATABASE
CREATE DATABASE moukiess_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Gunakan database
USE moukiess_db;

-- =====================================================
-- 2. MEMBUAT TABEL PRODUCTS (Jika tidak pakai Laravel Migration)
-- =====================================================
CREATE TABLE products (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(255) NULL,
    category VARCHAR(255) NOT NULL DEFAULT 'cookies',
    is_available TINYINT(1) NOT NULL DEFAULT 1,
    stock INT NOT NULL DEFAULT 0,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- 3. INSERT DATA PRODUK SAMPLE
-- =====================================================

INSERT INTO products (name, description, price, category, stock, is_available, image, created_at, updated_at) VALUES
('Chocolate Chip Cookies', 'Cookies klasik dengan chocolate chip premium yang lumer di mulut. Sempurna untuk menemani waktu santai Anda!', 35000.00, 'Classic', 50, 1, 'chocolate-chip.jpg', NOW(), NOW()),
('Red Velvet Cookies', 'Cookies mewah dengan rasa red velvet yang lembut dan cream cheese yang creamy. Perpaduan sempurna!', 45000.00, 'Premium', 30, 1, 'red-velvet.jpg', NOW(), NOW()),
('Matcha Green Tea Cookies', 'Cookies dengan matcha asli dari Jepang. Rasa yang unik dan menyegarkan dengan sentuhan manis yang pas.', 42000.00, 'Premium', 40, 1, 'matcha.jpg', NOW(), NOW()),
('Double Chocolate Cookies', 'Untuk pecinta cokelat sejati! Cookies cokelat dengan dark chocolate chunks yang melimpah.', 38000.00, 'Classic', 45, 1, 'double-chocolate.jpg', NOW(), NOW()),
('Oatmeal Raisin Cookies', 'Cookies sehat dengan oatmeal dan kismis pilihan. Cocok untuk sarapan atau camilan sehat.', 32000.00, 'Healthy', 35, 1, 'oatmeal-raisin.jpg', NOW(), NOW()),
('Peanut Butter Cookies', 'Cookies dengan selai kacang yang creamy dan gurih. Tekstur renyah di luar, lembut di dalam.', 36000.00, 'Classic', 40, 1, 'peanut-butter.jpg', NOW(), NOW()),
('Rainbow Sprinkles Cookies', 'Cookies colorful dengan taburan rainbow sprinkles yang ceria. Favorit anak-anak!', 33000.00, 'Fun', 60, 1, 'rainbow-sprinkles.jpg', NOW(), NOW()),
('Cookies & Cream', 'Kombinasi cookies dengan cream filling ala Oreo. Rasa yang familiar dan selalu disukai!', 40000.00, 'Premium', 35, 1, 'cookies-cream.jpg', NOW(), NOW());

-- =====================================================
-- 4. QUERY UNTUK MELIHAT DATA
-- =====================================================

-- Lihat semua produk
SELECT * FROM products;

-- Lihat produk yang tersedia saja
SELECT * FROM products WHERE is_available = 1;

-- Lihat produk berdasarkan kategori
SELECT * FROM products WHERE category = 'Premium';

-- Lihat produk yang stoknya menipis (kurang dari 10)
SELECT * FROM products WHERE stock < 10;

-- Lihat produk dengan harga termurah
SELECT * FROM products ORDER BY price ASC LIMIT 5;

-- Lihat produk dengan harga termahal
SELECT * FROM products ORDER BY price DESC LIMIT 5;

-- Hitung jumlah produk per kategori
SELECT category, COUNT(*) as total_produk 
FROM products 
GROUP BY category;

-- Hitung total nilai stok per produk
SELECT name, price, stock, (price * stock) as nilai_stok 
FROM products 
ORDER BY nilai_stok DESC;

-- =====================================================
-- 5. QUERY UNTUK UPDATE DATA
-- =====================================================

-- Update harga produk
UPDATE products 
SET price = 50000 
WHERE id = 1;

-- Update stok produk (menambah stok)
UPDATE products 
SET stock = stock + 10 
WHERE id = 1;

-- Update stok produk (mengurangi stok saat ada pembelian)
UPDATE products 
SET stock = stock - 1 
WHERE id = 1 AND stock > 0;

-- Set produk tidak tersedia
UPDATE products 
SET is_available = 0 
WHERE id = 1;

-- Set produk tersedia kembali
UPDATE products 
SET is_available = 1 
WHERE id = 1;

-- Update deskripsi produk
UPDATE products 
SET description = 'Deskripsi baru yang lebih menarik' 
WHERE id = 1;

-- Update kategori produk
UPDATE products 
SET category = 'Best Seller' 
WHERE id = 1;

-- =====================================================
-- 6. QUERY UNTUK MENAMBAH PRODUK BARU
-- =====================================================

-- Tambah produk baru
INSERT INTO products (name, description, price, category, stock, is_available, created_at, updated_at) 
VALUES (
    'Strawberry Cookies',
    'Cookies dengan rasa strawberry segar yang manis dan asam. Cocok untuk pecinta buah!',
    37000.00,
    'Premium',
    25,
    1,
    NOW(),
    NOW()
);

-- =====================================================
-- 7. QUERY UNTUK MENGHAPUS DATA
-- =====================================================

-- Hapus produk berdasarkan ID
DELETE FROM products WHERE id = 9;

-- Hapus semua produk yang stoknya 0
DELETE FROM products WHERE stock = 0;

-- Hapus produk berdasarkan kategori
DELETE FROM products WHERE category = 'Test';

-- =====================================================
-- 8. QUERY ADVANCED / LAPORAN
-- =====================================================

-- Total nilai semua stok
SELECT SUM(price * stock) as total_nilai_stok 
FROM products;

-- Rata-rata harga produk
SELECT AVG(price) as rata_rata_harga 
FROM products;

-- Produk dengan stok terbanyak
SELECT name, stock 
FROM products 
ORDER BY stock DESC 
LIMIT 1;

-- Produk dengan stok paling sedikit (yang masih ada)
SELECT name, stock 
FROM products 
WHERE stock > 0 
ORDER BY stock ASC 
LIMIT 1;

-- Kategori dengan produk terbanyak
SELECT category, COUNT(*) as jumlah_produk 
FROM products 
GROUP BY category 
ORDER BY jumlah_produk DESC 
LIMIT 1;

-- Total produk yang tersedia vs tidak tersedia
SELECT 
    SUM(CASE WHEN is_available = 1 THEN 1 ELSE 0 END) as tersedia,
    SUM(CASE WHEN is_available = 0 THEN 1 ELSE 0 END) as tidak_tersedia
FROM products;

-- =====================================================
-- 9. QUERY UNTUK PENCARIAN
-- =====================================================

-- Cari produk berdasarkan nama (mengandung kata)
SELECT * FROM products 
WHERE name LIKE '%chocolate%';

-- Cari produk berdasarkan deskripsi
SELECT * FROM products 
WHERE description LIKE '%premium%';

-- Cari produk dalam range harga
SELECT * FROM products 
WHERE price BETWEEN 30000 AND 40000;

-- =====================================================
-- 10. QUERY UNTUK BACKUP & MAINTENANCE
-- =====================================================

-- Backup tabel products ke tabel baru
CREATE TABLE products_backup AS 
SELECT * FROM products;

-- Truncate table (hapus semua data, tapi struktur tetap)
TRUNCATE TABLE products;

-- Drop table (hapus tabel beserta strukturnya)
DROP TABLE IF EXISTS products;

-- Cek struktur tabel
DESCRIBE products;

-- Lihat informasi tabel
SHOW CREATE TABLE products;

-- =====================================================
-- 11. QUERY UNTUK TESTING
-- =====================================================

-- Cek koneksi database
SELECT 'Database Connected!' as status;

-- Hitung total records
SELECT COUNT(*) as total_produk FROM products;

-- Cek produk terakhir yang ditambahkan
SELECT * FROM products 
ORDER BY created_at DESC 
LIMIT 1;

-- Cek produk yang baru diupdate
SELECT * FROM products 
ORDER BY updated_at DESC 
LIMIT 5;

-- =====================================================
-- NOTES:
-- =====================================================
-- 1. Semua query ini bisa dijalankan di phpMyAdmin atau MySQL Command Line
-- 2. Untuk Laravel, lebih baik gunakan Eloquent ORM daripada raw SQL
-- 3. Selalu backup database sebelum menjalankan DELETE atau UPDATE massal
-- 4. Gunakan WHERE clause yang spesifik untuk menghindari update/delete yang salah
-- =====================================================

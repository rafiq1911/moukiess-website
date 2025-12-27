# 🚀 Panduan Deploy Moukiess ke Railway.app

## 📋 Persiapan (SUDAH SELESAI ✅)

✅ Project sudah di-setup untuk deployment  
✅ Git repository sudah di-init  
✅ File konfigurasi Railway sudah dibuat  
✅ Procfile, railway.json, nixpacks.toml sudah ada  

---

## 🎯 Langkah Deploy ke Railway

### **Step 1: Buat Akun GitHub (Jika Belum Ada)**

1. Buka: https://github.com/signup
2. Daftar dengan email Anda
3. Verifikasi email
4. Login ke GitHub

---

### **Step 2: Buat Repository Baru di GitHub**

1. **Buka:** https://github.com/new
2. **Repository name:** `moukiess-website`
3. **Description:** "Moukiess Premium Cookies E-commerce Website"
4. **Visibility:** Private atau Public (terserah Anda)
5. **JANGAN centang** "Initialize with README" (sudah ada)
6. **Klik:** Create repository

---

### **Step 3: Push Project ke GitHub**

Jalankan command ini di terminal (di folder project):

```bash
# Add remote repository
git remote add origin https://github.com/USERNAME/moukiess-website.git

# Ganti USERNAME dengan username GitHub Anda

# Push ke GitHub
git branch -M main
git push -u origin main
```

**Masukkan username dan password GitHub Anda saat diminta.**

> **Note:** Jika diminta password, gunakan **Personal Access Token** bukan password biasa.
> Cara buat token: https://github.com/settings/tokens

---

### **Step 4: Daftar di Railway.app**

1. **Buka:** https://railway.app
2. **Klik:** "Start a New Project" atau "Login with GitHub"
3. **Login dengan GitHub** (authorize Railway)
4. **Klik:** "New Project"

---

### **Step 5: Deploy dari GitHub**

1. **Pilih:** "Deploy from GitHub repo"
2. **Pilih repository:** `moukiess-website`
3. Railway akan otomatis detect Laravel dan mulai deploy
4. **Tunggu** proses build selesai (±3-5 menit)

---

### **Step 6: Tambahkan Database MySQL**

1. Di Railway dashboard, **klik:** "+ New"
2. **Pilih:** "Database" → "MySQL"
3. MySQL akan otomatis ter-provision
4. Railway akan otomatis set environment variables

---

### **Step 7: Setup Environment Variables**

Di Railway dashboard project Anda:

1. **Klik tab:** "Variables"
2. **Tambahkan variables ini:**

```env
APP_NAME=Moukiess Cookies
APP_ENV=production
APP_DEBUG=false
APP_URL=https://moukiess.up.railway.app

# Generate APP_KEY dulu (lihat cara di bawah)
APP_KEY=base64:xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

INSTAGRAM_URL=https://instagram.com/mutiassgalaa
WHATSAPP_NUMBER=6282164933189
WHATSAPP_MESSAGE=Halo, saya tertarik dengan produk Moukiess
```

**Cara Generate APP_KEY:**
```bash
# Di terminal lokal
php artisan key:generate --show
```
Copy hasilnya dan paste ke Railway

---

### **Step 8: Run Migrations**

Setelah database ready:

1. **Klik tab:** "Settings" → "Deploy"
2. **Scroll ke:** "Custom Start Command"
3. **Masukkan:**
   ```bash
   php artisan migrate --force --seed && php artisan serve --host=0.0.0.0 --port=$PORT
   ```
4. **Klik:** "Redeploy"

---

### **Step 9: Dapatkan URL Website**

1. **Klik tab:** "Settings"
2. **Scroll ke:** "Domains"
3. **Klik:** "Generate Domain"
4. Railway akan berikan URL: `moukiess.up.railway.app`

**Website Anda sudah LIVE! 🎉**

---

## 🌐 Custom Domain (Optional)

Jika punya domain sendiri (misal: moukiess.id):

1. Di Railway: **Settings → Domains → Custom Domain**
2. **Masukkan domain:** moukiess.id
3. Railway akan berikan **CNAME record**
4. **Tambahkan di DNS domain Anda:**
   - Type: CNAME
   - Name: @
   - Value: [value dari Railway]
5. **Tunggu propagasi** (15 menit - 24 jam)

---

## 🔧 Troubleshooting

### **Error: "Application Not Found"**
✅ **Solusi:** Pastikan file `public/index.php` ada

### **Error: Database Connection**
✅ **Solusi:** 
- Pastikan MySQL sudah running
- Check environment variables `DB_*`

### **Error: 500 Internal Server Error**
✅ **Solusi:** 
- Set `APP_DEBUG=true` sementara untuk lihat error
- Check logs di Railway dashboard

### **Error: "Mix Manifest Not Found"**
✅ **Solusi:** Tidak perlu npm/mix untuk project ini

### **Website Load Lambat**
✅ **Solusi:** 
- Railway gratis limited RAM (512MB)
- Upgrade ke Railway Pro jika perlu

---

## 📊 Monitoring

**Railway Dashboard:**
- Buka: https://railway.app/dashboard
- Monitor: CPU, RAM, Network usage
- Lihat logs real-time

**Free Tier Limits:**
- 500 hours/month (cukup untuk 24/7)
- 512MB RAM
- 1GB storage
- 100GB bandwidth

---

## 🔄 Update Website di Future

Jika ada perubahan code:

```bash
# Di terminal lokal
git add .
git commit -m "Update: deskripsi perubahan"
git push origin main
```

Railway akan **auto-deploy** perubahan dalam 1-2 menit! 🚀

---

## 💡 Tips & Best Practices

1. **Enable Auto Deploy:** Railway sudah enable by default
2. **Monitor Usage:** Check dashboard untuk tidak over limit
3. **Backup Database:** Export MySQL via Railway dashboard
4. **Custom Domain:** Gunakan domain sendiri untuk profesional
5. **SSL Certificate:** Railway auto-provide SSL (HTTPS)

---

## 🆘 Need Help?

- **Railway Docs:** https://docs.railway.app
- **Railway Discord:** https://discord.gg/railway
- **Laravel Docs:** https://laravel.com/docs

---

## ✅ Checklist Deploy

- [ ] Push code ke GitHub
- [ ] Create Railway project
- [ ] Connect GitHub repo
- [ ] Add MySQL database
- [ ] Set environment variables
- [ ] Generate APP_KEY
- [ ] Run migrations with seed
- [ ] Generate domain
- [ ] Test website
- [ ] (Optional) Setup custom domain

---

## 🎉 Selamat!

Website Moukiess Anda sekarang LIVE dan bisa diakses dari mana saja!

**URL Live:** https://moukiess.up.railway.app

Share link ini ke teman, keluarga, dan customer! 🍪

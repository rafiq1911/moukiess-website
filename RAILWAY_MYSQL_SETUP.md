# 🗄️ Railway MySQL Setup - Fix Connection Refused

## ❌ Error Yang Terjadi

```
SQLSTATE[HY000] [2002] Connection refused
```

**Penyebab:** MySQL service belum di-add atau belum ter-configure dengan benar di Railway.

---

## ✅ SOLUSI: Setup MySQL di Railway

### **Step 1: Add MySQL Service**

1. Buka **Railway Dashboard** → Project Moukiess
2. Klik **"+ New"** (di kanan atas)
3. Pilih **"Database"**
4. Pilih **"Add MySQL"**
5. Tunggu provisioning selesai (±1-2 menit)

### **Step 2: Link MySQL ke Web Service**

Railway biasanya auto-link, tapi pastikan:

1. Klik **MySQL service** yang baru dibuat
2. Tab **"Variables"**
3. Anda akan lihat variables:
   - `MYSQLHOST`
   - `MYSQLPORT`
   - `MYSQLDATABASE`
   - `MYSQLUSER`
   - `MYSQLPASSWORD`

4. Kembali ke **web service**
5. Tab **"Variables"**
6. **Pastikan variables MySQL muncul di sini juga**
   - Jika tidak ada, Railway belum auto-link
   - Klik **"+ New Variable"** → **"Reference"** → Pilih MySQL variables

### **Step 3: Remove Old DB Variables (PENTING!)**

Di web service **Variables** tab:

**HAPUS** variables ini jika ada:
- ❌ `DB_HOST`
- ❌ `DB_PORT`
- ❌ `DB_DATABASE`
- ❌ `DB_USERNAME`
- ❌ `DB_PASSWORD`

**Kenapa?** Karena kita sudah pakai `MYSQLHOST`, `MYSQLPORT`, dll dari Railway MySQL service.

### **Step 4: Set Environment Variables**

Di web service **Variables** tab, pastikan ada:

```env
APP_NAME=Moukiess Cookies
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:your-generated-key-here
APP_URL=https://web-production-xxxx.up.railway.app

DB_CONNECTION=mysql

INSTAGRAM_URL=https://instagram.com/mutiassgalaa
WHATSAPP_NUMBER=6282164933189
WHATSAPP_MESSAGE=Halo, saya tertarik dengan produk Moukiess
```

**JANGAN set** `DB_HOST`, `DB_PORT`, dll. Biarkan Railway auto-inject dari MySQL service!

### **Step 5: Redeploy**

1. Di web service, klik **"Settings"**
2. Scroll ke **"Danger Zone"**
3. Klik **"Trigger Deploy"**
4. Tunggu deployment selesai

---

## 🔍 Verifikasi MySQL Running

### **Check MySQL Service:**

1. Klik **MySQL service** di dashboard
2. Tab **"Metrics"**
3. Pastikan status: **ACTIVE** (hijau)
4. CPU/Memory usage harus ada activity

### **Check Variables di Web Service:**

Variables yang harus muncul (auto-injected):
```
MYSQLHOST=xxxx.railway.internal
MYSQLPORT=3306
MYSQLDATABASE=railway
MYSQLUSER=root
MYSQLPASSWORD=xxxxxxxx
```

---

## 🧪 Test Connection

Setelah redeploy, check logs di web service:

**✅ Success indicators:**
```
✅ MySQL is ready!
Migrated: 2024_01_01_000000_create_products_table
Seeding: ProductSeeder
Laravel development server started
```

**❌ Still failing?**
```
❌ Connection failed: Connection refused
```

---

## 🔄 Alternative: Manual Variable Setup

Jika auto-link tidak bekerja:

1. Di **MySQL service** → **Variables** → Copy semua values
2. Di **web service** → **Variables** → Add manually:

```env
MYSQLHOST=containers-us-west-xxx.railway.app
MYSQLPORT=7431
MYSQLDATABASE=railway
MYSQLUSER=root
MYSQLPASSWORD=xxxxxxxxxx
```

---

## 📊 Railway MySQL Limits (Free Tier)

- **Storage:** 1GB
- **Connections:** Shared
- **Uptime:** 500 hours/month (bersama web service)

**Tips:** 
- Jangan buat terlalu banyak connection
- Index database dengan baik
- Monitor usage di Metrics tab

---

## 🆘 Troubleshooting

### **MySQL Service Crashed**

**Check:**
1. MySQL service logs untuk error
2. Memory usage (jika over limit, restart)
3. Storage (jika penuh, clear data atau upgrade)

**Fix:**
- Klik MySQL service → **Settings** → **Restart**

### **Variables Not Showing**

**Fix:**
1. Delete MySQL service
2. Re-add MySQL service
3. Railway should auto-link to web service

### **Connection Still Refused After Setup**

**Check Startup Order:**

Railway might start web before MySQL ready.

**Fix:** Our `wait-for-db.php` script handles this!
- It retries connection 30 times (60 seconds)
- If MySQL not ready after 60s, deployment fails
- Check if MySQL is actually running

---

## ✅ Checklist

- [ ] MySQL service added to Railway project
- [ ] MySQL service status: ACTIVE
- [ ] MySQL variables visible in web service
- [ ] Old DB_HOST/DB_PORT variables removed
- [ ] APP_KEY is set
- [ ] Redeployed web service
- [ ] Check logs for "MySQL is ready!"
- [ ] Website accessible
- [ ] Products showing on homepage

---

## 🎉 Success!

Jika semua langkah benar:
- ✅ Website LIVE
- ✅ Database connected
- ✅ Products tampil
- ✅ No crash

URL: https://web-production-xxxx.up.railway.app

---

## 📞 Still Need Help?

Share screenshot:
1. Railway Dashboard (services overview)
2. MySQL service Variables tab
3. Web service Variables tab
4. Web service Deployment logs

Saya akan bantu troubleshoot lebih lanjut!

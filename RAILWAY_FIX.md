# 🔧 Railway Deployment - Fix Crash Issues

## ✅ Perbaikan Yang Sudah Dilakukan

### 1. **Updated Configuration Files**
- ✅ `Procfile` - Added migration & seeding
- ✅ `railway.json` - Fixed start command
- ✅ `nixpacks.toml` - Added MySQL extensions
- ✅ `start.sh` - Startup script dengan proper order

### 2. **Fixed Database Seeding**
- ✅ Added `truncate()` to prevent duplicate data
- ✅ Safe seeding on every deploy

### 3. **Added Health Check**
- ✅ Route `/health` untuk monitoring
- ✅ Returns JSON status

---

## 🚀 Cara Deploy Ulang (Setelah Fix)

### **Step 1: Commit & Push Changes**

```bash
git add .
git commit -m "Fix: Railway deployment configuration"
git push origin main
```

### **Step 2: Railway Auto-Deploy**
Railway akan otomatis detect changes dan deploy ulang.

### **Step 3: Check Logs**
1. Buka Railway Dashboard
2. Klik project Moukiess
3. Tab **"Deployments"**
4. Klik deployment terbaru
5. Lihat **Logs**

---

## 🔍 Troubleshooting Steps

### **Jika Masih Crash:**

#### **1. Check Environment Variables**

Pastikan di Railway **Variables** tab ada:

```env
APP_NAME=Moukiess Cookies
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:xxxxxxxxxxxxxxxxxxxx (harus ada!)
APP_URL=https://your-domain.up.railway.app

# Database (auto-filled by Railway MySQL)
DB_CONNECTION=mysql
DB_HOST=${MYSQLHOST}
DB_PORT=${MYSQLPORT}
DB_DATABASE=${MYSQLDATABASE}
DB_USERNAME=${MYSQLUSER}
DB_PASSWORD=${MYSQLPASSWORD}

# Social Media
INSTAGRAM_URL=https://instagram.com/mutiassgalaa
WHATSAPP_NUMBER=6282164933189
```

**🔥 PENTING:** `APP_KEY` harus sudah di-generate!

Cara generate:
```bash
php artisan key:generate --show
```

Copy hasilnya (termasuk `base64:...`) dan paste ke Railway Variables.

---

#### **2. Check MySQL Service**

Di Railway Dashboard:
1. Pastikan ada **MySQL service** yang running
2. Klik MySQL service
3. Tab **"Variables"**
4. Pastikan ada: `MYSQLHOST`, `MYSQLPORT`, `MYSQLDATABASE`, dll

**Jika MySQL belum ada:**
1. Klik **"+ New"**
2. Pilih **"Database"** → **"MySQL"**
3. Tunggu provision selesai
4. Railway auto-link ke project

---

#### **3. Check Build Logs**

Di Deployment Logs, cari error:

**Error: "No application encryption key"**
```
✅ Fix: Set APP_KEY di Variables
```

**Error: "SQLSTATE[HY000] [2002] Connection refused"**
```
✅ Fix: MySQL belum ready atau tidak ter-link
   - Tunggu MySQL fully provisioned
   - Restart deployment
```

**Error: "Class not found"**
```
✅ Fix: Composer autoload issue
   - Di Settings, trigger redeploy
```

**Error: "Port already in use"**
```
✅ Fix: Sudah fixed di config (menggunakan $PORT)
```

---

#### **4. Manual Deploy Command**

Jika perlu kontrol lebih, gunakan custom start command:

Di Railway **Settings → Deploy → Custom Start Command**:

```bash
bash start.sh
```

Atau lebih simple:

```bash
php artisan config:clear && php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=$PORT
```

---

## 🧪 Test Health Check

Setelah deploy success, test endpoint:

```
https://your-domain.up.railway.app/health
```

Harus return JSON:
```json
{
  "status": "ok",
  "app": "Moukiess Cookies",
  "environment": "production",
  "timestamp": "2024-01-01T12:00:00Z",
  "database": "railway"
}
```

---

## 📊 Railway Free Tier Limits

Pastikan tidak over limit:

- **Memory:** 512MB (Laravel butuh ~200-300MB)
- **CPU:** Shared
- **Hours:** 500/month
- **Storage:** 1GB

**Check di Dashboard:**
- Tab **"Metrics"**
- Lihat RAM usage
- Jika mendekati 512MB → consider upgrade

---

## 🔄 Deploy Workflow (After Fix)

```
1. Git Push → GitHub
2. Railway Auto-Detect Changes
3. Build Process:
   ✓ Install composer dependencies
   ✓ Skip cache (karena sudah di-clear di start)
4. Deploy Process:
   ✓ Clear config & cache
   ✓ Run migrations
   ✓ Seed database
   ✓ Start PHP server on $PORT
5. Health Check:
   ✓ Railway ping /health
   ✓ Status 200 OK
6. Website LIVE! 🎉
```

---

## 🆘 Still Having Issues?

### **Option 1: Check Railway Logs**
Copy error message lengkap dari logs dan share.

### **Option 2: Enable Debug Mode (Temporary)**
Di Railway Variables:
```
APP_DEBUG=true
```
Redeploy, lalu akses website untuk lihat detailed error.
**⚠️ JANGAN lupa set kembali ke `false` setelah debug!**

### **Option 3: Rollback to Previous Deploy**
Di Railway Dashboard:
1. Tab **"Deployments"**
2. Pilih deployment yang working
3. Klik **"Redeploy"**

---

## ✅ Checklist Deploy Success

- [ ] Git push berhasil
- [ ] Railway detect changes
- [ ] Build process success (green check)
- [ ] Deploy process success
- [ ] MySQL service running
- [ ] All environment variables set
- [ ] APP_KEY sudah di-generate
- [ ] Health check return 200 OK
- [ ] Website accessible
- [ ] Products tampil di homepage

---

## 💡 Pro Tips

1. **Jangan cache config di build** → Clear di start command
2. **Always migrate on deploy** → Untuk consistency
3. **Use health check** → Railway akan auto-restart jika down
4. **Monitor memory** → Laravel bisa memory-intensive
5. **Enable auto-deploy** → Sudah default di Railway

---

## 🎉 Success Indicators

Jika website sukses:
- ✅ Status: **ACTIVE** (hijau) di Railway Dashboard
- ✅ Health check return JSON
- ✅ Website bisa diakses
- ✅ Products tampil
- ✅ No errors di logs

---

**Setelah fix ini, website seharusnya jalan normal! 🚀**

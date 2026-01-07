# Cara Upload ke Shared Hosting via GitHub (cPanel)

Panduan ini akan membantu Anda menghubungkan repository GitHub Appsbee dengan cPanel hosting Anda.

## 1. Persiapan di GitHub
Pastikan kode Anda sudah ada di GitHub repository (Private atau Public).
```bash
git init
git add .
git commit -m "Siap deploy"
git branch -M main
# Ganti URL_REPO dengan URL repository GitHub Anda
git remote add origin https://github.com/USERNAME/REPO.git 
git push -u origin main
```

## 2. Setting di cPanel (Git Version Control)
1.  Login ke **cPanel**.
2.  Cari menu **"Git™ Version Control"**.
3.  Klik **Create**.
4.  **Clone URL**: Masukkan URL repository GitHub Anda.
5.  **Repository Path**: Biarkan default atau sesuaikan (misal: `repositories/appsbee`).
6.  **Repository Name**: `appsbee`.
7.  Klik **Create**.

## 3. Deploy File (Cara Manual atau Otomatis)
Anda sudah memiliki file `.cpanel.yml` yang bagus! File ini akan otomatis menyalin file dari repository ke folder tujuan (`/home2/appsbeem/home.appsbee.my.id`) saat Anda menarik (pull) update.

### Cara Menjalankan Deploy:
1.  Di menu **Git™ Version Control** cPanel.
2.  Klik tombol **Manage** di sebelah repository `appsbee`.
3.  Pilih tab **Pull or Deploy**.
4.  Klik **Update from Remote** (untuk mengambil kode terbaru dari GitHub).
5.  Klik **Deploy HEAD Commit** (untuk menjalankan perintah di `.cpanel.yml`).

## 4. Masalah Folder `vendor` (PENTING!)
Secara default, folder `vendor` (isi core CodeIgniter) **tidak ikut di-upload** ke GitHub karena ada di `.gitignore`. Website Anda **akan error** jika folder ini tidak ada di hosting.

**Solusi (Pilih Salah Satu):**

### Opsi A: Pakai Terminal cPanel (Disarankan)
Jika hosting Anda punya fitur **Terminal**:
1.  Buka menu **Terminal** di cPanel.
2.  Masuk ke folder deploy Anda:
    ```bash
    cd /home2/appsbeem/home.appsbee.my.id
    ```
3.  Install dependensi:
    ```bash
    composer install --no-dev
    ```

### Opsi B: Upload `vendor` Manual
Jika tidak ada Terminal:
1.  Di komputer Anda, ZIP folder `vendor`.
2.  Buka **File Manager** di cPanel.
3.  Upload ZIP ke `/home2/appsbeem/home.appsbee.my.id`.
4.  Extract ZIP tersebut di sana.

## 5. Konfigurasi Akhir
1.  **Environment**: 
    - Copy file `.env` (atau rename `env` menjadi `.env`) di File Manager cPanel.
    - Edit file `.env`:
      ```ini
      CI_ENVIRONMENT = production
      app.baseURL = 'https://home.appsbee.my.id/'
      ```
2.  **Database**: Setup database di "MySQL Databases" dan masukkan kredensialnya ke `.env`.

## 6. Pertanyaan Umum (FAQ)

### Q: Apakah perlu install `node_modules` di cPanel?
**JAWAB**: **TIDAK PERLU**. 
Kita menggunakan Tailwind CSS hanya untuk "memasak" file CSS di komputer lokal. Hasil masakan tersebut ada di `public/css/app.css`. File inilah yang kita upload. Server cPanel hanya perlu menyajikan file CSS yang sudah jadi itu. Jadi, Anda tidak perlu install Node.js atau NPM di hosting.

### Q: Error "403 Forbidden" atau muncul daftar folder?
Pastikan file `index.php` ada di folder utama domain Anda (`/home2/appsbeem/home.appsbee.my.id`). Jika file `index.php` masih ada di dalam subfolder `public`, pindahkan semua isi folder `public` ke folder utama tersebut (lihat Panduan Deploy Manual - Opsi 2).

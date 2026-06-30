# Cartiera UAS - Laravel Company Profile dan CRUD Fashion

Pengembangan aplikasi Laravel 12 untuk UAS Rekayasa Web. Project tetap memakai identitas PT Cartiera Indonesia sebagai company profile, lalu dilengkapi modul utama sesuai digit terakhir NIM `5`, yaitu Data Koleksi Fashion.

## Identitas Mahasiswa

- Nama: Muhamad Rifaldi
- NIM: 221011700805
- Kelas: SIFE008
- Judul: Company Profile PT Cartiera Indonesia dan CRUD Data Koleksi Fashion Berbasis Laravel

## Fitur

- Login dan logout manual menggunakan username, password, Session Laravel, dan `Hash`.
- Middleware khusus untuk melindungi seluruh halaman administrator.
- Dashboard ringkasan jumlah data.
- CRUD Data Koleksi Fashion sesuai soal UAS: ID Fashion, Gambar, Nama Item, Ukuran, Warna, dan Brand.
- CRUD Profil Perusahaan, Artikel/Berita, Produk/Layanan, dan Kontak.
- Validasi Laravel pada seluruh form.
- Upload gambar koleksi fashion, artikel, dan produk/layanan (JPG, PNG, WEBP, maksimal 2 MB).
- Export laporan Data Koleksi Fashion dan artikel ke PDF menggunakan DomPDF.
- Frontend company profile terhubung langsung dengan data backend.
- Feature test untuk autentikasi, middleware, CRUD, upload, validasi, dan PDF.

## Akun Administrator

- URL lokal: `http://127.0.0.1:8000/login`
- URL hosting: `https://cartiera-uas-laravel-production.up.railway.app`
- Username: `admin`
- Password: `Cartiera123!`

## Instalasi

```bash
composer install
copy .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
php artisan storage:link
php artisan serve
```

Project menggunakan SQLite secara default. File database berada di `database/database.sqlite`, sedangkan export SQL untuk pengumpulan berada di `database/cartiera_uas.sql`.

## Urutan Video Demo

1. Buka website publik.
2. Login administrator.
3. Tampilkan dashboard dan jumlah data.
4. Buka menu **Data Koleksi Fashion**.
5. Tambah koleksi fashion dengan upload gambar.
6. Ubah data koleksi fashion.
7. Hapus data koleksi fashion.
8. Klik **Cetak PDF** dan perlihatkan hasil laporan koleksi fashion.
9. Tampilkan CRUD profil, produk/layanan, artikel, dan kontak sebagai pelengkap company profile.
10. Logout dan tunjukkan bahwa `/admin` kembali meminta login.

## Pengujian

```bash
php artisan test
```

## Deploy ke Railway

Project ini sudah disiapkan untuk deploy dari GitHub ke Railway.

1. Buka Railway, pilih **New Project**.
2. Pilih **Deploy from GitHub repo**.
3. Pilih repo `rifalmuh/cartiera-uas-laravel`.
4. Tambahkan variables dari file `.env.deploy.example`.
5. Isi `APP_KEY` dari output:

```bash
php artisan key:generate --show
```

6. Setelah deploy sukses, buka tab **Settings > Networking** lalu klik **Generate Domain**.
7. Ubah variable `APP_URL` menjadi domain Railway yang sudah dibuat, lalu redeploy.

File `railway.json` menjalankan build Laravel dan Vite, sedangkan `scripts/railway-start.sh` menyiapkan SQLite, migrasi, seed data awal, storage link, dan server Laravel.

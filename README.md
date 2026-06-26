# Cartiera UAS - Laravel Company Profile

Pengembangan backend Company Profile PT Cartiera Indonesia untuk tugas Project Sebelum UAS.

## Identitas Mahasiswa

- Nama: Muhamad Rifaldi
- NIM: 221011700805
- Kelas: SIFE008
- Judul: Backend Company Profile PT Cartiera Indonesia Berbasis Laravel

## Fitur

- Login dan logout manual menggunakan Session Laravel dan `Hash`.
- Middleware khusus untuk melindungi seluruh halaman administrator.
- Dashboard ringkasan jumlah data.
- CRUD Profil Perusahaan, Artikel/Berita, Produk/Layanan, dan Kontak.
- Validasi Laravel pada seluruh form.
- Upload gambar artikel dan produk/layanan (JPG, PNG, WEBP, maksimal 2 MB).
- Export laporan artikel ke PDF menggunakan DomPDF.
- Frontend company profile terhubung langsung dengan data backend.
- Feature test untuk autentikasi, middleware, CRUD, upload, validasi, dan PDF.

## Akun Administrator

- URL lokal: `http://127.0.0.1:8765/login`
- URL hosting: `https://cartiera-uas-laravel-production.up.railway.app`
- Email: `admin@cartiera.id`
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
4. Tambah artikel dengan upload gambar.
5. Ubah artikel.
6. Hapus artikel.
7. Tampilkan CRUD profil, produk/layanan, dan kontak.
8. Klik **Cetak PDF** dan perlihatkan hasil laporan.
9. Logout dan tunjukkan bahwa `/admin` kembali meminta login.

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

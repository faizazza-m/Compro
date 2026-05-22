# 🏢 Compro — Company Profile + Katalog Produk & Order

Website **Company Profile** dengan fitur **katalog produk** dan **sistem pemesanan online** sederhana, dibangun menggunakan **CodeIgniter 4** dan **AdminLTE 3**.

> **Versi 1** — Fokus pada alur: *lihat produk → isi order → admin proses*. Belum memerlukan payment gateway atau keranjang belanja rumit.

---

## 📸 Fitur Utama

### 🌐 Frontend (Customer)

| Fitur | Keterangan |
|---|---|
| **Homepage** | Hero section, fitur unggulan, dan produk terbaru |
| **Katalog Produk** | Grid view dengan filter sidebar per kategori |
| **Detail Produk** | Gambar, deskripsi, harga, stok, dan produk terkait |
| **Form Order** | Input nama, WhatsApp, alamat, catatan, jumlah + kalkulasi harga otomatis |
| **Konfirmasi Order** | Nomor order unik + tombol redirect ke WhatsApp admin |

### 🔧 Backend Admin (AdminLTE 3)

| Fitur | Keterangan |
|---|---|
| **Dashboard** | Statistik real-time (total produk, order, pending, dsb.) |
| **Kelola Kategori** | CRUD kategori produk dengan DataTables |
| **Kelola Produk** | CRUD produk + upload gambar + status aktif/nonaktif |
| **Kelola Pesanan** | Daftar pesanan + filter status + detail + update status |
| **WhatsApp** | Tombol chat WhatsApp ke customer dari halaman detail pesanan |

### 📊 Alur Besar

```
Lihat Produk → Detail Produk → Isi Form Order → Order Masuk DB → Admin Proses
```

---

## 🛠️ Tech Stack

- **Framework:** CodeIgniter 4.7.x
- **PHP:** >= 8.1
- **Database:** MySQL / MariaDB
- **Admin UI:** AdminLTE 3.2
- **Frontend:** Vanilla CSS (modern design, responsive)
- **Icons:** Font Awesome 6
- **DataTables:** jQuery DataTables 1.13

---

## ⚡ Instalasi & Setup

### 1. Clone Repository

```bash
git clone <repository-url> compro-ci4
cd compro-ci4
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Konfigurasi Environment

Salin file `env` menjadi `.env` lalu sesuaikan:

```bash
cp env .env
```

Edit `.env`:

```env
CI_ENVIRONMENT = development

app.baseURL = 'http://localhost:8080/'

database.default.hostname = 127.0.0.1
database.default.database = compro_ci4
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306
```

### 4. Buat Database

```sql
CREATE DATABASE compro_ci4 CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
```

Atau via terminal (XAMPP):

```bash
/opt/lampp/bin/mysql -u root -e "CREATE DATABASE IF NOT EXISTS compro_ci4 CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;"
```

### 5. Jalankan Migrasi & Seeder

```bash
php spark migrate
php spark db:seed ProductCategorySeeder
```

Seeder akan membuat:
- **4 kategori** (Elektronik, Fashion, Makanan & Minuman, Kesehatan)
- **6 produk** sample
- **1 akun admin** (lihat tabel di bawah)

### 6. Jalankan Server

```bash
php spark serve
```

Akses di **http://localhost:8080/**

---

## 🔑 Akun Default

| Field | Value |
|---|---|
| **URL Login** | `http://localhost:8080/login` |
| **Username** | `admin` |
| **Password** | `admin123` |

---

## 📁 Struktur Database

```
┌─────────────────────┐      ┌─────────────────────┐
│  product_categories │      │       products       │
├─────────────────────┤      ├─────────────────────┤
│ id (PK)             │◄────┐│ id (PK)             │
│ nama_kategori       │     ││ category_id (FK)  ──┘
│ slug                │     │ nama_produk          │
│ deskripsi           │     │ slug                 │
│ created_at          │     │ deskripsi            │
│ updated_at          │     │ harga                │
└─────────────────────┘     │ stok                 │
                            │ gambar               │
                            │ status (aktif/nonaktif)
                            │ created_at           │
                            │ updated_at           │
                            └─────────────────────┘

┌─────────────────────┐      ┌─────────────────────┐
│       orders        │      │    order_details     │
├─────────────────────┤      ├─────────────────────┤
│ id (PK)             │◄────┐│ id (PK)             │
│ nomor_order (unique)│     ││ order_id (FK)     ──┘
│ nama_customer       │     │ product_id (FK)    ──┐
│ no_whatsapp         │     │ nama_produk          │
│ alamat              │     │ harga                │
│ catatan             │     │ jumlah               │
│ total_harga         │     │ subtotal             │
│ status (enum)       │     │ created_at           │
│ created_at          │     └─────────────────────┘
│ updated_at          │
└─────────────────────┘

Status Order: pending | diproses | selesai | batal
```

---

## 📂 Struktur File Project

```
CI4/
├── app/
│   ├── Controllers/
│   │   ├── Home.php              # Homepage
│   │   ├── Produk.php            # Katalog & detail produk
│   │   ├── Order.php             # Form order & konfirmasi
│   │   ├── Auth.php              # Login / Logout admin
│   │   ├── Admin.php             # Dashboard admin
│   │   ├── AdminKategori.php     # CRUD kategori
│   │   ├── AdminProduk.php       # CRUD produk + upload
│   │   └── AdminOrder.php        # Kelola pesanan
│   │
│   ├── Models/
│   │   ├── UserModel.php
│   │   ├── ProductCategoryModel.php
│   │   ├── ProductModel.php
│   │   ├── OrderModel.php
│   │   └── OrderDetailModel.php
│   │
│   ├── Views/
│   │   ├── frontend/
│   │   │   ├── layout.php        # Layout utama frontend
│   │   │   ├── home.php          # Homepage
│   │   │   ├── produk/
│   │   │   │   ├── index.php     # Katalog produk
│   │   │   │   └── detail.php    # Detail produk
│   │   │   └── order/
│   │   │       ├── form.php      # Form pemesanan
│   │   │       └── success.php   # Konfirmasi order + WA
│   │   │
│   │   ├── admin/
│   │   │   ├── layout.php        # Layout AdminLTE
│   │   │   ├── dashboard.php     # Dashboard
│   │   │   ├── kategori/
│   │   │   │   ├── index.php     # List kategori
│   │   │   │   └── form.php      # Form create/edit
│   │   │   ├── produk/
│   │   │   │   ├── index.php     # List produk
│   │   │   │   └── form.php      # Form create/edit
│   │   │   └── order/
│   │   │       ├── index.php     # List pesanan
│   │   │       └── detail.php    # Detail + update status
│   │   │
│   │   └── auth/
│   │       └── login.php         # Halaman login
│   │
│   ├── Database/
│   │   ├── Migrations/           # 5 file migrasi
│   │   └── Seeds/
│   │       └── ProductCategorySeeder.php
│   │
│   ├── Filters/
│   │   └── AuthFilter.php        # Proteksi halaman admin
│   │
│   └── Config/
│       ├── Routes.php            # Semua route
│       └── Filters.php           # Registrasi filter auth
│
├── public/
│   └── uploads/
│       └── products/             # Upload gambar produk
│
├── .env                          # Konfigurasi environment
└── README.md
```

---

## 🗺️ Daftar Route

### Frontend (Public)

| Method | URL | Controller | Keterangan |
|---|---|---|---|
| GET | `/` | `Home::index` | Homepage |
| GET | `/produk` | `Produk::index` | Katalog produk |
| GET | `/produk/kategori/{slug}` | `Produk::kategori` | Filter per kategori |
| GET | `/produk/{slug}` | `Produk::detail` | Detail produk |
| GET | `/order/{slug}` | `Order::create` | Form pemesanan |
| POST | `/order/store` | `Order::store` | Proses simpan order |
| GET | `/order/success/{nomor}` | `Order::success` | Konfirmasi + WA |

### Auth

| Method | URL | Controller | Keterangan |
|---|---|---|---|
| GET | `/login` | `Auth::login` | Halaman login |
| POST | `/login` | `Auth::attemptLogin` | Proses login |
| GET | `/logout` | `Auth::logout` | Logout |

### Admin (Protected — Auth Filter)

| Method | URL | Controller | Keterangan |
|---|---|---|---|
| GET | `/admin` | `Admin::index` | Dashboard |
| GET | `/admin/kategori` | `AdminKategori::index` | List kategori |
| GET | `/admin/kategori/create` | `AdminKategori::create` | Form tambah |
| POST | `/admin/kategori/store` | `AdminKategori::store` | Simpan kategori |
| GET | `/admin/kategori/edit/{id}` | `AdminKategori::edit` | Form edit |
| POST | `/admin/kategori/update/{id}` | `AdminKategori::update` | Update kategori |
| POST | `/admin/kategori/delete/{id}` | `AdminKategori::delete` | Hapus kategori |
| GET | `/admin/produk` | `AdminProduk::index` | List produk |
| GET | `/admin/produk/create` | `AdminProduk::create` | Form tambah |
| POST | `/admin/produk/store` | `AdminProduk::store` | Simpan produk |
| GET | `/admin/produk/edit/{id}` | `AdminProduk::edit` | Form edit |
| POST | `/admin/produk/update/{id}` | `AdminProduk::update` | Update produk |
| POST | `/admin/produk/delete/{id}` | `AdminProduk::delete` | Hapus produk |
| GET | `/admin/pesanan` | `AdminOrder::index` | List pesanan |
| GET | `/admin/pesanan/detail/{id}` | `AdminOrder::detail` | Detail pesanan |
| POST | `/admin/pesanan/status/{id}` | `AdminOrder::updateStatus` | Update status |

---

## 🔒 Keamanan

- ✅ **Auth Filter** — Semua route `/admin/*` dilindungi session login
- ✅ **CSRF Token** — Form menggunakan `csrf_field()` untuk proteksi CSRF
- ✅ **Input Validation** — Validasi server-side pada semua form (nama, WA, alamat, jumlah)
- ✅ **File Upload Validation** — Hanya menerima gambar (JPG, PNG, WebP), maks 2MB
- ✅ **SQL Injection Protection** — Menggunakan Query Builder CI4 (parameterized)
- ✅ **XSS Protection** — Output di-escape dengan `esc()` helper
- ✅ **Transaction** — Proses order menggunakan database transaction

---

## ⚙️ Konfigurasi WhatsApp

Nomor WhatsApp admin default ada di file `app/Controllers/Order.php` (method `success`):

```php
$adminWA = '6281234567890'; // Ganti dengan nomor WA admin Anda
```

Format: kode negara tanpa `+`, contoh: `628123456789`

---

## 📝 Catatan Pengembangan

- **Stok otomatis berkurang** saat customer order berhasil
- **Stok otomatis bertambah** saat admin membatalkan pesanan
- **Nomor order** di-generate otomatis: `ORD-YYYYMMDD-0001`
- **Slug** di-generate otomatis dari nama produk/kategori
- Upload gambar disimpan di `public/uploads/products/`

---

## 📄 Lisensi

MIT License — Bebas digunakan untuk keperluan tugas, demo, atau pengembangan lebih lanjut.

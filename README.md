# 🛒 Teshaldin – Simple E-Commerce Web App

📦 Laravel 12 | MySQL | Blade | Bootstrap  
Author: **M Kahfi Kresnotutuko**

---

## 🚀 Fitur Utama

- 🛍️ **Daftar Produk**
- 📄 **Detail Produk**
- ➕ **Tambah ke Keranjang**
- 🔢 **Kelola Jumlah Qty**
- 🧺 **Lihat & Hapus Isi Keranjang**
- 🛒 **Proses Checkout**
- 🧾 **Simpan Transaksi ke DB**
- 📚 **Riwayat Transaksi (Read Only)**

---

## 🧠 Teknologi

| Layer         | Tools Used             |
|---------------|------------------------|
| Framework     | Laravel 12             |
| Template      | Blade                  |
| UI Framework  | Bootstrap 5            |
| Database      | MySQL (Railway)        |
| Session       | Laravel Session (Cart) |
| Hosting       | Railway.app            |

---

## 🗃️ Struktur Folder Utama


---

## 🧾 Struktur Database

### 📦 `products`

| Field        | Tipe      |
|--------------|-----------|
| id           | BIGINT    |
| name         | STRING    |
| description  | TEXT      |
| price        | DECIMAL   |
| stock        | INTEGER   |
| image        | STRING    |
| timestamps   | ✅        |

---

### 🛒 `transactions`

| Field        | Tipe      |
|--------------|-----------|
| id           | BIGINT    |
| total_price  | DECIMAL   |
| created_at   | TIMESTAMP |



---

## 🧩 Alur Keranjang & Checkout

```mermaid
flowchart TD
  A[User Akses Produk] --> B[Tombol Tambah ke Keranjang]
  B --> C[Simpan ke Session]
  C --> D[Lihat Isi Keranjang]
  D --> E[Ubah Qty / Hapus]
  E --> F[Checkout]
  F --> G[Simpan ke Tabel transactions + items]
[https://teshaldin.up.railway.app](https://teshaldin-production.up.railway.app/)

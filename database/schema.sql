-- Database: tokoonline
CREATE DATABASE IF NOT EXISTS tokoonline;
USE tokoonline;

-- 1. Kategori
CREATE TABLE kategori (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_kategori VARCHAR(100) NOT NULL,
    slug VARCHAR(100) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- 2. Produk
CREATE TABLE produk (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_kategori INT NOT NULL,
    nama_produk VARCHAR(255) NOT NULL,
    deskripsi TEXT,
    harga DECIMAL(15, 2) NOT NULL,
    stok INT DEFAULT 0,
    gambar VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_kategori) REFERENCES kategori(id) ON DELETE RESTRICT
) ENGINE=InnoDB;

-- 3. Pelanggan
CREATE TABLE pelanggan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_lengkap VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    telepon VARCHAR(20),
    alamat TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- 4. Kurir
CREATE TABLE kurir (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_kurir VARCHAR(50) NOT NULL,
    layanan VARCHAR(50),
    tarif_per_kg DECIMAL(15, 2) NOT NULL
) ENGINE=InnoDB;

-- 5. Pesanan (Logic Rp 75.000)
CREATE TABLE pesanan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_pelanggan INT NOT NULL,
    id_kurir INT NOT NULL,
    nomor_invoice VARCHAR(50) NOT NULL UNIQUE,
    total_harga_produk DECIMAL(15, 2) NOT NULL,
    biaya_pengiriman DECIMAL(15, 2) NOT NULL,
    potongan_promo DECIMAL(15, 2) DEFAULT 0.00,
    total_final DECIMAL(15, 2) NOT NULL DEFAULT 75000.00,
    status_pesanan ENUM('pending', 'dibayar', 'dikirim', 'selesai', 'dibatalkan') DEFAULT 'pending',
    tanggal_transaksi DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_pelanggan) REFERENCES pelanggan(id) ON DELETE CASCADE,
    FOREIGN KEY (id_kurir) REFERENCES kurir(id) ON DELETE RESTRICT
) ENGINE=InnoDB;

-- 6. Pesanan Detail
CREATE TABLE pesanan_detail (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_pesanan INT NOT NULL,
    id_produk INT NOT NULL,
    jumlah INT NOT NULL,
    harga_saat_beli DECIMAL(15, 2) NOT NULL,
    FOREIGN KEY (id_pesanan) REFERENCES pesanan(id) ON DELETE CASCADE,
    FOREIGN KEY (id_produk) REFERENCES produk(id) ON DELETE RESTRICT
) ENGINE=InnoDB;

-- 7. Keranjang
CREATE TABLE keranjang (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_pelanggan INT NOT NULL,
    id_produk INT NOT NULL,
    kuantitas INT NOT NULL DEFAULT 1,
    FOREIGN KEY (id_pelanggan) REFERENCES pelanggan(id) ON DELETE CASCADE,
    FOREIGN KEY (id_produk) REFERENCES produk(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- 8. Admin
CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    nama_lengkap VARCHAR(100),
    last_login DATETIME
) ENGINE=InnoDB;

-- 9. Log Transaksi
CREATE TABLE log_transaksi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_pesanan INT NOT NULL,
    keterangan TEXT,
    waktu_log TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_pesanan) REFERENCES pesanan(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- 10. Konfigurasi
CREATE TABLE konfigurasi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_setting VARCHAR(100) UNIQUE,
    nilai_setting TEXT,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

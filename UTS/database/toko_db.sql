CREATE DATABASE toko_db;

USE toko_db;

CREATE TABLE produk (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_produk VARCHAR(100),
    jenis_produk VARCHAR(50),
    harga DECIMAL(10,2),
    stok INT
);

CREATE TABLE transaksi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_produk INT,
    jumlah INT,
    tanggal TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (id_produk)
    REFERENCES produk(id)
);